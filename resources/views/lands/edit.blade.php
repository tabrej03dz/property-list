{{-- resources/views/lands/edit.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center bg-white shadow-md px-6 py-4 rounded-lg">
            <h2 class="font-bold text-2xl text-gray-800">
                {{ __('Dashboard') }}
            </h2>

            <a href="{{ route('dashboard') }}"
               class="font-bold text-2xl text-white bg-gradient-to-r from-[#c21108] to-[#000308] px-4 py-2 rounded-md shadow-md inline-block hover:from-[#000308] hover:to-[#c21108] focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-[#c21108] transition duration-300 ease-in-out">
                {{ __('Dashboard') }}
            </a>
        </div>
    </x-slot>

    <div class="mt-10 md:px-32">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-2xl font-bold text-gray-800">Edit Land</h3>
            <a href="{{ route('lands.index') }}" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">← Back to list</a>
        </div>

        {{-- Validation errors --}}
        @if ($errors->any())
            <div class="mb-6 rounded-md border border-red-200 bg-red-50 p-4 text-red-800">
                <div class="font-semibold mb-2">Please fix the following:</div>
                <ul class="list-disc ml-5 space-y-1">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @php
            // Safely normalize complex fields for edit screen
            $amenitiesArr = old('amenities_csv') !== null
                ? explode(',', old('amenities_csv'))
                : (is_array($land->amenities ?? null) ? $land->amenities : (is_string($land->amenities ?? null) ? explode(',', $land->amenities) : []));
            $tagsArr = old('tags_csv') !== null
                ? explode(',', old('tags_csv'))
                : (is_array($land->tags ?? null) ? $land->tags : (is_string($land->tags ?? null) ? explode(',', $land->tags) : []));
            $amenitiesCsv = trim(implode(',', array_filter(array_map('trim', $amenitiesArr))));
            $tagsCsv = trim(implode(',', array_filter(array_map('trim', $tagsArr))));

            $docsOld = old('documents');
            $documents = is_array($docsOld) ? $docsOld : ($land->documents ?? []);
            if (!is_array($documents)) { $documents = []; }
            // Ensure at least 3 inputs show
            while (count($documents) < 3) { $documents[] = ''; }
        @endphp

        <form action="{{ route('lands.update', $land) }}" method="POST" enctype="multipart/form-data" class="bg-white shadow rounded-lg p-6 space-y-8">
            @csrf
            @method('PUT')

            {{-- Basic Info --}}
            <section>
                <h4 class="text-lg font-semibold text-gray-900 mb-3">Basic Information</h4>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium">Title *</label>
                        <input name="title" type="text" value="{{ old('title', $land->title) }}" required class="border p-2 rounded w-full">
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Slug (auto if empty)</label>
                        <input name="slug" type="text" value="{{ old('slug', $land->slug) }}" class="border p-2 rounded w-full">
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Reference Code</label>
                        <input name="reference_code" type="text" value="{{ old('reference_code', $land->reference_code) }}" class="border p-2 rounded w-full">
                    </div>

                    <div>
                        <label class="block text-sm font-medium">Listing Type</label>
                        <select name="listing_type" class="border p-2 rounded w-full">
                            @foreach(['sale','rent','lease'] as $opt)
                                <option value="{{ $opt }}" @selected(old('listing_type', $land->listing_type)===$opt)>{{ ucfirst($opt) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Status</label>
                        <select name="status" class="border p-2 rounded w-full">
                            @foreach(['draft','published','archived', 'available', 'sold'] as $opt)
                                <option value="{{ $opt }}" @selected(old('status', $land->status)===$opt)>{{ ucfirst($opt) }}</option>
                            @endforeach
                        </select>
                    </div>
{{--                    <div>--}}
{{--                        <label class="block text-sm font-medium">User (Owner)</label>--}}
{{--                        <input name="user_id" type="number" value="{{ old('user_id', $land->user_id) }}" class="border p-2 rounded w-full" placeholder="User ID (optional)">--}}
{{--                    </div>--}}

                    <div class="md:col-span-3">
                        <label class="block text-sm font-medium">Description</label>
                        <textarea name="description" rows="4" class="border p-2 rounded w-full">{{ old('description', $land->description) }}</textarea>
                    </div>
                </div>
            </section>

            {{-- Pricing --}}
            <section>
                <h4 class="text-lg font-semibold text-gray-900 mb-3">Pricing</h4>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label class="block text-sm font-medium">Price</label>
                        <input name="price" type="number" step="0.01" value="{{ old('price', $land->price) }}" class="border p-2 rounded w-full">
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Currency</label>
                        <input name="currency" type="text" value="{{ old('currency', $land->currency ?? 'INR') }}" class="border p-2 rounded w-full">
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Price Unit</label>
                        <select name="price_unit" class="border p-2 rounded w-full">
                            @foreach(['total','per_sqft','per_sqyd','per_sqmt','per_acre','per_bigha','per_hectare'] as $opt)
                                <option value="{{ $opt }}" @selected(old('price_unit', $land->price_unit)===$opt)>{{ $opt }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex items-end">
                        <label class="inline-flex items-center gap-2">
                            <input name="is_negotiable" type="checkbox" value="1" @checked(old('is_negotiable', $land->is_negotiable)) class="rounded border-gray-300">
                            <span class="text-sm">Negotiable</span>
                        </label>
                    </div>
                </div>
            </section>

            {{-- Area & Dimensions --}}
            <section>
                <h4 class="text-lg font-semibold text-gray-900 mb-3">Area & Dimensions</h4>
                <div class="grid grid-cols-1 md:grid-cols-6 gap-4">
                    <div>
                        <label class="block text-sm font-medium">Area Value</label>
                        <input name="area_value" type="number" step="0.01" value="{{ old('area_value', $land->area_value) }}" class="border p-2 rounded w-full">
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Area Unit</label>
                        <select name="area_unit" class="border p-2 rounded w-full">
                            @foreach(['sqft','sqyd','sqmt','acre','hectare','bigha','guntha','cent','marla','biswa','katha'] as $opt)
                                <option value="{{ $opt }}" @selected(old('area_unit', $land->area_unit)===$opt)>{{ $opt }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Plot Length</label>
                        <input name="plot_length" type="number" step="0.01" value="{{ old('plot_length', $land->plot_length) }}" class="border p-2 rounded w-full">
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Plot Breadth</label>
                        <input name="plot_breadth" type="number" step="0.01" value="{{ old('plot_breadth', $land->plot_breadth) }}" class="border p-2 rounded w-full">
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Dimensions Unit</label>
                        <select name="dimensions_unit" class="border p-2 rounded w-full">
                            @foreach(['ft','yd','m'] as $opt)
                                <option value="{{ $opt }}" @selected(old('dimensions_unit', $land->dimensions_unit)===$opt)>{{ strtoupper($opt) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Frontage</label>
                        <input name="frontage" type="number" step="0.01" value="{{ old('frontage', $land->frontage) }}" class="border p-2 rounded w-full" placeholder="e.g., road frontage">
                    </div>

                    <div>
                        <label class="block text-sm font-medium">Road Width</label>
                        <input name="road_width" type="number" step="0.01" value="{{ old('road_width', $land->road_width) }}" class="border p-2 rounded w-full">
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Road Unit</label>
                        <select name="road_unit" class="border p-2 rounded w-full">
                            @foreach(['ft','m','yd'] as $opt)
                                <option value="{{ $opt }}" @selected(old('road_unit', $land->road_unit)===$opt)>{{ strtoupper($opt) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="flex items-end">
                        <label class="inline-flex items-center gap-2">
                            <input name="corner_plot" type="checkbox" value="1" @checked(old('corner_plot', $land->corner_plot)) class="rounded border-gray-300">
                            <span class="text-sm">Corner Plot</span>
                        </label>
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Facing</label>
                        <select name="facing" class="border p-2 rounded w-full">
                            <option value="">—</option>
                            @foreach(['N','NE','E','SE','S','SW','W','NW'] as $opt)
                                <option value="{{ $opt }}" @selected(old('facing', $land->facing)===$opt)>{{ $opt }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Shape</label>
                        <select name="shape" class="border p-2 rounded w-full">
                            <option value="">—</option>
                            @foreach(['rectangular','square','irregular','trapezium','triangular','other'] as $opt)
                                <option value="{{ $opt }}" @selected(old('shape', $land->shape)===$opt)>{{ ucfirst($opt) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </section>

            {{-- Use, Zoning, Buildability --}}
            <section>
                <h4 class="text-lg font-semibold text-gray-900 mb-3">Use, Zoning & Buildability</h4>
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label class="block text-sm font-medium">Land Use</label>
                        <select name="land_use" class="border p-2 rounded w-full">
                            <option value="">—</option>
                            @foreach(['residential','commercial','agricultural','industrial','mixed','institutional','warehouse'] as $opt)
                                <option value="{{ $opt }}" @selected(old('land_use', $land->land_use)===$opt)>{{ ucfirst($opt) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Zoning</label>
                        <input name="zoning" type="text" value="{{ old('zoning', $land->zoning) }}" class="border p-2 rounded w-full">
                    </div>
                    <div>
                        <label class="block text-sm font-medium">FSI / FAR</label>
                        <input name="fsi" type="number" step="0.01" value="{{ old('fsi', $land->fsi) }}" class="border p-2 rounded w-full">
                    </div>
                </div>
            </section>

            {{-- Ownership & Legal --}}
            <section>
                <h4 class="text-lg font-semibold text-gray-900 mb-3">Ownership & Legal</h4>
                <div class="grid grid-cols-1 md:grid-cols-6 gap-4">
                    <div>
                        <label class="block text-sm font-medium">Ownership</label>
                        <select name="ownership" class="border p-2 rounded w-full">
                            <option value="">—</option>
                            @foreach(['freehold','leasehold','power_of_attorney','cooperative','company','other'] as $opt)
                                <option value="{{ $opt }}" @selected(old('ownership', $land->ownership)===$opt)>{{ ucwords(str_replace('_',' ',$opt)) }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Tenure (years)</label>
                        <input name="tenure_years" type="number" value="{{ old('tenure_years', $land->tenure_years) }}" class="border p-2 rounded w-full">
                    </div>
                    <div>
                        <label class="block text-sm font-medium">RERA ID</label>
                        <input name="rera_id" type="text" value="{{ old('rera_id', $land->rera_id) }}" class="border p-2 rounded w-full">
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Survey No.</label>
                        <input name="survey_number" type="text" value="{{ old('survey_number', $land->survey_number) }}" class="border p-2 rounded w-full">
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Khasra No.</label>
                        <input name="khasra_number" type="text" value="{{ old('khasra_number', $land->khasra_number) }}" class="border p-2 rounded w-full">
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Plot No.</label>
                        <input name="plot_number" type="text" value="{{ old('plot_number', $land->plot_number) }}" class="border p-2 rounded w-full">
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Khata No.</label>
                        <input name="khata_number" type="text" value="{{ old('khata_number', $land->khata_number) }}" class="border p-2 rounded w-full">
                    </div>

                    <div class="flex items-end">
                        <label class="inline-flex items-center gap-2">
                            <input name="is_non_agricultural" type="checkbox" value="1" @checked(old('is_non_agricultural', $land->is_non_agricultural)) class="rounded border-gray-300">
                            <span class="text-sm">Non-Agricultural (NA) converted</span>
                        </label>
                    </div>
                    <div class="flex items-end">
                        <label class="inline-flex items-center gap-2">
                            <input name="title_clear" type="checkbox" value="1" @checked(old('title_clear', (isset($land->title_clear) ? $land->title_clear : true))) class="rounded border-gray-300">
                            <span class="text-sm">Title Clear</span>
                        </label>
                    </div>
                    <div class="flex items-end">
                        <label class="inline-flex items-center gap-2">
                            <input name="loan_available" type="checkbox" value="1" @checked(old('loan_available', $land->loan_available)) class="rounded border-gray-300">
                            <span class="text-sm">Loan Available</span>
                        </label>
                    </div>
                    <div class="md:col-span-3">
                        <label class="block text-sm font-medium">Encumbrances / Notes</label>
                        <textarea name="encumbrances" rows="3" class="border p-2 rounded w-full">{{ old('encumbrances', $land->encumbrances) }}</textarea>
                    </div>
                </div>
            </section>

            {{-- Utilities & On-site Features --}}
            <section>
                <h4 class="text-lg font-semibold text-gray-900 mb-3">Utilities & On-site Features</h4>
                <div class="grid grid-cols-2 md:grid-cols-5 gap-3">
                    @php
                        $utils = [
                            'water_connection' => 'Water',
                            'electricity_connection' => 'Electricity',
                            'sewage_connection' => 'Sewage',
                            'gas_connection' => 'Gas',
                            'borewell' => 'Borewell',
                            'compound_wall' => 'Compound Wall',
                            'street_lights' => 'Street Lights',
                            'drainage' => 'Drainage',
                            'rainwater_harvesting' => 'Rainwater Harvesting',
                            'irrigation_facility' => 'Irrigation'
                        ];
                    @endphp
                    @foreach($utils as $name => $label)
                        <label class="inline-flex items-center gap-2">
                            <input type="checkbox" name="{{ $name }}" value="1" @checked(old($name, $land->$name)) class="rounded border-gray-300">
                            <span class="text-sm">{{ $label }}</span>
                        </label>
                    @endforeach
                </div>
            </section>

            {{-- Amenities, Tags, Documents --}}
            <section>
                <h4 class="text-lg font-semibold text-gray-900 mb-3">Documents</h4>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium">Documents (URLs)</label>
                        @foreach($documents as $i => $doc)
                            <input name="documents[]" type="text" value="{{ $doc }}" class="border p-2 rounded w-full mb-2" placeholder="https://...">
                        @endforeach
                    </div>
                </div>
            </section>

            {{-- Media --}}
            <section>
                <h4 class="text-lg font-semibold text-gray-900 mb-3">Media</h4>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div>
                        <label class="block text-sm font-medium">Primary Image</label>
                        <input name="primary_image_file" type="file" class="border p-2 rounded w-full">
                        @if(!empty($land->primary_image))
                            <p class="text-xs text-gray-500 mt-1">Current: {{ $land->primary_image }}</p>
                            <img src="{{ asset('storage/'.$land->primary_image) }}" alt="Primary" class="mt-2 max-h-32 rounded border">
                        @endif
                    </div>
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium">Gallery (multiple)</label>
                        <input name="gallery_files[]" type="file" multiple class="border p-2 rounded w-full">
                        @if(!empty($land->images))
                            <div class="flex gap-2 mt-2 flex-wrap">
                                @foreach($land->images as $g)
                                    <div class="relative inline-block m-2 w-28 h-20">
                                        <img src="{{ asset('storage/'. $g->path) }}"
                                            alt="Gallery"
                                            class="w-28 h-20 object-cover rounded border">

                                        <!-- Cross Button -->
                                        <a href="{{ route('lands.image.delete', ['image' =>  $g->id]) }}"
                                            class="absolute top-1 right-1">
                                            <span class="bg-red-600 text-white rounded-full w-5 h-5 flex items-center justify-center text-xs hover:bg-red-700 shadow">
                                                ✕
                                            </span>
                                        </a>
                                    </div>
                                @endforeach
                            </div>
                        @endif
                    </div>
{{--                    <div>--}}
{{--                        <label class="block text-sm font-medium">Video URL</label>--}}
{{--                        <input name="video_url" type="url" value="{{ old('video_url', $land->video_url) }}" class="border p-2 rounded w-full">--}}
{{--                    </div>--}}
{{--                    <div>--}}
{{--                        <label class="block text-sm font-medium">Virtual Tour URL</label>--}}
{{--                        <input name="virtual_tour_url" type="url" value="{{ old('virtual_tour_url', $land->virtual_tour_url) }}" class="border p-2 rounded w-full">--}}
{{--                    </div>--}}
                </div>
            </section>

            {{-- Location --}}
            <section>
                <h4 class="text-lg font-semibold text-gray-900 mb-3">Location</h4>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="md:col-span-3">
                        <label class="block text-sm font-medium">Address Line</label>
                        <input name="address_line" type="text" value="{{ old('address_line', $land->address_line) }}" class="border p-2 rounded w-full">
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Landmark</label>
                        <input name="landmark" type="text" value="{{ old('landmark', $land->landmark) }}" class="border p-2 rounded w-full">
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Locality</label>
                        <input name="locality" type="text" value="{{ old('locality', $land->locality) }}" class="border p-2 rounded w-full">
                    </div>
                    <div>
                        <label class="block text-sm font-medium">City</label>
                        <input name="city" type="text" value="{{ old('city', $land->city) }}" class="border p-2 rounded w-full">
                    </div>
                    <div>
                        <label class="block text-sm font-medium">District</label>
                        <input name="district" type="text" value="{{ old('district', $land->district) }}" class="border p-2 rounded w-full">
                    </div>
                    <div>
                        <label class="block text-sm font-medium">State</label>
                        <input name="state" type="text" value="{{ old('state', $land->state) }}" class="border p-2 rounded w-full">
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Pincode</label>
                        <input name="pincode" type="text" value="{{ old('pincode', $land->pincode) }}" class="border p-2 rounded w-full">
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Country</label>
                        <input name="country" type="text" value="{{ old('country', $land->country ?? 'India') }}" class="border p-2 rounded w-full">
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Latitude</label>
                        <input name="latitude" type="text" value="{{ old('latitude', $land->latitude) }}" class="border p-2 rounded w-full">
                    </div>
                    <div>
                        <label class="block text-sm font-medium">Longitude</label>
                        <input name="longitude" type="text" value="{{ old('longitude', $land->longitude) }}" class="border p-2 rounded w-full">
                    </div>
                </div>
            </section>

            {{-- SEO --}}
            <section>
                <h4 class="text-lg font-semibold text-gray-900 mb-3">SEO</h4>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                    <div class="md:col-span-3">
                        <label class="block text-sm font-medium">Meta Title</label>
                        <input name="meta_title" type="text" value="{{ old('meta_title', $land->meta_title) }}" class="border p-2 rounded w-full">
                    </div>
                    <div class="md:col-span-3">
                        <label class="block text-sm font-medium">Meta Description</label>
                        <input name="meta_description" type="text" value="{{ old('meta_description', $land->meta_description) }}" class="border p-2 rounded w-full">
                    </div>
                    <div class="md:col-span-3">
                        <label class="block text-sm font-medium">Meta Keywords</label>
                        <input name="meta_keywords" type="text" value="{{ old('meta_keywords', $land->meta_keywords) }}" class="border p-2 rounded w-full" placeholder="comma,separated,keywords">
                    </div>
                </div>
            </section>

            <div class="flex gap-2">
                <button class="px-4 py-2 text-white bg-gradient-to-r from-[#c21108] to-[#000308] rounded shadow hover:from-[#000308] hover:to-[#c21108]">
                    Update
                </button>
                <a href="{{ route('lands.index') }}" class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">Cancel</a>
            </div>
        </form>
    </div>
</x-app-layout>
