@extends('component.main')
@section('content')
    {{-- ================== Banner ================== --}}
    <div class="w-full h-[300px] md:h-[400px] relative">
        <img src="https://cdn.pixabay.com/photo/2015/10/05/14/50/farm-972717_1280.jpg" alt="Property Banner"
            class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black/50 flex flex-col items-center justify-center text-center">
            <h1 class="text-3xl md:text-5xl font-bold text-white">Premium Agricultural Land for Sale</h1>
            <p class="mt-2 text-lg text-white flex items-center justify-center gap-2">
                <span class="material-symbols-outlined text-white">location_on</span>
                Green Valley, Pune, India
            </p>
            <p class="mt-4 text-xl font-semibold text-white">
                ₹2.5 Cr <span class="text-white text-base">(per acre)</span>
            </p>
        </div>
    </div>


    {{-- ================== Featured Properties ================== --}}
    <div class="max-w-6xl mx-auto py-12 px-6">
        <h2 class="text-3xl font-bold text-center mb-10 text-gray-800">Featured Luxury Lands</h2>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">

            @foreach ($lands as $land)
                {{-- ====== Property Card 1 ====== --}}
                <div
                    class="group relative bg-white rounded-2xl shadow-lg overflow-hidden hover:shadow-2xl transition-all duration-500">
                    <div class="relative">
                        <img src="https://images.unsplash.com/photo-1599423300746-b62533397364?auto=format&fit=crop&w=800&q=80"
                            class="w-full h-60 object-cover group-hover:scale-105 transition-transform duration-500" />
                        <span
                            class="absolute top-4 left-4 bg-green-600 text-white text-xs font-semibold px-3 py-1 rounded-full shadow-md">For
                            Sale</span>
                    </div>
                    <div class="p-6 space-y-4">
                        <div class="flex justify-between items-center">
                            <h3 class="text-xl font-bold text-gray-900">{{$land->title}}</h3>
                            <span class="text-lg font-semibold text-green-600">{{$land->currency .' '. $land->price }}</span>
                        </div>
                        <p class="text-gray-600 text-sm">Reference Code: <span class="font-medium text-gray-800">{{$land->reference_code}}</span>
                        </p>
                        <div class="grid grid-cols-2 gap-4 text-sm text-gray-700">
                            <div>
                                <p><span class="font-medium">Area:</span> {{$land->area_value .' '. $land->area_unit }} Acres</p>
                                <p><span class="font-medium">Facing:</span> {{$land->facing }}</p>
                                <p><span class="font-medium">Shape:</span> {{$land->shape  }}</p>
                            </div>
                            <div>
                                <p><span class="font-medium">Location:</span>{{$land->location }}</p>
                                <p><span class="font-medium">Land Use:</span> {{$land->land_use }}</p>
                                <p><span class="font-medium">Road:</span> {{$land->road_width .' '. $land->road_unit }}</p>
                            </div>
                        </div>
                        <div class="pt-4 flex justify-between items-center">
                            <!-- Trigger -->
                            <div class="flex justify-center mt-10">
                                {{-- <button onclick="openModal()"
                                    class="px-6 py-3 bg-sky-600 text-white font-medium rounded-lg shadow-md hover:bg-sky-700 transition">
                                    View Details
                                </button> --}}
                                <a href="{{ route('land.details', $land->id) }}"
                                    class="px-6 py-3 bg-sky-600 text-white font-medium rounded-lg shadow-md hover:bg-sky-700 transition">
                                    View Details
                                </a>
                            </div>
                            <div class="flex justify-center mt-10">

                                <button
                                    class="px-6 py-3 bg-green-600 text-white rounded-lg text-sm font-medium hover:bg-green-700 transition">
                                    Contact Agent
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>


    {{-- ================== Modal (Property 1) ================== --}}
    {{-- <div id="property1" class="fixed inset-0 bg-black/60 hidden items-center justify-center p-4 z-50 target:flex">
        <div class="bg-white rounded-2xl shadow-2xl max-w-3xl w-full relative overflow-y-auto max-h-[90vh]">
            <a href="#" class="absolute top-4 right-4 text-gray-600 hover:text-gray-900">
                <span class="material-symbols-outlined">close</span>
            </a>
            <div class="p-6 space-y-6">
                <img src="https://images.unsplash.com/photo-1599423300746-b62533397364?auto=format&fit=crop&w=800&q=80"
                    class="w-full h-64 object-cover rounded-xl" />
                <h3 class="text-2xl font-bold text-gray-900">Premium Agricultural Land</h3>
                <p class="text-lg font-semibold text-green-600">₹2.5 Cr (per acre)</p>

                <div class="grid grid-cols-2 gap-4 text-sm">
                    <p><span class="font-medium">Area:</span> 5 Acres</p>
                    <p><span class="font-medium">Facing:</span> East</p>
                    <p><span class="font-medium">Shape:</span> Rectangular</p>
                    <p><span class="font-medium">Road:</span> 30 ft</p>
                </div>

                <div class="flex gap-4">
                    <button class="flex-1 bg-green-600 hover:bg-green-700 text-white py-3 px-6 rounded-lg font-medium">
                        Contact Agent
                    </button>
                    <button class="flex-1 bg-blue-600 hover:bg-blue-700 text-white py-3 px-6 rounded-lg font-medium">
                        Schedule Visit
                    </button>
                </div>
            </div>
        </div>
    </div> --}}


    {{-- ================== Modal (Property 2) ================== --}}
    {{-- <div id="property2" class="fixed inset-0 bg-black/60 hidden items-center justify-center p-4 z-50 target:flex">
        <div class="bg-white rounded-2xl shadow-2xl max-w-3xl w-full relative overflow-y-auto max-h-[90vh]">
            <a href="#" class="absolute top-4 right-4 text-gray-600 hover:text-gray-900">
                <span class="material-symbols-outlined">close</span>
            </a>
            <div class="p-6 space-y-6">
                <img src="https://images.unsplash.com/photo-1580587771525-78b9dba3b914?auto=format&fit=crop&w=800&q=80"
                    class="w-full h-64 object-cover rounded-xl" />
                <h3 class="text-2xl font-bold text-gray-900">River-Facing Farmland</h3>
                <p class="text-lg font-semibold text-green-600">₹1.8 Cr (total price)</p>

                <div class="grid grid-cols-2 gap-4 text-sm">
                    <p><span class="font-medium">Area:</span> 3.5 Acres</p>
                    <p><span class="font-medium">Facing:</span> North</p>
                    <p><span class="font-medium">Shape:</span> Irregular</p>
                    <p><span class="font-medium">Road:</span> 30 ft</p>
                </div>

                <div class="flex gap-4">
                    <button
                        class="flex-1 bg-green-600 hover:bg-green-700 text-white py-3 px-6 rounded-lg font-medium">
                        Contact Agent
                    </button>
                    <button
                        class="flex-1 bg-blue-600 hover:bg-blue-700 text-white py-3 px-6 rounded-lg font-medium">
                        Schedule Visit
                    </button>
                </div>
            </div>
        </div>
    </div> --}}



    <!-- Overlay Modal -->
    <div id="propertyModal" class="hidden fixed inset-0 bg-black/50 z-50 flex items-center justify-center">
        <div
            class="bg-white w-11/12 md:w-4/5 lg:w-3/4 xl:w-2/3 max-h-[90vh] overflow-y-auto rounded-2xl shadow-2xl relative animate-fadeIn">

            <!-- Header -->
            <div class="flex justify-between items-center border-b px-6 py-4 bg-gray-50">
                <h2 class="text-xl font-bold text-gray-800">Property Details</h2>
                <button onclick="closeModal()" class="text-gray-500 hover:text-red-600 text-2xl">&times;</button>
            </div>

            <!-- Body -->
            <div class="p-6 space-y-6">

                <!-- Overview Section -->
                <div>
                    <h3 class="text-lg font-semibold text-sky-600 mb-2">Overview</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                        <p><strong>Title:</strong> Luxury Residential Plot</p>
                        <p><strong>Reference Code:</strong> REF12345</p>
                        <p><strong>Listing Type:</strong> Sale</p>
                        <p><strong>Status:</strong> Published</p>
                        <p><strong>Price:</strong> ₹2.5 Cr (Negotiable)</p>
                        <p><strong>Price Unit:</strong> Per Sq. Yard</p>
                        <p><strong>Area:</strong> 500 Sq. Yards</p>
                        <p><strong>Dimensions:</strong> 50x90 ft</p>
                    </div>
                </div>

                <!-- Features Section -->
                <div>
                    <h3 class="text-lg font-semibold text-sky-600 mb-2">Features & Utilities</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                        <p><strong>Frontage:</strong> 40 ft</p>
                        <p><strong>Corner Plot:</strong> Yes</p>
                        <p><strong>Road Width:</strong> 30 ft</p>
                        <p><strong>Facing:</strong> East</p>
                        <p><strong>Shape:</strong> Rectangular</p>
                        <p><strong>Land Use:</strong> Residential</p>
                        <p><strong>Zoning:</strong> R1</p>
                        <p><strong>FSI:</strong> 1.5</p>
                        <p><strong>Water Connection:</strong> Available</p>
                        <p><strong>Electricity:</strong> Available</p>
                        <p><strong>Sewage:</strong> Yes</p>
                        <p><strong>Borewell:</strong> Yes</p>
                        <p><strong>Compound Wall:</strong> Yes</p>
                    </div>
                </div>

                <!-- Legal Section -->
                <div>
                    <h3 class="text-lg font-semibold text-sky-600 mb-2">Ownership & Legal</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                        <p><strong>Ownership:</strong> Freehold</p>
                        <p><strong>Tenure:</strong> -</p>
                        <p><strong>RERA ID:</strong> RERA12345</p>
                        <p><strong>Survey Number:</strong> 112</p>
                        <p><strong>Khasra Number:</strong> 220</p>
                        <p><strong>Plot Number:</strong> 5</p>
                        <p><strong>Khata Number:</strong> KHT112</p>
                        <p><strong>Title Clear:</strong> Yes</p>
                        <p><strong>Encumbrances:</strong> None</p>
                        <p><strong>Loan Available:</strong> Yes</p>
                    </div>
                </div>

                <!-- Location Section -->
                <div>
                    <h3 class="text-lg font-semibold text-sky-600 mb-2">Location</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                        <p><strong>Address:</strong> 123 Green Valley</p>
                        <p><strong>Landmark:</strong> Near Metro Station</p>
                        <p><strong>Locality:</strong> Sector 45</p>
                        <p><strong>City:</strong> Gurugram</p>
                        <p><strong>District:</strong> Gurgaon</p>
                        <p><strong>State:</strong> Haryana</p>
                        <p><strong>Pincode:</strong> 122003</p>
                        <p><strong>Country:</strong> India</p>
                        <p><strong>Latitude:</strong> 28.4595</p>
                        <p><strong>Longitude:</strong> 77.0266</p>
                    </div>
                    <div class="mt-4">
                        <iframe src="https://maps.google.com/maps?q=28.4595,77.0266&z=15&output=embed"
                            class="w-full h-64 rounded-lg border"></iframe>
                    </div>
                </div>

                <!-- Media & SEO -->
                <div>
                    <h3 class="text-lg font-semibold text-sky-600 mb-2">Media & SEO</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 text-sm">
                        <p><strong>Primary Image:</strong></p>
                        <img src="https://source.unsplash.com/600x400/?land,property" class="rounded-lg shadow-md"
                            alt="Property Image">
                        <p><strong>Meta Title:</strong> Buy Luxury Residential Plot</p>
                        <p><strong>Meta Description:</strong> Premium land for sale in Gurugram.</p>
                        <p><strong>Meta Keywords:</strong> Land, Plot, Gurugram, Sale</p>
                    </div>
                </div>

            </div>

            <!-- Footer -->
            <div class="flex justify-end p-4 border-t bg-gray-50">
                <button onclick="closeModal()" class="px-5 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">Close</button>
                <button class="ml-3 px-5 py-2 bg-sky-600 text-white rounded-lg shadow hover:bg-sky-700">Contact
                    Agent</button>
            </div>

        </div>
    </div>

    <script>
        function openModal() {
            document.getElementById('propertyModal').classList.remove('hidden');
        }

        function closeModal() {
            document.getElementById('propertyModal').classList.add('hidden');
        }
    </script>
@endsection
