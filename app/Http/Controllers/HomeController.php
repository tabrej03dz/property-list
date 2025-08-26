<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Enquiry;
use App\Models\Land;
use App\Models\Property;
use App\Models\PropertyType;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        $propertyTypes = PropertyType::all();
        $properties = Property::where('status', 'available')->with('images')->get()->map(function ($property) {
            return [
                'title' => $property->title,
                'price' => '₹' . number_format($property->price),
                'location' => $property->location,
                'date' => $property->created_at->diffForHumans(),
                'beds' => $property->bedrooms,
                'baths' => $property->bathrooms,
                'area' => $property->area . ' Sqft',
                'images' => $property->images->map(function ($img) {
                    return asset('storage/' . $img->filename);
                })->toArray(),
            ];
        });
        return view('frontend.index', compact('propertyTypes', 'properties'));
    }

    public function landproperty(){
        $lands = Land::all();
        return view('frontend.landproperty', compact('lands'));
    }

    public function about(){
        return view('frontend.about');
    }

    public function contact(){
        return view('frontend.contact');
    }

    public function buy(){
        $properties = Property::where('type', 'sale')->get();
        return view('frontend.buy', compact('properties'));
    }


    public function typedProperty(Request $request, $type = null)
    {
        $query = Property::query()->with('propertyType');
        $recommendations = null;

        // Type filter (from route param or form input)
        $finalType = $type ?? $request->type;
        if ($finalType) {
            $query->where('type', $finalType);
            $recommendations = Property::where('type', $finalType)->get();

        }

        if ($request->filled('title')) {
            $query->where('title', 'like', '%' . $request->title . '%');
        }

        // Property type filter
        if ($request->filled('property_type_id')) {
            $query->where('property_type_id', $request->property_type_id);
            $recommendations = Property::where('property_type_id', $request->property_type_id)->get();
        }

        // Location filter (partial match)
        if ($request->filled('location')) {
            $query->where('address', 'like', '%' . $request->location . '%');
        }

        // Price range filters
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        // Bedrooms filter
        if ($request->filled('bedrooms')) {
            $query->where('bedrooms', '>=', $request->bedrooms);
        }
        $properties = $query->where('status', 'available')->get();
        $propertyTypes = PropertyType::all();
        $cities = City::all();
        return view('frontend.typed-property', compact('properties', 'recommendations', 'propertyTypes', 'cities', 'finalType'));
    }


    public function rent(){
        $properties = Property::where('type', 'rent')->get();
        return view('frontend.rent', compact('properties'));
    }

    public function villa(){
        return view('frontend.villa');
    }

    public function categoryProperties(PropertyType $propertyType){
        $properties = $propertyType->properties;
        return view('frontend.category-properties', compact('properties', 'propertyType'));
    }

    public function land(){
        return view('frontend.land');
    }

    public function commercial(){
        return view('frontend.commercial');
    }

    public function blog(){
        return view('frontend.blog');
    }

    public function detail(Property $property){

        return view('frontend.detail', compact('property'));
    }

    public function term(){
        return view('frontend.term');
    }

    public function privacy(){
        return view('frontend.privacy');
    }

    public function refund(){
        return view('frontend.refund');
    }

    public function disclaimer(){
        return view('frontend.disclaimer');
    }

    // public function contactSave(Request $request){
    //     $request->validate([
    //         'name' => 'required',
    //         'email' => 'required',
    //         'phone' => 'nullable',
    //         'message' => 'nullable',
    //     ]);

    //     Enquiry::create($request->all() + ['user_id' => auth()->check() ? auth()->id() : null]);
    //     return back()->with('success', 'Form submitted successfully we contact you back soon!');
    // }


    public function contactSave(Request $request, Property $property = null)
    {
        // 1) Validate input
        $validated = $request->validate([
            'name'        => ['required','string','max:191'],
            'email'       => ['required','email','max:191'],
            'phone'       => ['nullable','string','max:30'],
            'message'     => ['nullable','string'],
            // optional: allow passing property_id when route param not used
            'property_id' => ['nullable','integer','exists:properties,id'],
        ]);

        // 2) Build enquiry
        $enquiry = new Enquiry();
        $enquiry->name    = $validated['name'];
        $enquiry->email   = $validated['email'];
        $enquiry->phone   = $validated['phone']   ?? null;
        $enquiry->message = $validated['message'] ?? null;
        $enquiry->status  = 'pending';

        // Optional: track who submitted (if logged in)
        if (auth()->check()) {
            $enquiry->user_id = auth()->id();
        }

        // 3) Attach to Property (or leave null for general enquiry)
        if ($property) {
            // route model binding: /properties/{property}/enquiry
            $enquiry->enquirable()->associate($property);
        } elseif (!empty($validated['property_id'])) {
            // form passed property_id instead of route param
            $propModel = Property::findOrFail($validated['property_id']);
            $enquiry->enquirable()->associate($propModel);
        } else {
            // general enquiry (no association)
            $enquiry->enquirable_type = null;
            $enquiry->enquirable_id   = null;
        }

        $enquiry->save();

        // 4) Respond
        return back()->with('success', $property
            ? 'Thanks! Your enquiry for this property has been submitted.'
            : 'Thanks! Your enquiry has been submitted.');
    }


    public function landDetails(Land $land){
        return view('frontend.land-details', compact('land'));
    }
}

