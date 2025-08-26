{{-- resources/views/lands/show.blade.php --}}
@extends('component.main')

@section('title', $land->meta_title ?? $land->title)
@section('meta_description', $land->meta_description ?? '')
@section('meta_keywords', $land->meta_keywords ?? '')

@section('content')
    @php
        // Normalize JSON fields if they’re stored as JSON strings (in case not casts in model)
        $amenities = is_array($land->amenities) ? $land->amenities : (json_decode($land->amenities ?? '[]', true) ?: []);
        $tags      = is_array($land->tags) ? $land->tags : (json_decode($land->tags ?? '[]', true) ?: []);
        $documents = is_array($land->documents) ? $land->documents : (json_decode($land->documents ?? '[]', true) ?: []);
        $priceNice = $land->price !== null ? number_format((float) $land->price, 2) : null;

        // Small label helpers
        $yn = fn($b) => $b ? 'Yes' : 'No';
        $ucfirstOr = fn($v, $fallback = 'N/A') => $v ? ucfirst($v) : $fallback;

        // Compose a readable address line
        $addressParts = array_filter([
            $land->address_line,
            $land->landmark,
            $land->locality,
            $land->city,
            $land->district,
            $land->state,
            $land->pincode,
            $land->country ?: 'India'
        ]);
        $fullAddress = implode(', ', $addressParts);
    @endphp

    {{-- ================== Hero Banner ================== --}}
    <div class="w-full h-[300px] md:h-[420px] relative">
        <img src="{{ $land->primary_image ? asset('storage/' . $land->primary_image) : 'https://cdn.pixabay.com/photo/2015/10/05/14/50/farm-972717_1280.jpg' }}"
             alt="{{ $land->title }}"
             class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black/50 flex flex-col items-center justify-center text-center px-4">
            <div class="inline-flex items-center gap-2 mb-3">
                <span class="px-2.5 py-1 rounded-full text-xs font-semibold bg-white/90 text-slate-800 shadow">
                    {{ strtoupper($land->listing_type) }}
                </span>
                @if($land->status)
                    <span class="px-2.5 py-1 rounded-full text-xs font-semibold bg-green-600 text-white shadow">
                        {{ ucfirst($land->status) }}
                    </span>
                @endif
                @if($land->reference_code)
                    <span class="px-2.5 py-1 rounded-full text-xs font-semibold bg-white/90 text-slate-800 shadow">
                        Ref: {{ $land->reference_code }}
                    </span>
                @endif
            </div>

            <h1 class="text-2xl md:text-4xl font-bold text-white">{{ $land->title }}</h1>

            @if($fullAddress)
            <p class="mt-2 text-white flex items-center justify-center gap-2 text-sm md:text-base">
                <span class="material-symbols-outlined text-white">location_on</span>
                {{ $fullAddress }}
            </p>
            @endif

            <p class="mt-4 text-xl md:text-2xl font-semibold text-white">
                @if($priceNice)
                    {{ $land->currency }} {{ $priceNice }}
                    <span class="text-white/90 text-sm align-middle">({{ str_replace('_',' ',$land->price_unit) }})</span>
                    @if($land->is_negotiable)
                        <span class="ml-2 text-xs px-2 py-1 rounded bg-yellow-400/90 text-slate-900 font-semibold">Negotiable</span>
                    @endif
                @else
                    <span class="text-white/80">Price on request</span>
                @endif
            </p>
        </div>
    </div>

    {{-- ================== Content ================== --}}
    <div class="max-w-7xl mx-auto py-10 px-4 md:px-6 lg:px-8">

        {{-- Quick chips --}}
        <div class="flex flex-wrap items-center gap-2 mb-6">
            @if($land->area_value && $land->area_unit)
                <span class="px-3 py-1 rounded-full bg-sky-50 text-sky-700 text-sm font-medium">
                    Area: {{ $land->area_value }} {{ strtoupper($land->area_unit) }}
                </span>
            @endif
            @if($land->facing)
                <span class="px-3 py-1 rounded-full bg-sky-50 text-sky-700 text-sm font-medium">
                    Facing: {{ $land->facing }}
                </span>
            @endif
            @if($land->shape)
                <span class="px-3 py-1 rounded-full bg-sky-50 text-sky-700 text-sm font-medium">
                    Shape: {{ ucfirst($land->shape) }}
                </span>
            @endif
            @if($land->road_width)
                <span class="px-3 py-1 rounded-full bg-sky-50 text-sky-700 text-sm font-medium">
                    Road: {{ $land->road_width }} {{ $land->road_unit }}
                </span>
            @endif
            @foreach(($tags ?? []) as $tag)
                <span class="px-3 py-1 rounded-full bg-emerald-50 text-emerald-700 text-sm font-medium">#{{ $tag }}</span>
            @endforeach
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">

            {{-- Left: Details --}}
            <div class="lg:col-span-2 space-y-8">
                {{-- Description --}}
                @if($land->description)
                <div class="bg-white rounded-2xl shadow p-6">
                    <h2 class="text-xl font-semibold text-slate-800 mb-3">Description</h2>
                    <div class="prose max-w-none">
                        {!! nl2br(e($land->description)) !!}
                    </div>
                </div>
                @endif

                {{-- Overview --}}
                <div class="bg-white rounded-2xl shadow p-6">
                    <h3 class="text-lg font-semibold text-sky-700 mb-4">Overview</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                        <p><strong>Listing Type:</strong> {{ ucfirst($land->listing_type) }}</p>
                        <p><strong>Status:</strong> {{ ucfirst($land->status) }}</p>
                        <p><strong>Price:</strong>
                            @if($priceNice) {{ $land->currency }} {{ $priceNice }} ({{ str_replace('_',' ',$land->price_unit) }})
                            @else N/A @endif
                        </p>
                        <p><strong>Negotiable:</strong> {{ $yn($land->is_negotiable) }}</p>
                        <p><strong>Area:</strong>
                            {{ $land->area_value ? $land->area_value.' '.$land->area_unit : 'N/A' }}
                        </p>
                        <p><strong>Dimensions:</strong>
                            @if($land->plot_length && $land->plot_breadth)
                                {{ $land->plot_length }} × {{ $land->plot_breadth }} {{ $land->dimensions_unit }}
                            @else
                                N/A
                            @endif
                        </p>
                        <p><strong>Frontage:</strong>
                            {{ $land->frontage ? $land->frontage.' '.$land->road_unit : 'N/A' }}
                        </p>
                        <p><strong>Corner Plot:</strong> {{ $yn($land->corner_plot) }}</p>
                        <p><strong>Road Width:</strong>
                            {{ $land->road_width ? $land->road_width.' '.$land->road_unit : 'N/A' }}
                        </p>
                        <p><strong>Facing:</strong> {{ $land->facing ?? 'N/A' }}</p>
                        <p><strong>Shape:</strong> {{ $ucfirstOr($land->shape) }}</p>
                        <p><strong>Land Use:</strong> {{ $ucfirstOr($land->land_use) }}</p>
                        <p><strong>Zoning:</strong> {{ $land->zoning ?? 'N/A' }}</p>
                        <p><strong>FSI:</strong> {{ $land->fsi ?? 'N/A' }}</p>
                    </div>
                </div>

                {{-- Utilities / On-site --}}
                <div class="bg-white rounded-2xl shadow p-6">
                    <h3 class="text-lg font-semibold text-sky-700 mb-4">Utilities & On-site Features</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-3 text-sm">
                        <p><strong>Water:</strong> {{ $yn($land->water_connection) }}</p>
                        <p><strong>Electricity:</strong> {{ $yn($land->electricity_connection) }}</p>
                        <p><strong>Sewage:</strong> {{ $yn($land->sewage_connection) }}</p>
                        <p><strong>Gas:</strong> {{ $yn($land->gas_connection) }}</p>
                        <p><strong>Borewell:</strong> {{ $yn($land->borewell) }}</p>
                        <p><strong>Compound Wall:</strong> {{ $yn($land->compound_wall) }}</p>
                        <p><strong>Street Lights:</strong> {{ $yn($land->street_lights) }}</p>
                        <p><strong>Drainage:</strong> {{ $yn($land->drainage) }}</p>
                        <p><strong>Rainwater Harvesting:</strong> {{ $yn($land->rainwater_harvesting) }}</p>
                        <p><strong>Irrigation Facility:</strong> {{ $yn($land->irrigation_facility) }}</p>
                    </div>

                    @if(!empty($amenities))
                        <div class="mt-4">
                            <h4 class="text-sm font-semibold text-slate-700 mb-2">Amenities</h4>
                            <div class="flex flex-wrap gap-2">
                                @foreach($amenities as $a)
                                    <span class="px-3 py-1 rounded-full bg-indigo-50 text-indigo-700 text-sm">{{ $a }}</span>
                                @endforeach
                            </div>
                        </div>
                    @endif
                </div>

                {{-- Ownership / Legal --}}
                <div class="bg-white rounded-2xl shadow p-6">
                    <h3 class="text-lg font-semibold text-sky-700 mb-4">Ownership & Legal</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                        <p><strong>Ownership:</strong> {{ $ucfirstOr($land->ownership) }}</p>
                        <p><strong>Tenure (years):</strong> {{ $land->tenure_years ?? 'N/A' }}</p>
                        <p><strong>RERA ID:</strong> {{ $land->rera_id ?? 'N/A' }}</p>
                        <p><strong>Survey Number:</strong> {{ $land->survey_number ?? 'N/A' }}</p>
                        <p><strong>Khasra Number:</strong> {{ $land->khasra_number ?? 'N/A' }}</p>
                        <p><strong>Plot Number:</strong> {{ $land->plot_number ?? 'N/A' }}</p>
                        <p><strong>Khata Number:</strong> {{ $land->khata_number ?? 'N/A' }}</p>
                        <p><strong>Non-Agricultural (NA):</strong> {{ $land->is_non_agricultural === null ? 'N/A' : $yn($land->is_non_agricultural) }}</p>
                        <p><strong>Title Clear:</strong> {{ $yn($land->title_clear) }}</p>
                        <p class="md:col-span-2"><strong>Encumbrances:</strong> {{ $land->encumbrances ?? 'None' }}</p>
                        <p><strong>Loan Available:</strong> {{ $yn($land->loan_available) }}</p>
                    </div>
                </div>

                {{-- Location --}}
                <div class="bg-white rounded-2xl shadow p-6">
                    <h3 class="text-lg font-semibold text-sky-700 mb-4">Location</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm mb-4">
                        <p><strong>Address:</strong> {{ $fullAddress ?: 'N/A' }}</p>
                        <p><strong>City:</strong> {{ $land->city ?? 'N/A' }}</p>
                        <p><strong>District:</strong> {{ $land->district ?? 'N/A' }}</p>
                        <p><strong>State:</strong> {{ $land->state ?? 'N/A' }}</p>
                        <p><strong>Pincode:</strong> {{ $land->pincode ?? 'N/A' }}</p>
                        <p><strong>Country:</strong> {{ $land->country ?? 'India' }}</p>
                        <p><strong>Latitude:</strong> {{ $land->latitude ?? 'N/A' }}</p>
                        <p><strong>Longitude:</strong> {{ $land->longitude ?? 'N/A' }}</p>
                    </div>

                    @if($land->latitude && $land->longitude)
                        <div class="rounded-xl overflow-hidden border">
                            <iframe
                                src="https://maps.google.com/maps?q={{ $land->latitude }},{{ $land->longitude }}&z=15&output=embed"
                                class="w-full h-72" loading="lazy"></iframe>
                        </div>
                    @endif
                </div>

                {{-- Media & Documents & SEO --}}
                <div class="bg-white rounded-2xl shadow p-6">
                    <h3 class="text-lg font-semibold text-sky-700 mb-4">Media & SEO</h3>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                        <div>
                            <p class="font-medium text-slate-700 mb-2">Primary Image</p>
                            <img
                                src="{{ $land->primary_image ? asset('storage/' . $land->primary_image) : 'https://source.unsplash.com/600x400/?land,property' }}"
                                class="rounded-lg shadow-md w-full h-56 object-cover" alt="{{ $land->title }}">
                        </div>

                        <div>
                            <p class="font-medium text-slate-700 mb-2">Video URL</p>
                            @if($land->video_url)
                                <a href="{{ $land->video_url }}" target="_blank" class="text-sky-600 hover:underline break-all">
                                    {{ $land->video_url }}
                                </a>
                            @else
                                <span class="text-slate-500">N/A</span>
                            @endif

                            @if(!empty($documents))
                                <div class="mt-4">
                                    <p class="font-medium text-slate-700 mb-2">Documents</p>
                                    <ul class="list-disc list-inside space-y-1">
                                        @foreach($documents as $doc)
                                            @php
                                                // doc could be a URL string or an object {name,url}
                                                $docUrl = is_array($doc) ? ($doc['url'] ?? '#') : $doc;
                                                $docName = is_array($doc) ? ($doc['name'] ?? basename(parse_url($docUrl, PHP_URL_PATH))) : basename(parse_url($docUrl, PHP_URL_PATH));
                                            @endphp
                                            <li>
                                                <a href="{{ $docUrl }}" target="_blank" class="text-sky-600 hover:underline">{{ $docName }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>

                        <div class="md:col-span-2 grid grid-cols-1 md:grid-cols-2 gap-4 mt-4">
                            <p><strong>Meta Title:</strong> {{ $land->meta_title ?? '—' }}</p>
                            <p><strong>Meta Description:</strong> {{ $land->meta_description ?? '—' }}</p>
                            <p class="md:col-span-2"><strong>Meta Keywords:</strong> {{ $land->meta_keywords ?? '—' }}</p>
                        </div>
                    </div>
                </div>

                {{-- Related Lands (optional) --}}
                @if(isset($relatedLands) && $relatedLands->count())
                    <div class="bg-white rounded-2xl shadow p-6">
                        <h3 class="text-lg font-semibold text-sky-700 mb-4">Similar Listings</h3>
                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                            @foreach($relatedLands as $r)
                                <a href="{{ route('lands.show', $r->slug) }}"
                                   class="block group rounded-xl overflow-hidden border hover:shadow-lg transition">
                                    <div class="relative">
                                        <img src="{{ $r->primary_image ? asset('storage/'.$r->primary_image) : 'https://images.unsplash.com/photo-1599423300746-b62533397364?auto=format&fit=crop&w=900&q=80' }}"
                                             class="w-full h-44 object-cover group-hover:scale-[1.02] transition"
                                             alt="{{ $r->title }}">
                                        <span
                                          class="absolute top-3 left-3 bg-green-600 text-white text-xs font-semibold px-2.5 py-0.5 rounded-full">
                                          {{ ucfirst($r->listing_type) }}
                                        </span>
                                    </div>
                                    <div class="p-4">
                                        <h4 class="font-semibold text-slate-800 line-clamp-1">{{ $r->title }}</h4>
                                        <p class="text-slate-600 text-sm mt-1 line-clamp-1">
                                            {{ $r->locality }}, {{ $r->city }}
                                        </p>
                                        <p class="text-emerald-600 font-semibold mt-2">
                                            @if($r->price !== null)
                                                {{ $r->currency }} {{ number_format((float)$r->price, 2) }}
                                                <span class="text-slate-500 text-xs">({{ str_replace('_',' ',$r->price_unit) }})</span>
                                            @else
                                                Price on request
                                            @endif
                                        </p>
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif
            </div>

            {{-- Right: Enquiry / Agent --}}
            <div class="space-y-8">

                {{-- Agent Card --}}
                <div class="bg-white rounded-2xl shadow p-6">
                    <h3 class="text-lg font-semibold text-slate-800 mb-4">Agent</h3>
                    @if(isset($land->agent))
                        <div class="space-y-1">
                            <p class="font-medium">{{ $land->agent->name ?? 'Agent' }}</p>
                            @if(!empty($land->agent->phone))
                                <p class="text-sm text-slate-600">Phone:
                                    <a href="tel:{{ $land->agent->phone }}" class="text-sky-600 hover:underline">{{ $land->agent->phone }}</a>
                                </p>
                            @endif
                            @if(!empty($land->agent->email))
                                <p class="text-sm text-slate-600">Email:
                                    <a href="mailto:{{ $land->agent->email }}" class="text-sky-600 hover:underline">{{ $land->agent->email }}</a>
                                </p>
                            @endif
                        </div>
                    @else
                        <p class="text-slate-600 text-sm">Assigned agent details will appear here.</p>
                    @endif

                    <div class="mt-4 flex gap-2">
                        @if(!empty($land->agent?->phone))
                            <a href="tel:{{ $land->agent->phone }}"
                               class="px-4 py-2 rounded-lg bg-emerald-600 text-white text-sm hover:bg-emerald-700">
                                Call Agent
                            </a>
                        @endif
                        <a href="{{ route('lands.index') }}"
                           class="px-4 py-2 rounded-lg bg-gray-200 text-slate-800 text-sm hover:bg-gray-300">
                            Back to Listings
                        </a>
                    </div>
                </div>

                {{-- Enquiry Form (polymorphic, self-contained) --}}
                <div class="bg-white rounded-2xl shadow p-6">
                    <h3 class="text-lg font-semibold text-slate-800 mb-4">Enquire about this listing</h3>

                    @if(session('success'))
                        <div class="mb-4 rounded-lg bg-green-50 px-4 py-3 text-green-800 border border-green-200">
                            {{ session('success') }}
                        </div>
                    @endif

                    <form action="{{ route('land.enquiry', $land->id) }}" method="POST" class="grid grid-cols-1 gap-4">
                        @csrf
                        {{-- Polymorphic target (using morph map alias if configured) --}}
                        {{-- <input type="hidden" name="enquirable_type" value="land">
                        <input type="hidden" name="enquirable_id" value="{{ $land->id }}"> --}}

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Name</label>
                            <input type="text" name="name" value="{{ old('name', auth()->user()->name ?? '') }}"
                                   class="mt-1 w-full rounded-lg border-gray-300 focus:border-sky-500 focus:ring-sky-500"
                                   required>
                            @error('name') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" value="{{ old('email', auth()->user()->email ?? '') }}"
                                   class="mt-1 w-full rounded-lg border-gray-300 focus:border-sky-500 focus:ring-sky-500"
                                   required>
                            @error('email') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Phone</label>
                            <input type="text" name="phone" value="{{ old('phone') }}"
                                   class="mt-1 w-full rounded-lg border-gray-300 focus:border-sky-500 focus:ring-sky-500">
                            @error('phone') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700">Message</label>
                            <textarea name="message" rows="4"
                                      class="mt-1 w-full rounded-lg border-gray-300 focus:border-sky-500 focus:ring-sky-500"
                                      placeholder="Tell us more about your requirement...">{{ old('message') }}</textarea>
                            @error('message') <p class="text-red-600 text-sm mt-1">{{ $message }}</p> @enderror
                        </div>

                        <div class="flex items-center justify-end gap-3 pt-2">
                            <button type="submit"
                                    class="px-6 py-3 bg-sky-600 text-white rounded-lg shadow hover:bg-sky-700">
                                Submit Enquiry
                            </button>
                        </div>
                    </form>
                </div>

                {{-- Quick share (optional) --}}
                <div class="bg-white rounded-2xl shadow p-6">
                    <h3 class="text-lg font-semibold text-slate-800 mb-4">Share</h3>
                    @php $url = request()->fullUrl(); @endphp
                    <div class="flex gap-2">
                        <a class="px-3 py-2 rounded-lg bg-blue-600 text-white text-sm hover:bg-blue-700"
                           target="_blank"
                           href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode($url) }}">Facebook</a>
                        <a class="px-3 py-2 rounded-lg bg-sky-500 text-white text-sm hover:bg-sky-600"
                           target="_blank"
                           href="https://twitter.com/intent/tweet?url={{ urlencode($url) }}&text={{ urlencode($land->title) }}">X</a>
                        <a class="px-3 py-2 rounded-lg bg-green-600 text-white text-sm hover:bg-green-700"
                           target="_blank"
                           href="https://api.whatsapp.com/send?text={{ urlencode($land->title.' - '.$url) }}">WhatsApp</a>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
