{{-- resources/views/lands/show.blade.php --}}
<x-app-layout>
    <x-slot name="header">
        <div class="flex flex-col gap-3 md:flex-row md:items-center md:justify-between bg-white shadow-md px-6 py-4 w-full">
            <div>
                <h2 class="font-bold text-2xl text-gray-900">Land Details</h2>
                <p class="text-sm text-gray-500">Reference: {{ $land->reference_code ?: '—' }}</p>
            </div>
            <div class="flex items-center gap-2">
                <a href="{{ route('lands.index') }}"
                   class="px-3 py-2 text-sm rounded-md border border-gray-200 hover:bg-gray-50">
                    ← Back to list
                </a>
                <a href="{{ route('lands.edit', $land) }}"
                   class="px-4 py-2 text-sm font-medium text-white bg-gray-900 rounded-md hover:bg-black">
                    Edit
                </a>
                <a href="{{ route('dashboard') }}"
                   class="px-4 py-2 text-sm font-semibold text-white bg-gradient-to-r from-[#c21108] to-[#000308] rounded-md shadow hover:from-[#000308] hover:to-[#c21108]">
                    Dashboard
                </a>
            </div>
        </div>
    </x-slot>

    @php
        // Badge color helpers
        $statusColors = [
            'draft' => 'bg-yellow-100 text-yellow-800 ring-yellow-200',
            'published' => 'bg-green-100 text-green-800 ring-green-200',
            'archived' => 'bg-gray-100 text-gray-800 ring-gray-200',
        ];
        $listingColors = [
            'sale' => 'bg-blue-100 text-blue-800 ring-blue-200',
            'rent' => 'bg-purple-100 text-purple-800 ring-purple-200',
            'lease' => 'bg-rose-100 text-rose-800 ring-rose-200',
        ];
        $statusChip = $statusColors[$land->status ?? 'draft'] ?? 'bg-gray-100 text-gray-800 ring-gray-200';
        $typeChip = $listingColors[$land->listing_type ?? 'sale'] ?? 'bg-gray-100 text-gray-800 ring-gray-200';

        // Utilities map
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
            'irrigation_facility' => 'Irrigation',
        ];

        // Normalize amenities/tags/documents
        $amenitiesArr = is_array($land->amenities ?? null)
            ? $land->amenities
            : (is_string($land->amenities ?? null) ? array_filter(array_map('trim', explode(',', $land->amenities))) : []);

        $tagsArr = is_array($land->tags ?? null)
            ? $land->tags
            : (is_string($land->tags ?? null) ? array_filter(array_map('trim', explode(',', $land->tags))) : []);

        $docs = is_array($land->documents ?? null)
            ? $land->documents
            : (is_string($land->documents ?? null) ? array_filter(array_map('trim', explode(',', $land->documents))) : []);

        // Maps
        $hasGeo = $land->latitude && $land->longitude;
        $mapsUrl = $hasGeo
            ? "https://www.google.com/maps?q={$land->latitude},{$land->longitude}"
            : ( $land->address_line
                ? 'https://www.google.com/maps/search/' . urlencode("{$land->address_line}, {$land->city}, {$land->state} {$land->pincode}")
                : null );
    @endphp

    <div class="mt-6 w-full px-4 md:px-6 lg:px-8">
        {{-- Top summary card --}}
        <div class="bg-white rounded-xl shadow-sm ring-1 ring-gray-100 p-6 w-full">
            <div class="flex flex-col md:flex-row md:items-start md:justify-between gap-4 w-full">
                <div>
                    <h3 class="text-2xl font-semibold text-gray-900">{{ $land->title }}</h3>
                    <div class="flex flex-wrap items-center gap-2 mt-2">
                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium ring-1 {{ $typeChip }}">
                            {{ ucfirst($land->listing_type ?? '—') }}
                        </span>
                        <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium ring-1 {{ $statusChip }}">
                            {{ ucfirst($land->status ?? '—') }}
                        </span>
                        @if($land->facing)
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium ring-1 bg-indigo-50 text-indigo-700 ring-indigo-200">
                                Facing: {{ $land->facing }}
                            </span>
                        @endif
                        @if($land->shape)
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium ring-1 bg-sky-50 text-sky-700 ring-sky-200">
                                Shape: {{ ucfirst($land->shape) }}
                            </span>
                        @endif
                        @if($land->corner_plot)
                            <span class="inline-flex items-center px-2.5 py-1 rounded-full text-xs font-medium ring-1 bg-emerald-50 text-emerald-700 ring-emerald-200">
                                Corner Plot
                            </span>
                        @endif
                    </div>
                </div>

                <div class="text-right">
                    <div class="text-2xl font-bold text-gray-900">
                        @if($land->price)
                            {{ $land->currency ?: 'INR' }} {{ number_format((float) $land->price, 0) }}
                        @else
                            —
                        @endif
                    </div>
                    <div class="text-xs text-gray-500 mt-1">
                        {{ $land->price_unit ? str_replace('_', ' / ', $land->price_unit) : 'total' }}
                        @if($land->is_negotiable) · Negotiable @endif
                    </div>
                    @if($land->area_value)
                        <div class="text-sm text-gray-700 mt-2">
                            Area: <span class="font-medium">{{ $land->area_value }} {{ $land->area_unit ?: '' }}</span>
                        </div>
                    @endif
                </div>
            </div>

            @if($land->description)
                <p class="mt-4 text-gray-700 leading-relaxed max-w-full">
                    {!! nl2br(e($land->description)) !!}
                </p>
            @endif
        </div>

        {{-- Main content grid (full width) --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mt-6 w-full">
            {{-- Left (2/3 width) --}}
            <div class="lg:col-span-2 space-y-6 w-full">
                {{-- Media --}}
                <div class="bg-white rounded-xl shadow-sm ring-1 ring-gray-100 p-6 w-full">
                    <h4 class="text-lg font-semibold text-gray-900 mb-4">Media</h4>

                    @if($land->primary_image)
                        <div class="w-full aspect-[16/9] overflow-hidden rounded-lg ring-1 ring-gray-100">
                            <img src="{{ asset('storage/'.$land->primary_image) }}"
                                 alt="Primary image"
                                 class="w-full h-full object-cover">
                        </div>
                    @endif

                    @if($land->images && $land->images->count())
                        <div class="mt-4 grid grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-3 w-full">
                            @foreach($land->images as $g)
                                <img src="{{ asset('storage/'.$g->path) }}"
                                     alt="Gallery"
                                     class="h-24 w-full object-cover rounded-lg ring-1 ring-gray-100">
                            @endforeach
                        </div>
                    @endif

                    <div class="mt-4 flex flex-wrap gap-3">
                        @if($land->video_url)
                            <a href="{{ $land->video_url }}" target="_blank"
                               class="inline-flex items-center text-sm px-3 py-2 rounded-md ring-1 ring-gray-200 hover:bg-gray-50">
                                Open Video
                            </a>
                        @endif
                        @if($land->virtual_tour_url)
                            <a href="{{ $land->virtual_tour_url }}" target="_blank"
                               class="inline-flex items-center text-sm px-3 py-2 rounded-md ring-1 ring-gray-200 hover:bg-gray-50">
                                Virtual Tour
                            </a>
                        @endif
                    </div>
                </div>

                {{-- Specifications (Area, Dimensions, Buildability) --}}
                <div class="bg-white rounded-xl shadow-sm ring-1 ring-gray-100 p-6 w-full">
                    <h4 class="text-lg font-semibold text-gray-900 mb-4">Specifications</h4>
                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 text-sm">
                        <div class="p-3 rounded-lg bg-gray-50">
                            <div class="text-gray-500">Area</div>
                            <div class="font-medium text-gray-900">
                                {{ $land->area_value ?: '—' }} {{ $land->area_unit ?: '' }}
                            </div>
                        </div>
                        <div class="p-3 rounded-lg bg-gray-50">
                            <div class="text-gray-500">Plot Size</div>
                            <div class="font-medium text-gray-900">
                                {{ $land->plot_length ?: '—' }} × {{ $land->plot_breadth ?: '—' }} {{ strtoupper($land->dimensions_unit ?: 'ft') }}
                            </div>
                        </div>
                        <div class="p-3 rounded-lg bg-gray-50">
                            <div class="text-gray-500">Frontage</div>
                            <div class="font-medium text-gray-900">
                                {{ $land->frontage ?: '—' }} {{ strtoupper($land->dimensions_unit ?: 'ft') }}
                            </div>
                        </div>
                        <div class="p-3 rounded-lg bg-gray-50">
                            <div class="text-gray-500">Road Width</div>
                            <div class="font-medium text-gray-900">
                                {{ $land->road_width ?: '—' }} {{ strtoupper($land->road_unit ?: 'ft') }}
                            </div>
                        </div>
                        <div class="p-3 rounded-lg bg-gray-50">
                            <div class="text-gray-500">Land Use</div>
                            <div class="font-medium text-gray-900">{{ $land->land_use ? ucfirst($land->land_use) : '—' }}</div>
                        </div>
                        <div class="p-3 rounded-lg bg-gray-50">
                            <div class="text-gray-500">Zoning</div>
                            <div class="font-medium text-gray-900">{{ $land->zoning ?: '—' }}</div>
                        </div>
                        <div class="p-3 rounded-lg bg-gray-50">
                            <div class="text-gray-500">FSI / FAR</div>
                            <div class="font-medium text-gray-900">{{ $land->fsi ?: '—' }}</div>
                        </div>
                        <div class="p-3 rounded-lg bg-gray-50">
                            <div class="text-gray-500">Facing</div>
                            <div class="font-medium text-gray-900">{{ $land->facing ?: '—' }}</div>
                        </div>
                        <div class="p-3 rounded-lg bg-gray-50">
                            <div class="text-gray-500">Shape</div>
                            <div class="font-medium text-gray-900">{{ $land->shape ? ucfirst($land->shape) : '—' }}</div>
                        </div>
                        <div class="p-3 rounded-lg bg-gray-50">
                            <div class="text-gray-500">Corner Plot</div>
                            <div class="font-medium text-gray-900">{{ $land->corner_plot ? 'Yes' : 'No' }}</div>
                        </div>
                    </div>
                </div>

                {{-- Amenities & Utilities --}}
                <div class="bg-white rounded-xl shadow-sm ring-1 ring-gray-100 p-6 w-full">
                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 mb-3">Amenities</h4>
                            @if(count($amenitiesArr))
                                <div class="flex flex-wrap gap-2">
                                    @foreach($amenitiesArr as $a)
                                        <span class="px-3 py-1 rounded-full text-xs font-medium bg-gray-100 text-gray-800 ring-1 ring-gray-200">{{ $a }}</span>
                                    @endforeach
                                </div>
                            @else
                                <p class="text-sm text-gray-500">No amenities specified.</p>
                            @endif

                            @if(count($tagsArr))
                                <h5 class="mt-4 text-sm font-semibold text-gray-900">Tags</h5>
                                <div class="mt-2 flex flex-wrap gap-2">
                                    @foreach($tagsArr as $t)
                                        <span class="px-2.5 py-1 rounded-full text-[11px] font-medium bg-blue-50 text-blue-700 ring-1 ring-blue-200">{{ $t }}</span>
                                    @endforeach
                                </div>
                            @endif
                        </div>

                        <div>
                            <h4 class="text-lg font-semibold text-gray-900 mb-3">Utilities & On-site</h4>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-2">
                                @foreach($utils as $name => $label)
                                    <div class="flex items-center justify-between rounded-md px-3 py-2 ring-1
                                        {{ $land->$name ? 'bg-emerald-50 ring-emerald-200' : 'bg-gray-50 ring-gray-200' }}">
                                        <span class="text-sm text-gray-800">{{ $label }}</span>
                                        <span class="text-xs font-medium {{ $land->$name ? 'text-emerald-700' : 'text-gray-600' }}">
                                            {{ $land->$name ? 'Available' : 'Not available' }}
                                        </span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Ownership & Legal --}}
                <div class="bg-white rounded-xl shadow-sm ring-1 ring-gray-100 p-6 w-full">
                    <h4 class="text-lg font-semibold text-gray-900 mb-4">Ownership & Legal</h4>
                    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-4 text-sm">
                        <div class="p-3 rounded-lg bg-gray-50">
                            <div class="text-gray-500">Ownership</div>
                            <div class="font-medium text-gray-900">{{ $land->ownership ? ucwords(str_replace('_',' ', $land->ownership)) : '—' }}</div>
                        </div>
                        <div class="p-3 rounded-lg bg-gray-50">
                            <div class="text-gray-500">Tenure (years)</div>
                            <div class="font-medium text-gray-900">{{ $land->tenure_years ?: '—' }}</div>
                        </div>
                        <div class="p-3 rounded-lg bg-gray-50">
                            <div class="text-gray-500">RERA ID</div>
                            <div class="font-medium text-gray-900">{{ $land->rera_id ?: '—' }}</div>
                        </div>

                        <div class="p-3 rounded-lg bg-gray-50">
                            <div class="text-gray-500">Survey No.</div>
                            <div class="font-medium text-gray-900">{{ $land->survey_number ?: '—' }}</div>
                        </div>
                        <div class="p-3 rounded-lg bg-gray-50">
                            <div class="text-gray-500">Khasra No.</div>
                            <div class="font-medium text-gray-900">{{ $land->khasra_number ?: '—' }}</div>
                        </div>
                        <div class="p-3 rounded-lg bg-gray-50">
                            <div class="text-gray-500">Plot No.</div>
                            <div class="font-medium text-gray-900">{{ $land->plot_number ?: '—' }}</div>
                        </div>
                        <div class="p-3 rounded-lg bg-gray-50">
                            <div class="text-gray-500">Khata No.</div>
                            <div class="font-medium text-gray-900">{{ $land->khata_number ?: '—' }}</div>
                        </div>

                        <div class="p-3 rounded-lg bg-gray-50">
                            <div class="text-gray-500">NA Converted</div>
                            <div class="font-medium text-gray-900">{{ $land->is_non_agricultural ? 'Yes' : 'No' }}</div>
                        </div>
                        <div class="p-3 rounded-lg bg-gray-50">
                            <div class="text-gray-500">Title Clear</div>
                            <div class="font-medium text-gray-900">{{ $land->title_clear ? 'Yes' : 'No' }}</div>
                        </div>
                        <div class="p-3 rounded-lg bg-gray-50">
                            <div class="text-gray-500">Loan Available</div>
                            <div class="font-medium text-gray-900">{{ $land->loan_available ? 'Yes' : 'No' }}</div>
                        </div>
                    </div>

                    @if($land->encumbrances)
                        <div class="mt-4">
                            <div class="text-gray-500 text-sm">Encumbrances / Notes</div>
                            <div class="mt-1 text-gray-800 bg-gray-50 rounded-lg p-3 ring-1 ring-gray-200">
                                {!! nl2br(e($land->encumbrances)) !!}
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Right (1/3 width) --}}
            <div class="space-y-6 w-full">
                {{-- Basic Info (compact) --}}
                <div class="bg-white rounded-xl shadow-sm ring-1 ring-gray-100 p-6">
                    <h4 class="text-lg font-semibold text-gray-900 mb-4">Basic Information</h4>
                    <dl class="text-sm">
                        <dt class="text-gray-500">Slug</dt>
                        <dd class="mb-3 font-medium text-gray-900">{{ $land->slug ?: '—' }}</dd>

                        <dt class="text-gray-500">Status</dt>
                        <dd class="mb-3 font-medium text-gray-900">{{ $land->status ? ucfirst($land->status) : '—' }}</dd>

                        <dt class="text-gray-500">Listing Type</dt>
                        <dd class="mb-3 font-medium text-gray-900">{{ $land->listing_type ? ucfirst($land->listing_type) : '—' }}</dd>

                        <dt class="text-gray-500">Owner (User ID)</dt>
                        <dd class="mb-3 font-medium text-gray-900">{{ $land->user_id ?: '—' }}</dd>

                        <dt class="text-gray-500">Created</dt>
                        <dd class="mb-3 text-gray-900">{{ optional($land->created_at)->format('d M Y, h:i A') ?: '—' }}</dd>

                        <dt class="text-gray-500">Updated</dt>
                        <dd class="text-gray-900">{{ optional($land->updated_at)->format('d M Y, h:i A') ?: '—' }}</dd>
                    </dl>
                </div>

                {{-- Location --}}
                <div class="bg-white rounded-xl shadow-sm ring-1 ring-gray-100 p-6">
                    <h4 class="text-lg font-semibold text-gray-900 mb-4">Location</h4>
                    <div class="text-sm text-gray-800 space-y-1">
                        @if($land->address_line) <div>{{ $land->address_line }}</div> @endif
                        <div>
                            {{ $land->landmark ? $land->landmark . ', ' : '' }}
                            {{ $land->locality ? $land->locality . ', ' : '' }}
                            {{ $land->city ?: '' }}{{ $land->district ? ', ' . $land->district : '' }}
                        </div>
                        <div>{{ $land->state ?: '' }} {{ $land->pincode ?: '' }}</div>
                        <div>{{ $land->country ?: 'India' }}</div>
                        @if($hasGeo)
                            <div class="text-xs text-gray-500 mt-2">Lat {{ $land->latitude }}, Lng {{ $land->longitude }}</div>
                        @endif
                    </div>

                    @if($mapsUrl)
                        <a href="{{ $mapsUrl }}" target="_blank"
                           class="mt-4 inline-flex items-center w-full justify-center rounded-md px-3 py-2 text-sm ring-1 ring-gray-200 hover:bg-gray-50">
                            Open in Google Maps
                        </a>
                    @endif
                </div>

                {{-- Pricing (compact) --}}
                <div class="bg-white rounded-xl shadow-sm ring-1 ring-gray-100 p-6">
                    <h4 class="text-lg font-semibold text-gray-900 mb-4">Pricing</h4>
                    <dl class="text-sm">
                        <dt class="text-gray-500">Price</dt>
                        <dd class="mb-3 font-medium text-gray-900">
                            @if($land->price) {{ $land->currency ?: 'INR' }} {{ number_format((float) $land->price, 0) }} @else — @endif
                        </dd>

                        <dt class="text-gray-500">Unit</dt>
                        <dd class="mb-3 text-gray-900">{{ $land->price_unit ? str_replace('_',' / ', $land->price_unit) : 'total' }}</dd>

                        <dt class="text-gray-500">Negotiable</dt>
                        <dd class="text-gray-900">{{ $land->is_negotiable ? 'Yes' : 'No' }}</dd>
                    </dl>
                </div>

                {{-- SEO --}}
                <div class="bg-white rounded-xl shadow-sm ring-1 ring-gray-100 p-6">
                    <h4 class="text-lg font-semibold text-gray-900 mb-4">SEO</h4>
                    <div class="space-y-3 text-sm">
                        <div>
                            <div class="text-gray-500">Meta Title</div>
                            <div class="font-medium text-gray-900 break-words">{{ $land->meta_title ?: '—' }}</div>
                        </div>
                        <div>
                            <div class="text-gray-500">Meta Description</div>
                            <div class="text-gray-900 break-words">{{ $land->meta_description ?: '—' }}</div>
                        </div>
                        <div>
                            <div class="text-gray-500">Meta Keywords</div>
                            <div class="text-gray-900 break-words">{{ $land->meta_keywords ?: '—' }}</div>
                        </div>
                    </div>
                </div>

                {{-- Documents --}}
                <div class="bg-white rounded-xl shadow-sm ring-1 ring-gray-100 p-6">
                    <h4 class="text-lg font-semibold text-gray-900 mb-4">Documents</h4>
                    @if(count($docs))
                        <ul class="space-y-2 text-sm">
                            @foreach($docs as $i => $d)
                                <li class="flex items-center justify-between gap-3">
                                    <a href="{{ $d }}" target="_blank"
                                       class="truncate text-blue-700 hover:underline">{{ $d }}</a>
                                    <button type="button"
                                            onclick="navigator.clipboard.writeText('{{ $d }}')"
                                            class="shrink-0 px-2 py-1 text-xs rounded-md ring-1 ring-gray-200 hover:bg-gray-50">
                                        Copy
                                    </button>
                                </li>
                            @endforeach
                        </ul>
                    @else
                        <p class="text-sm text-gray-500">No documents added.</p>
                    @endif
                </div>
            </div>
        </div>

        {{-- Footer action bar --}}
        <div class="mt-8 flex flex-wrap gap-3">
            <a href="{{ route('lands.index') }}"
               class="px-4 py-2 rounded-md ring-1 ring-gray-200 hover:bg-gray-50">
                Back to list
            </a>
            <a href="{{ route('lands.edit', $land) }}"
               class="px-4 py-2 rounded-md text-white bg-gray-900 hover:bg-black">
                Edit
            </a>
            @if($mapsUrl)
                <a href="{{ $mapsUrl }}" target="_blank"
                   class="px-4 py-2 rounded-md ring-1 ring-gray-200 hover:bg-gray-50">
                    Open in Google Maps
                </a>
            @endif
        </div>
    </div>
</x-app-layout>
