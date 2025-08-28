<?php

namespace App\Http\Controllers;

use App\Models\Land;
use App\Models\LandImage;
use App\Models\Enquiry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class LandController extends Controller
{
    public function index(Request $request)
    {
        $q = Land::query();

        if ($s = trim($request->get('q', ''))) {
            $q->where(function ($w) use ($s) {
                $w->where('title', 'like', "%{$s}%")
                  ->orWhere('description', 'like', "%{$s}%")
                  ->orWhere('city', 'like', "%{$s}%")
                  ->orWhere('locality', 'like', "%{$s}%");
            });
        }

        foreach (['status','listing_type','state','city','pincode','visibility'] as $field) {
            if ($v = $request->get($field)) $q->where($field, $v);
        }

        if ($request->boolean('with_trashed')) $q->withTrashed();
        if ($request->boolean('only_trashed')) $q->onlyTrashed();

        $q->orderBy('created_at','desc');

        $lands = $q->paginate(15)->appends($request->query());

        return view('lands.index', compact('lands'));
    }

    /* -------------------- CREATE -------------------- */
    public function create()
    {
        $land = new Land;
        return view('lands.create', compact('land'));
    }

    /* -------------------- STORE -------------------- */
    public function store(Request $request)
    {
        $data = $this->validateData($request);


        // slug
        $data['slug'] = $this->uniqueSlug($data['slug'] ?? null, $data['title']);

        $data['agent_id'] = auth()->user()->id;

        // auto publish timestamp
        if (($data['status'] ?? 'draft') === 'published' && empty($data['published_at'])) {
            $data['published_at'] = now();
        }

        // uploads
        [$primary, $gallery] = $this->handleUploads($request);
        // if ($primary)  $data['primary_image'] = $primary;
        // if ($gallery)  $data['gallery'] = $gallery;

        [$primary, $galleryFiles] = $this->handleUploads($request);

        if ($primary) {
            $data['primary_image'] = $primary;
        }

        $land = Land::create($data);


        // Save gallery images in LandImage model
        if (!empty($galleryFiles)) {
            foreach ($galleryFiles as $path) {
                $land->images()->create(['path' => $path]);
            }
        }

        // rare race: ensure unique slug
        if (Land::where('slug', $land->slug)->where('id','!=',$land->id)->exists()) {
            $land->slug = Str::slug($land->title) . '-' . $land->id;
            $land->save();
        }

        return redirect()->route('lands.index')->with('success', 'Land created.');
    }

    /* -------------------- SHOW (optional) -------------------- */
    public function show(Land $land)
    {
        return view('lands.show', compact('land'));
    }

    /* -------------------- EDIT -------------------- */
    public function edit(Land $land)
    {
        return view('lands.edit', compact('land'));
    }

    /* -------------------- UPDATE -------------------- */
    public function update(Request $request, Land $land)
    {
        $data = $this->validateData($request, $land->id);

        $data['amenities'] = $this->csvToArray($request->input('amenities_csv'));
        $data['tags']      = $this->csvToArray($request->input('tags_csv'));

        // slug if changed/title changed
        if (isset($data['title']) || isset($data['slug'])) {
            $data['slug'] = $this->uniqueSlug($data['slug'] ?? $land->slug, $data['title'] ?? $land->title, $land->id);
        }

        // auto publish timestamp
        if (($data['status'] ?? $land->status) === 'published' && empty($land->published_at) && empty($data['published_at'])) {
            $data['published_at'] = now();
        }

        // uploads (replace if provided)
         [$primary, $galleryFiles] = $this->handleUploads($request);

        if ($primary) {
            $data['primary_image'] = $primary;
        }

        $land->update($data);

        // Replace gallery if new files uploaded
    if (!empty($galleryFiles)) {
        // $land->images()->delete();
        foreach ($galleryFiles as $path) {
            $land->images()->create(['path' => $path]);
        }
    }
        return redirect()->route('lands.index')->with('success', 'Land updated.');
    }

    /* -------------------- DELETE (soft) -------------------- */
    public function destroy(Land $land)
    {
        $land->delete();
        return redirect()->back()->with('success', 'Moved to trash.');
    }

    /* -------------------- RESTORE -------------------- */
    public function restore($id)
    {
        $land = Land::withTrashed()->findOrFail($id);
        $land->restore();
        return redirect()->back()->with('success', 'Restored.');
    }

    /* -------------------- FORCE DELETE -------------------- */
    public function forceDelete($id)
    {
        $land = Land::withTrashed()->findOrFail($id);
        $this->safeDelete($land->primary_image);
        $this->safeDeleteMany($land->gallery ?? []);
        $land->forceDelete();
        return redirect()->back()->with('success', 'Permanently deleted.');
    }

    /* -------------------- PUBLISH / UNPUBLISH -------------------- */
    public function publish(Land $land)
    {
        $land->update(['status' => 'published', 'published_at' => $land->published_at ?: now()]);
        return redirect()->back()->with('success', 'Published.');
    }
    public function unpublish(Land $land)
    {
        $land->update(['status' => 'draft']);
        return redirect()->back()->with('success', 'Unpublished.');
    }

    /* -------------------- VISIBILITY -------------------- */
    public function setVisibility(Request $request, Land $land)
    {
        $vis = $request->validate(['visibility' => 'required|in:public,unlisted,private']);
        $land->update($vis);
        return redirect()->back()->with('success', 'Visibility updated.');
    }

    /* ==================== Helpers ==================== */

    private function validateData(Request $request, ?int $id = null): array
    {
        return $request->validate([
            'user_id'         => 'nullable|exists:users,id',
            'title'           => 'required|string|max:255',
            'slug'            => 'nullable|string|max:255|unique:lands,slug' . ($id ? ",{$id}" : ''),
            'reference_code'  => 'nullable|string|max:50|unique:lands,reference_code' . ($id ? ",{$id}" : ''),
            'description'     => 'nullable|string',

            'listing_type'    => 'nullable|in:sale,rent,lease',
            'status'          => 'nullable|in:draft,published,archived',

            'price'           => 'nullable|numeric|min:0',
            'price_unit'      => 'nullable|in:total,per_sqft,per_sqyd,per_sqmt,per_acre,per_bigha,per_hectare',
            'currency'        => 'nullable|string|size:3',
            'is_negotiable'   => 'nullable|boolean',

            'area_value'      => 'nullable|numeric|min:0',
            'area_unit'       => 'nullable|in:sqft,sqyd,sqmt,acre,hectare,bigha,guntha,cent,marla,biswa,katha',
            'plot_length'     => 'nullable|numeric|min:0',
            'plot_breadth'    => 'nullable|numeric|min:0',
            'dimensions_unit' => 'nullable|in:ft,yd,m',
            'frontage'        => 'nullable|numeric|min:0',
            'corner_plot'     => 'nullable|boolean',
            'road_width'      => 'nullable|numeric|min:0',
            'road_unit'       => 'nullable|in:ft,m,yd',
            'facing'          => 'nullable|in:N,NE,E,SE,S,SW,W,NW',
            'shape'           => 'nullable|in:rectangular,square,irregular,trapezium,triangular,other',

            'land_use'        => 'nullable|in:residential,commercial,agricultural,industrial,mixed,institutional,warehouse',
            'zoning'          => 'nullable|string|max:100',
            'fsi'             => 'nullable|numeric|min:0',

            'ownership'       => 'nullable|in:freehold,leasehold,power_of_attorney,cooperative,company,other',
            'tenure_years'    => 'nullable|integer|min:0',

            'rera_id'         => 'nullable|string|max:100',
            'survey_number'   => 'nullable|string|max:100',
            'khasra_number'   => 'nullable|string|max:100',
            'plot_number'     => 'nullable|string|max:100',
            'khata_number'    => 'nullable|string|max:100',
            'is_non_agricultural' => 'nullable|boolean',
            'title_clear'     => 'nullable|boolean',
            'encumbrances'    => 'nullable|string',
            'loan_available'  => 'nullable|boolean',

            'water_connection'     => 'nullable|boolean',
            'electricity_connection'=> 'nullable|boolean',
            'sewage_connection'    => 'nullable|boolean',
            'gas_connection'       => 'nullable|boolean',
            'borewell'             => 'nullable|boolean',
            'compound_wall'        => 'nullable|boolean',
            'street_lights'        => 'nullable|boolean',
            'drainage'             => 'nullable|boolean',
            'rainwater_harvesting' => 'nullable|boolean',
            'irrigation_facility'  => 'nullable|boolean',

//            'documents'       => 'nullable|array',
//            'documents.*'     => 'string|max:2048',

            'primary_image_file' => 'nullable|image|max:5120',
            'gallery_files'      => 'nullable|array',
            'gallery_files.*'    => 'nullable|image|max:5120',

            'video_url'       => 'nullable|url|max:2048',
            'virtual_tour_url'=> 'nullable|url|max:2048',

            'address_line'    => 'nullable|string|max:255',
            'landmark'        => 'nullable|string|max:255',
            'locality'        => 'nullable|string|max:255',
            'city'            => 'nullable|string|max:120',
            'district'        => 'nullable|string|max:120',
            'state'           => 'nullable|string|max:120',
            'pincode'         => 'nullable|string|max:10',
            'country'         => 'nullable|string|max:100',
            'latitude'        => 'nullable|numeric|between:-90,90',
            'longitude'       => 'nullable|numeric|between:-180,180',

            'contact_name'    => 'nullable|string|max:120',
            'contact_phone'   => 'nullable|string|max:30',
            'contact_email'   => 'nullable|email|max:120',

            'visibility'      => 'nullable|in:public,unlisted,private',
            'published_at'    => 'nullable|date',
            'expires_at'      => 'nullable|date|after:published_at',

            'meta_title'       => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:255',
            'meta_keywords'    => 'nullable|string|max:255',

        ]);
    }

    private function csvToArray(?string $csv): ?array
    {
        if (!$csv) return null;
        $items = array_filter(array_map(fn($x) => trim($x), explode(',', $csv)));
        return $items ? array_values(array_unique($items)) : null;
    }

    private function uniqueSlug(?string $slug, string $title, ?int $ignoreId = null): string
    {
        $base = Str::slug($slug ?: $title) ?: Str::random(8);
        $cand = $base; $i = 2;
        while (Land::where('slug',$cand)->when($ignoreId,fn($q)=>$q->where('id','!=',$ignoreId))->exists()) {
            $cand = $base.'-'.$i; $i++;
        }
        return $cand;
    }

    private function handleUploads(Request $request): array
    {
        $primary = null; $gallery = null;

        if ($request->hasFile('primary_image_file')) {
            $primary = $request->file('primary_image_file')->store('lands', 'public');
        }
        if ($request->hasFile('gallery_files')) {
            $gallery = [];
            foreach ($request->file('gallery_files') as $file) {
                if ($file) $gallery[] = $file->store('lands','public');
            }
        }
        return [$primary, $gallery];
    }

    private function safeDelete(?string $path): void
    {
        if (!$path) return;
        if (Str::startsWith($path, ['lands/', 'storage/lands/'])) {
            $toDelete = Str::startsWith($path, 'lands/') ? $path : Str::replaceFirst('storage/', '', $path);
            Storage::disk('public')->delete($toDelete);
        }
    }

    private function safeDeleteMany(array $paths): void
    {
        foreach ($paths as $p) $this->safeDelete($p);
    }

    public function landImageDelete(LandImage $image){
        if($image->path && Storage::disk('public')->exists($image->path)){
            Storage::disk('public')->delete($image->path);
        }
        $image->delete();
        return back()->with('success', 'Image deleted succeessfully');
    }


    public function landEnquiry(Request $request, Land $land = null)
    {
        // 1) Validate input (email/name required as per your migration)
        $validated = $request->validate([
            'name'    => ['required','string','max:191'],
            'email'   => ['required','email','max:191'],
            'phone'   => ['nullable','string','max:30'],
            'message' => ['nullable','string'],
            // optional: allow passing land_id when route param not used
            'land_id' => ['nullable','integer','exists:lands,id'],
        ]);

        // 2) Build enquiry
        $enquiry = new Enquiry();
        $enquiry->name    = $validated['name'];
        $enquiry->email   = $validated['email'];
        $enquiry->phone   = $validated['phone']   ?? null;
        $enquiry->message = $validated['message'] ?? null;
        $enquiry->status  = 'pending'; // ensure default

        // Optional: track who submitted (if logged in)
        if (auth()->check()) {
            $enquiry->user_id = auth()->id();
        }

        // 3) Attach to Land (or leave null for general enquiry)
        if ($land) {
            // route model binding: /lands/{land}/enquiry
            $enquiry->enquirable()->associate($land);
        } elseif (!empty($validated['land_id'])) {
            // form passed land_id instead of route param
            $landModel = Land::findOrFail($validated['land_id']);
            $enquiry->enquirable()->associate($landModel);
        } else {
            // general enquiry (no association)
            $enquiry->enquirable_type = null;
            $enquiry->enquirable_id   = null;
        }

        $enquiry->save();

        // 4) Respond (AJAX or normal form post)

        return back()->with('success', $land
            ? 'Thanks! Your enquiry for this land has been submitted.'
            : 'Thanks! Your enquiry has been submitted.');
    }

}

