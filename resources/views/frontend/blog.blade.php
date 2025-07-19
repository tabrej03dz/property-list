@extends('component.main')
@section('content')
{{-- Banner --}}
    <div class="w-full h-[300px] md:h-[400px] relative">
        <img src="{{ asset('asset/img/image1.jpg') }}" alt="Property Banner" class="w-full h-full object-cover">
        <div class="absolute inset-0 top-0 left-0 right-0 bg-black/50 items-center text-center pt-32">
            <h1 class="text-white text-3xl md:text-5xl font-extrabold tracking-wide drop-shadow-lg">
                Find Your Dream Property
                </h1>
            <div class="flex justify-center space-x-2 py-2">
                <p class="text-white hover:underline"> <a href="/">Home</p></a>
                <p class="text-white">/</p>
                <p class="text-white hover:underline"><a href="{{route('blog')}}">Blog</p></a>
            </div>
        </div>
    </div>




    {{-- PROPERTY LISTING TABS --}}
    <section class="bg-blue-50 px-4 md:px-12 md:py-16 md:mt-4">
        <div class="max-w-7xl mx-auto">
            <!-- Header -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-6">
                {{-- <div>
                    <h1
                        class="text-4xl md:text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-yellow-700 via-blue-950 to-blue-400">
                        Discover Property
                    </h1>
                    <div class="w-20 h-1 bg-gradient-to-r from-blue-950 to-yellow-400 rounded-full mt-2 mb-3"></div>
                    <p class="text-gray-600 max-w-xl text-base md:text-lg leading-relaxed">
                        From cozy apartments to luxurious villas, find hand-picked listings tailored to your lifestyle,
                        budget, and location preferences.
                    </p>
                </div> --}}

                {{-- <!-- Tab Buttons -->
                <div class="flex gap-3">
                    <button
                        class="active tab-btn bg-yellow-50 text-gray-800 px-5 py-2 rounded-lg text-sm font-semibold shadow"
                        data-tab="featured">Featured</button>
                    <button class="tab-btn bg-yellow-50 text-gray-800 px-5 py-2 rounded-lg text-sm font-semibold shadow"
                        data-tab="sell">For Sell</button>
                    <button class="tab-btn bg-yellow-50 text-gray-800 px-5 py-2 rounded-lg text-sm font-semibold shadow"
                        data-tab="rent">For Rent</button>
                </div> --}}
            </div>

            <!-- Property Grid -->
            <div id="propertyGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Property Card (Repeat & Change data-category) -->

                <!-- Clone and change the data-category accordingly: "sell", "rent", "featured" -->
                <!-- Example Sell Property -->
                <div class="property-card" data-category="sell">
                    <!-- Use same card structure -->
                    <!-- Only category, title, and price needs change -->
                    <!-- ... -->
                    <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">
                        <div class="relative">
                            <img src="https://demo.htmlcodex.com/2259/real-estate-html-template/img/property-1.jpg"
                                alt="Golden Urban House" class="w-full h-60 object-cover" />
                            <span
                                class="absolute top-3 left-3 bg-blue-900 text-white text-xs font-semibold p-3 rounded shadow">For
                                Rent</span>
                            <span
                                class="absolute bottom-3 left-3 bg-white text-blue-900 text-xs font-semibold p-3 rounded shadow">Apartment</span>
                        </div>
                        <div class="p-5">
                            <h2 class="text-xl font-semibold text-green-600 mb-1">Price: $12,345</h2>
                            <p class="text-gray-800 font-medium mb-1">Golden Urban House</p>
                            <p class="text-gray-600 text-sm mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            </p>
                            <p class="flex items-center text-sm text-gray-500 mb-4">
                                <span class="material-symbols-outlined text-blue-500 mr-1">location_on</span>123 Street,
                                New York, USA
                            </p>
                            <div class="flex justify-between text-sm text-gray-700 border-t pt-3">
                                <span class="flex items-center gap-1"><span
                                        class="material-symbols-outlined text-blue-500">crop_square</span>1000 Sqft</span>
                                <span class="flex items-center gap-1"><span
                                        class="material-symbols-outlined text-blue-500">bed</span>3 Bed</span>
                                <span class="flex items-center gap-1"><span
                                        class="material-symbols-outlined text-blue-500">bathtub</span>2 Bath</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Example Rent Property -->
                 <!-- Example Sell Property -->
                 <div class="property-card" data-category="sell">
                    <!-- Use same card structure -->
                    <!-- Only category, title, and price needs change -->
                    <!-- ... -->
                    <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">
                        <div class="relative">
                            <img src="https://demo.htmlcodex.com/2259/real-estate-html-template/img/property-1.jpg"
                                alt="Golden Urban House" class="w-full h-60 object-cover" />
                            <span
                                class="absolute top-3 left-3 bg-blue-900 text-white text-xs font-semibold p-3 rounded shadow">For
                                Rent</span>
                            <span
                                class="absolute bottom-3 left-3 bg-white text-blue-900 text-xs font-semibold p-3 rounded shadow">Apartment</span>
                        </div>
                        <div class="p-5">
                            <h2 class="text-xl font-semibold text-green-600 mb-1">Price: $12,345</h2>
                            <p class="text-gray-800 font-medium mb-1">Golden Urban House</p>
                            <p class="text-gray-600 text-sm mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            </p>
                            <p class="flex items-center text-sm text-gray-500 mb-4">
                                <span class="material-symbols-outlined text-blue-500 mr-1">location_on</span>123 Street,
                                New York, USA
                            </p>
                            <div class="flex justify-between text-sm text-gray-700 border-t pt-3">
                                <span class="flex items-center gap-1"><span
                                        class="material-symbols-outlined text-blue-500">crop_square</span>1000 Sqft</span>
                                <span class="flex items-center gap-1"><span
                                        class="material-symbols-outlined text-blue-500">bed</span>3 Bed</span>
                                <span class="flex items-center gap-1"><span
                                        class="material-symbols-outlined text-blue-500">bathtub</span>2 Bath</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Example Rent Property -->
                 <!-- Example Sell Property -->
                 <div class="property-card" data-category="sell">
                    <!-- Use same card structure -->
                    <!-- Only category, title, and price needs change -->
                    <!-- ... -->
                    <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">
                        <div class="relative">
                            <img src="https://demo.htmlcodex.com/2259/real-estate-html-template/img/property-1.jpg"
                                alt="Golden Urban House" class="w-full h-60 object-cover" />
                            <span
                                class="absolute top-3 left-3 bg-blue-900 text-white text-xs font-semibold p-3 rounded shadow">For
                                Rent</span>
                            <span
                                class="absolute bottom-3 left-3 bg-white text-blue-900 text-xs font-semibold p-3 rounded shadow">Apartment</span>
                        </div>
                        <div class="p-5">
                            <h2 class="text-xl font-semibold text-green-600 mb-1">Price: $12,345</h2>
                            <p class="text-gray-800 font-medium mb-1">Golden Urban House</p>
                            <p class="text-gray-600 text-sm mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            </p>
                            <p class="flex items-center text-sm text-gray-500 mb-4">
                                <span class="material-symbols-outlined text-blue-500 mr-1">location_on</span>123 Street,
                                New York, USA
                            </p>
                            <div class="flex justify-between text-sm text-gray-700 border-t pt-3">
                                <span class="flex items-center gap-1"><span
                                        class="material-symbols-outlined text-blue-500">crop_square</span>1000 Sqft</span>
                                <span class="flex items-center gap-1"><span
                                        class="material-symbols-outlined text-blue-500">bed</span>3 Bed</span>
                                <span class="flex items-center gap-1"><span
                                        class="material-symbols-outlined text-blue-500">bathtub</span>2 Bath</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Example Rent Property -->
                 <!-- Example Sell Property -->
                 <div class="property-card" data-category="sell">
                    <!-- Use same card structure -->
                    <!-- Only category, title, and price needs change -->
                    <!-- ... -->
                    <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">
                        <div class="relative">
                            <img src="https://demo.htmlcodex.com/2259/real-estate-html-template/img/property-1.jpg"
                                alt="Golden Urban House" class="w-full h-60 object-cover" />
                            <span
                                class="absolute top-3 left-3 bg-blue-900 text-white text-xs font-semibold p-3 rounded shadow">For
                                Rent</span>
                            <span
                                class="absolute bottom-3 left-3 bg-white text-blue-900 text-xs font-semibold p-3 rounded shadow">Apartment</span>
                        </div>
                        <div class="p-5">
                            <h2 class="text-xl font-semibold text-green-600 mb-1">Price: $12,345</h2>
                            <p class="text-gray-800 font-medium mb-1">Golden Urban House</p>
                            <p class="text-gray-600 text-sm mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            </p>
                            <p class="flex items-center text-sm text-gray-500 mb-4">
                                <span class="material-symbols-outlined text-blue-500 mr-1">location_on</span>123 Street,
                                New York, USA
                            </p>
                            <div class="flex justify-between text-sm text-gray-700 border-t pt-3">
                                <span class="flex items-center gap-1"><span
                                        class="material-symbols-outlined text-blue-500">crop_square</span>1000 Sqft</span>
                                <span class="flex items-center gap-1"><span
                                        class="material-symbols-outlined text-blue-500">bed</span>3 Bed</span>
                                <span class="flex items-center gap-1"><span
                                        class="material-symbols-outlined text-blue-500">bathtub</span>2 Bath</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Example Rent Property -->
                 <!-- Example Sell Property -->
                 <div class="property-card" data-category="sell">
                    <!-- Use same card structure -->
                    <!-- Only category, title, and price needs change -->
                    <!-- ... -->
                    <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">
                        <div class="relative">
                            <img src="https://demo.htmlcodex.com/2259/real-estate-html-template/img/property-1.jpg"
                                alt="Golden Urban House" class="w-full h-60 object-cover" />
                            <span
                                class="absolute top-3 left-3 bg-blue-900 text-white text-xs font-semibold p-3 rounded shadow">For
                                Rent</span>
                            <span
                                class="absolute bottom-3 left-3 bg-white text-blue-900 text-xs font-semibold p-3 rounded shadow">Apartment</span>
                        </div>
                        <div class="p-5">
                            <h2 class="text-xl font-semibold text-green-600 mb-1">Price: $12,345</h2>
                            <p class="text-gray-800 font-medium mb-1">Golden Urban House</p>
                            <p class="text-gray-600 text-sm mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            </p>
                            <p class="flex items-center text-sm text-gray-500 mb-4">
                                <span class="material-symbols-outlined text-blue-500 mr-1">location_on</span>123 Street,
                                New York, USA
                            </p>
                            <div class="flex justify-between text-sm text-gray-700 border-t pt-3">
                                <span class="flex items-center gap-1"><span
                                        class="material-symbols-outlined text-blue-500">crop_square</span>1000 Sqft</span>
                                <span class="flex items-center gap-1"><span
                                        class="material-symbols-outlined text-blue-500">bed</span>3 Bed</span>
                                <span class="flex items-center gap-1"><span
                                        class="material-symbols-outlined text-blue-500">bathtub</span>2 Bath</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Example Rent Property -->
                 <!-- Example Sell Property -->
                 <div class="property-card" data-category="sell">
                    <!-- Use same card structure -->
                    <!-- Only category, title, and price needs change -->
                    <!-- ... -->
                    <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">
                        <div class="relative">
                            <img src="https://demo.htmlcodex.com/2259/real-estate-html-template/img/property-1.jpg"
                                alt="Golden Urban House" class="w-full h-60 object-cover" />
                            <span
                                class="absolute top-3 left-3 bg-blue-900 text-white text-xs font-semibold p-3 rounded shadow">For
                                Rent</span>
                            <span
                                class="absolute bottom-3 left-3 bg-white text-blue-900 text-xs font-semibold p-3 rounded shadow">Apartment</span>
                        </div>
                        <div class="p-5">
                            <h2 class="text-xl font-semibold text-green-600 mb-1">Price: $12,345</h2>
                            <p class="text-gray-800 font-medium mb-1">Golden Urban House</p>
                            <p class="text-gray-600 text-sm mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            </p>
                            <p class="flex items-center text-sm text-gray-500 mb-4">
                                <span class="material-symbols-outlined text-blue-500 mr-1">location_on</span>123 Street,
                                New York, USA
                            </p>
                            <div class="flex justify-between text-sm text-gray-700 border-t pt-3">
                                <span class="flex items-center gap-1"><span
                                        class="material-symbols-outlined text-blue-500">crop_square</span>1000 Sqft</span>
                                <span class="flex items-center gap-1"><span
                                        class="material-symbols-outlined text-blue-500">bed</span>3 Bed</span>
                                <span class="flex items-center gap-1"><span
                                        class="material-symbols-outlined text-blue-500">bathtub</span>2 Bath</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Example Rent Property -->
                 <!-- Example Sell Property -->
                 <div class="property-card" data-category="sell">
                    <!-- Use same card structure -->
                    <!-- Only category, title, and price needs change -->
                    <!-- ... -->
                    <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">
                        <div class="relative">
                            <img src="https://demo.htmlcodex.com/2259/real-estate-html-template/img/property-1.jpg"
                                alt="Golden Urban House" class="w-full h-60 object-cover" />
                            <span
                                class="absolute top-3 left-3 bg-blue-900 text-white text-xs font-semibold p-3 rounded shadow">For
                                Rent</span>
                            <span
                                class="absolute bottom-3 left-3 bg-white text-blue-900 text-xs font-semibold p-3 rounded shadow">Apartment</span>
                        </div>
                        <div class="p-5">
                            <h2 class="text-xl font-semibold text-green-600 mb-1">Price: $12,345</h2>
                            <p class="text-gray-800 font-medium mb-1">Golden Urban House</p>
                            <p class="text-gray-600 text-sm mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            </p>
                            <p class="flex items-center text-sm text-gray-500 mb-4">
                                <span class="material-symbols-outlined text-blue-500 mr-1">location_on</span>123 Street,
                                New York, USA
                            </p>
                            <div class="flex justify-between text-sm text-gray-700 border-t pt-3">
                                <span class="flex items-center gap-1"><span
                                        class="material-symbols-outlined text-blue-500">crop_square</span>1000 Sqft</span>
                                <span class="flex items-center gap-1"><span
                                        class="material-symbols-outlined text-blue-500">bed</span>3 Bed</span>
                                <span class="flex items-center gap-1"><span
                                        class="material-symbols-outlined text-blue-500">bathtub</span>2 Bath</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Example Rent Property -->
                <div class="property-card" data-category="rent">
                    <!-- Use same card structure -->
                    <!-- ... -->
                    <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">
                        <div class="relative">
                            <img src="https://demo.htmlcodex.com/2259/real-estate-html-template/img/property-1.jpg"
                                alt="Golden Urban House" class="w-full h-60 object-cover" />
                            <span
                                class="absolute top-3 left-3 bg-blue-900 text-white text-xs font-semibold p-3 rounded shadow">For
                                Rent</span>
                            <span
                                class="absolute bottom-3 left-3 bg-white text-blue-900 text-xs font-semibold p-3 rounded shadow">Apartment</span>
                        </div>
                        <div class="p-5">
                            <h2 class="text-xl font-semibold text-green-600 mb-1">Price: $12,345</h2>
                            <p class="text-gray-800 font-medium mb-1">Golden Urban House</p>
                            <p class="text-gray-600 text-sm mb-3">Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                            </p>
                            <p class="flex items-center text-sm text-gray-500 mb-4">
                                <span class="material-symbols-outlined text-blue-500 mr-1">location_on</span>123 Street,
                                New York, USA
                            </p>
                            <div class="flex justify-between text-sm text-gray-700 border-t pt-3">
                                <span class="flex items-center gap-1"><span
                                        class="material-symbols-outlined text-blue-500">crop_square</span>1000 Sqft</span>
                                <span class="flex items-center gap-1"><span
                                        class="material-symbols-outlined text-blue-500">bed</span>3 Bed</span>
                                <span class="flex items-center gap-1"><span
                                        class="material-symbols-outlined text-blue-500">bathtub</span>2 Bath</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Add more cards here -->
            </div>

            <!-- Browse More Button -->
            <div class="flex justify-center my-6">
                <button class="bg-yellow-600 hover:bg-yellow-500 text-white px-6 py-3 rounded-lg font-semibold transition">
                    Browse More Properties
                </button>
            </div>
        </div>
    </section>

    {{-- <!-- Tab Filtering Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const tabs = document.querySelectorAll('.tab-btn');
            const cards = document.querySelectorAll('.property-card');

            tabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    const category = tab.getAttribute('data-tab');

                    tabs.forEach(btn => btn.classList.remove('active', 'bg-blue-600',
                        'text-white'));
                    tab.classList.add('active', 'bg-blue-600', 'text-white');

                    cards.forEach(card => {
                        card.style.display = (category === 'featured' || card.getAttribute(
                                'data-category') === category) ?
                            'block' :
                            'none';
                    });
                });
            });
        });
    </script> --}}
@endsection
