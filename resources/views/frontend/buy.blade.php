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
                <p class="text-white hover:underline"><a href="{{route('buy')}}">Buy</p></a>
            </div>
        </div>
    </div>


    {{-- SEARCH BAR --}}
    <div class="relative z-10 max-w-7xl mx-auto px-4 md:px-8 md:-mt-16 md:-mt-20">
        <div class="bg-white rounded-xl shadow-2xl px-6 py-8 md:py-10 border border-gray-100">
            <form class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-5 gap-4">
                <!-- Search Input -->
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                        </svg>
                    </div>
                    <input type="text" placeholder="Search by property name..."
                        class="w-full pl-10 pr-4 py-3 bg-gray-50 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent" />
                </div>

                <!-- Property Type -->
                <div class="relative">
                    <select class="w-full appearance-none px-4 py-3 bg-gray-50 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option disabled selected>Property Type</option>
                        <option>Luxury Villa</option>
                        <option>Penthouse</option>
                        <option>Waterfront Estate</option>
                        <option>Golf Resort</option>
                        <option>Commercial</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>

                <!-- Location -->
                <div class="relative">
                    <select class="w-full appearance-none px-4 py-3 bg-gray-50 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option disabled selected>Preferred Location</option>
                        <option>South Mumbai</option>
                        <option>Central Delhi</option>
                        <option>Bangalore South</option>
                        <option>Pune Hills</option>
                        <option>Goa Beachfront</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>

                <!-- Price Range -->
                <div class="relative">
                    <select class="w-full appearance-none px-4 py-3 bg-gray-50 border border-gray-200 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                        <option disabled selected>Price Range</option>
                        <option>Under ₹1 Cr</option>
                        <option>₹1-5 Cr</option>
                        <option>₹5-10 Cr</option>
                        <option>₹10-25 Cr</option>
                        <option>Above ₹25 Cr</option>
                    </select>
                    <div class="absolute inset-y-0 right-0 flex items-center pr-3 pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                        </svg>
                    </div>
                </div>

                <!-- Search Button -->
                <button type="submit"
                    class="w-full bg-blue-900 hover:bg-blue-800 text-white font-semibold py-3 rounded-md transition-all duration-300 transform hover:scale-105 flex items-center justify-center space-x-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                    </svg>
                    <span>Find Properties</span>
                </button>
            </form>
        </div>
    </div>

        {{-- PROPERTY GRID --}}
        <section class="py-16 px-4 md:px-10 bg-white">
            <div class="max-w-7xl mx-auto">
                <div class="text-center mb-12">
                    <h2 class="text-3xl md:text-4xl font-bold text-gray-900 mb-4">Featured Luxury Properties</h2>
                    <p class="text-gray-600 max-w-2xl mx-auto">Discover our handpicked selection of premium residences and investment opportunities</p>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                    <!-- Property Card 1 -->
                    <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">
                        <div class="relative">
                            <img src="https://demo.htmlcodex.com/2259/real-estate-html-template/img/property-1.jpg"
                                alt="Golden Urban House" class="w-full h-60 object-cover" />
                            <span
                                class="absolute top-3 left-3 bg-blue-900 text-white text-xs font-semibold p-3 rounded shadow">For Buy</span>
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
                    <!-- Property Card 2 -->
                    <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">
                        <div class="relative">
                            <img src="https://demo.htmlcodex.com/2259/real-estate-html-template/img/property-1.jpg"
                                alt="Golden Urban House" class="w-full h-60 object-cover" />
                            <span
                                class="absolute top-3 left-3 bg-blue-900 text-white text-xs font-semibold p-3 rounded shadow">For Buy</span>
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

                    <!-- Property Card 3 -->
                    <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">
                        <div class="relative">
                            <img src="https://demo.htmlcodex.com/2259/real-estate-html-template/img/property-1.jpg"
                                alt="Golden Urban House" class="w-full h-60 object-cover" />
                            <span
                                class="absolute top-3 left-3 bg-blue-900 text-white text-xs font-semibold p-3 rounded shadow">For Buy</span>
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

                <div class="text-center mt-12">
                    <button class="px-8 py-3 bg-blue-900 hover:bg-blue-800 text-white font-medium rounded-lg transition-all duration-300 transform hover:scale-105">
                        View All Properties
                    </button>
                </div>
            </div>
        </section>


    {{-- PROPERTY LISTING --}}


    <section class="md:py-16 py-4 px-4 md:px-10 bg-blue-50">

        <div class="max-w-9xl mx-auto">

            <div class="flex flex-col md:flex-row gap-8">

                <!-- Map Section -->
                <div class="w-full md:w-3/5 h-auto rounded-2xl overflow-hidden shadow-xl relative">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3770.6747709189923!2d72.87765531522318!3d19.076089487092774!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7cf3a10b8e123%3A0xd246ec78a7ad682f!2sMumbai!5e0!3m2!1sen!2sin!4v1620393041812!5m2!1sen!2sin"
                        width="100%" height="100%" allowfullscreen="" loading="lazy" class="absolute inset-0 w-full h-full border-0">
                    </iframe>
                </div>

               <div class="w-full md:w-4/5 ">
                  <!-- Featured Tag -->
                  <div class=" my-6 bg-gradient-to-r from-blue-900 to-blue-700 text-white px-6 py-4 rounded-xl shadow-lg flex items-center justify-between">
                    <div>
                        <span class="inline-block bg-yellow-500 text-blue-900 text-xs font-bold px-2 py-1 rounded uppercase mr-2">Premium</span>
                        <span class="text-sm md:text-base">Exclusive Listing</span>
                    </div>
                    <button class="text-xs font-semibold uppercase tracking-wide hover:underline">View All</button>
                </div>
                <!-- Property Cards Section -->
                <div class="grid grid-cols-1  lg:grid-cols-2 gap-6">

                    <!-- Repeat for 4 properties -->
                    <!-- Property Card -->
                    <div class="rounded-2xl shadow-xl overflow-hidden transition-all duration-300">
                        <div class="relative aspect-[1] w-full object-cover h-full">
                            <div id="slider1" class="w-full h-full relative">
                                <img src="https://cdn.pixabay.com/photo/2014/07/10/17/18/large-home-389271_1280.jpg" class="slide-1 absolute inset-0 w-full h-full object-cover transition-opacity duration-700 ease-in-out" />
                                <img src="https://cdn.pixabay.com/photo/2020/03/23/08/17/skansen-4959822_1280.jpg" class="slide-1 absolute inset-0 w-full h-full object-cover transition-opacity duration-700 ease-in-out hidden" />
                                <img src="https://cdn.pixabay.com/photo/2013/10/12/18/05/villa-194671_1280.jpg" class="slide-1 absolute inset-0 w-full h-full object-cover transition-opacity duration-700 ease-in-out hidden" />

                                <!-- Overlay -->
                                <div class="absolute inset-0 bg-gradient-to-b from-transparent via-black/50 to-black/90 p-4 flex flex-col justify-end text-white">
                                    <h3 class="text-xl font-semibold">Luxury Villa</h3>
                                    <p class="text-sm">Price: ₹ 345 Lakhs</p>
                                    <p class="text-sm text-white/90">📍 Alibaug Beachfront, Maharashtra</p>
                                    <div class="flex justify-between text-sm pt-2">
                                        <div class="flex space-x-4">
                                            <span class="flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path></svg> 4</span>
                                            <span class="flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg> 3</span>
                                            <span class="flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2H5a1 1 0 010-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" clip-rule="evenodd"></path></svg> 3200 sqft</span>
                                        </div>
                                        <span class="bg-blue-900/80 text-white text-xs px-2 py-1 rounded">New Listing</span>
                                    </div>
                                </div>

                                <!-- Navigation -->
                                <button class="prev1 absolute top-1/2 left-2 transform -translate-y-1/2 bg-white/80 hover:bg-white text-gray-800 px-2 py-1 rounded-full shadow-md z-10">&#10094;</button>
                                <button class="next1 absolute top-1/2 right-2 transform -translate-y-1/2 bg-white/80 hover:bg-white text-gray-800 px-2 py-1 rounded-full shadow-md z-10">&#10095;</button>
                            </div>
                        </div>
                    </div>

                    <!-- Duplicate the above block and update IDs to slider2, slider3, etc. for 4 total -->

                    <!-- Property Card 2 -->
                    <div class="rounded-2xl shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl bg-white">
                        <div class="relative aspect-[1] h-full w-full">
                            <div id="slider2" class="w-full h-full relative">
                                <img src="https://cdn.pixabay.com/photo/2020/03/23/08/17/skansen-4959822_1280.jpg" class="slide-2 absolute inset-0 w-full h-full object-cover transition-opacity duration-700 ease-in-out" />
                                <img src="https://cdn.pixabay.com/photo/2021/10/03/12/35/house-6677890_1280.jpg" class="slide-2 absolute inset-0 w-full h-full object-cover transition-opacity duration-700 ease-in-out hidden" />
                                <img src="https://cdn.pixabay.com/photo/2013/05/31/23/51/villa-115193_1280.jpg" class="slide-2 absolute inset-0 w-full h-full object-cover transition-opacity duration-700 ease-in-out hidden" />

                                <div class="absolute inset-0 bg-gradient-to-b from-transparent via-black/50 to-black/90 p-4 flex flex-col justify-end text-white">
                                    <h3 class="text-xl font-semibold">Luxury Villa</h3>
                                    <p class="text-sm">Price: ₹ 345 Lakhs</p>
                                    <p class="text-sm text-white/90">📍 Alibaug Beachfront, Maharashtra</p>
                                    <div class="flex justify-between text-sm pt-2">
                                        <div class="flex space-x-4">
                                            <span class="flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path></svg> 4</span>
                                            <span class="flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg> 3</span>
                                            <span class="flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2H5a1 1 0 010-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" clip-rule="evenodd"></path></svg> 3200 sqft</span>
                                        </div>
                                        <span class="bg-blue-900/80 text-white text-xs px-2 py-1 rounded">New Listing</span>
                                    </div>
                                </div>


                                <button class="prev2 absolute top-1/2 left-2 transform -translate-y-1/2 bg-white/80 hover:bg-white text-gray-800 px-2 py-1 rounded-full shadow-md z-10">&#10094;</button>
                                <button class="next2 absolute top-1/2 right-2 transform -translate-y-1/2 bg-white/80 hover:bg-white text-gray-800 px-2 py-1 rounded-full shadow-md z-10">&#10095;</button>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-2xl shadow-xl overflow-hidden transition-all duration-300">
                        <div class="relative aspect-[1] w-full object-cover h-full">
                            <div id="slider3" class="w-full h-full relative">
                                <img src="https://cdn.pixabay.com/photo/2014/07/10/17/18/large-home-389271_1280.jpg" class="slide-3 absolute inset-0 w-full h-full object-cover transition-opacity duration-700 ease-in-out" />
                                <img src="https://cdn.pixabay.com/photo/2020/03/23/08/17/skansen-4959822_1280.jpg" class="slide-3 absolute inset-0 w-full h-full object-cover transition-opacity duration-700 ease-in-out hidden" />
                                <img src="https://cdn.pixabay.com/photo/2013/10/12/18/05/villa-194671_1280.jpg" class="slide-3 absolute inset-0 w-full h-full object-cover transition-opacity duration-700 ease-in-out hidden" />

                                <!-- Overlay -->
                                <div class="absolute inset-0 bg-gradient-to-b from-transparent via-black/50 to-black/90 p-4 flex flex-col justify-end text-white">
                                    <h3 class="text-xl font-semibold">Luxury Villa</h3>
                                    <p class="text-sm">Price: ₹ 345 Lakhs</p>
                                    <p class="text-sm text-white/90">📍 Alibaug Beachfront, Maharashtra</p>
                                    <div class="flex justify-between text-sm pt-2">
                                        <div class="flex space-x-4">
                                            <span class="flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path></svg> 4</span>
                                            <span class="flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg> 3</span>
                                            <span class="flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2H5a1 1 0 010-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" clip-rule="evenodd"></path></svg> 3200 sqft</span>
                                        </div>
                                        <span class="bg-blue-900/80 text-white text-xs px-2 py-1 rounded">New Listing</span>
                                    </div>
                                </div>

                                <!-- Navigation -->
                                <button class="prev3 absolute top-1/2 left-2 transform -translate-y-1/2 bg-white/80 hover:bg-white text-gray-800 px-2 py-1 rounded-full shadow-md z-10">&#10094;</button>
                                <button class="next3 absolute top-1/2 right-2 transform -translate-y-1/2 bg-white/80 hover:bg-white text-gray-800 px-2 py-1 rounded-full shadow-md z-10">&#10095;</button>
                            </div>
                        </div>
                    </div>

                    <!-- Duplicate the above block and update IDs to slider2, slider3, etc. for 4 total -->

                    <!-- Property Card 2 -->
                    <div class="rounded-2xl shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl bg-white">
                        <div class="relative aspect-[1] h-full w-full">
                            <div id="slider4" class="w-full h-full relative">
                                <img src="https://cdn.pixabay.com/photo/2020/03/23/08/17/skansen-4959822_1280.jpg" class="slide-4 absolute inset-0 w-full h-full object-cover transition-opacity duration-700 ease-in-out" />
                                <img src="https://cdn.pixabay.com/photo/2021/10/03/12/35/house-6677890_1280.jpg" class="slide-4 absolute inset-0 w-full h-full object-cover transition-opacity duration-700 ease-in-out hidden" />
                                <img src="https://cdn.pixabay.com/photo/2013/05/31/23/51/villa-115193_1280.jpg" class="slide-4 absolute inset-0 w-full h-full object-cover transition-opacity duration-700 ease-in-out hidden" />

                                <div class="absolute inset-0 bg-gradient-to-b from-transparent via-black/50 to-black/90 p-4 flex flex-col justify-end text-white">
                                    <h3 class="text-xl font-semibold">Luxury Villa</h3>
                                    <p class="text-sm">Price: ₹ 345 Lakhs</p>
                                    <p class="text-sm text-white/90">📍 Alibaug Beachfront, Maharashtra</p>
                                    <div class="flex justify-between text-sm pt-2">
                                        <div class="flex space-x-4">
                                            <span class="flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path></svg> 4</span>
                                            <span class="flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg> 3</span>
                                            <span class="flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2H5a1 1 0 010-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" clip-rule="evenodd"></path></svg> 3200 sqft</span>
                                        </div>
                                        <span class="bg-blue-900/80 text-white text-xs px-2 py-1 rounded">New Listing</span>
                                    </div>
                                </div>


                                <button class="prev4 absolute top-1/2 left-2 transform -translate-y-1/2 bg-white/80 hover:bg-white text-gray-800 px-2 py-1 rounded-full shadow-md z-10">&#10094;</button>
                                <button class="next4 absolute top-1/2 right-2 transform -translate-y-1/2 bg-white/80 hover:bg-white text-gray-800 px-2 py-1 rounded-full shadow-md z-10">&#10095;</button>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-2xl shadow-xl overflow-hidden transition-all duration-300">
                        <div class="relative aspect-[1] w-full object-cover h-full">
                            <div id="slider5" class="w-full h-full relative">
                                <img src="https://cdn.pixabay.com/photo/2014/07/10/17/18/large-home-389271_1280.jpg" class="slide-5 absolute inset-0 w-full h-full object-cover transition-opacity duration-700 ease-in-out" />
                                <img src="https://cdn.pixabay.com/photo/2020/03/23/08/17/skansen-4959822_1280.jpg" class="slide-5 absolute inset-0 w-full h-full object-cover transition-opacity duration-700 ease-in-out hidden" />
                                <img src="https://cdn.pixabay.com/photo/2013/10/12/18/05/villa-194671_1280.jpg" class="slide-5 absolute inset-0 w-full h-full object-cover transition-opacity duration-700 ease-in-out hidden" />

                                <!-- Overlay -->
                                <div class="absolute inset-0 bg-gradient-to-b from-transparent via-black/50 to-black/90 p-4 flex flex-col justify-end text-white">
                                    <h3 class="text-xl font-semibold">Luxury Villa</h3>
                                    <p class="text-sm">Price: ₹ 345 Lakhs</p>
                                    <p class="text-sm text-white/90">📍 Alibaug Beachfront, Maharashtra</p>
                                    <div class="flex justify-between text-sm pt-2">
                                        <div class="flex space-x-4">
                                            <span class="flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path></svg> 4</span>
                                            <span class="flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg> 3</span>
                                            <span class="flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2H5a1 1 0 010-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" clip-rule="evenodd"></path></svg> 3200 sqft</span>
                                        </div>
                                        <span class="bg-blue-900/80 text-white text-xs px-2 py-1 rounded">New Listing</span>
                                    </div>
                                </div>

                                <!-- Navigation -->
                                <button class="prev5 absolute top-1/2 left-2 transform -translate-y-1/2 bg-white/80 hover:bg-white text-gray-800 px-2 py-1 rounded-full shadow-md z-10">&#10094;</button>
                                <button class="next5 absolute top-1/2 right-2 transform -translate-y-1/2 bg-white/80 hover:bg-white text-gray-800 px-2 py-1 rounded-full shadow-md z-10">&#10095;</button>
                            </div>
                        </div>
                    </div>

                    <!-- Duplicate the above block and update IDs to slider2, slider3, etc. for 4 total -->

                    <!-- Property Card 2 -->
                    <div class="rounded-2xl shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl bg-white">
                        <div class="relative aspect-[1] h-full w-full">
                            <div id="slider8" class="w-full h-full relative">
                                <img src="https://cdn.pixabay.com/photo/2020/03/23/08/17/skansen-4959822_1280.jpg" class="slide-8 absolute inset-0 w-full h-full object-cover transition-opacity duration-700 ease-in-out" />
                                <img src="https://cdn.pixabay.com/photo/2021/10/03/12/35/house-6677890_1280.jpg" class="slide-8 absolute inset-0 w-full h-full object-cover transition-opacity duration-700 ease-in-out hidden" />
                                <img src="https://cdn.pixabay.com/photo/2013/05/31/23/51/villa-115193_1280.jpg" class="slide-8 absolute inset-0 w-full h-full object-cover transition-opacity duration-700 ease-in-out hidden" />

                                <div class="absolute inset-0 bg-gradient-to-b from-transparent via-black/50 to-black/90 p-4 flex flex-col justify-end text-white">
                                    <h3 class="text-xl font-semibold">Luxury Villa</h3>
                                    <p class="text-sm">Price: ₹ 345 Lakhs</p>
                                    <p class="text-sm text-white/90">📍 Alibaug Beachfront, Maharashtra</p>
                                    <div class="flex justify-between text-sm pt-2">
                                        <div class="flex space-x-4">
                                            <span class="flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path></svg> 4</span>
                                            <span class="flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg> 3</span>
                                            <span class="flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2H5a1 1 0 010-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" clip-rule="evenodd"></path></svg> 3200 sqft</span>
                                        </div>
                                        <span class="bg-blue-900/80 text-white text-xs px-2 py-1 rounded">New Listing</span>
                                    </div>
                                </div>


                                <button class="prev8 absolute top-1/2 left-2 transform -translate-y-1/2 bg-white/80 hover:bg-white text-gray-800 px-2 py-1 rounded-full shadow-md z-10">&#10094;</button>
                                <button class="next8 absolute top-1/2 right-2 transform -translate-y-1/2 bg-white/80 hover:bg-white text-gray-800 px-2 py-1 rounded-full shadow-md z-10">&#10095;</button>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-2xl shadow-xl overflow-hidden transition-all duration-300">
                        <div class="relative aspect-[1] w-full object-cover h-full">
                            <div id="slider8" class="w-full h-full relative">
                                <img src="https://cdn.pixabay.com/photo/2014/07/10/17/18/large-home-389271_1280.jpg" class="slide-8 absolute inset-0 w-full h-full object-cover transition-opacity duration-700 ease-in-out" />
                                <img src="https://cdn.pixabay.com/photo/2020/03/23/08/17/skansen-4959822_1280.jpg" class="slide-8 absolute inset-0 w-full h-full object-cover transition-opacity duration-700 ease-in-out hidden" />
                                <img src="https://cdn.pixabay.com/photo/2013/10/12/18/05/villa-194671_1280.jpg" class="slide-8 absolute inset-0 w-full h-full object-cover transition-opacity duration-700 ease-in-out hidden" />

                                <!-- Overlay -->
                                <div class="absolute inset-0 bg-gradient-to-b from-transparent via-black/50 to-black/90 p-4 flex flex-col justify-end text-white">
                                    <h3 class="text-xl font-semibold">Luxury Villa</h3>
                                    <p class="text-sm">Price: ₹ 345 Lakhs</p>
                                    <p class="text-sm text-white/90">📍 Alibaug Beachfront, Maharashtra</p>
                                    <div class="flex justify-between text-sm pt-2">
                                        <div class="flex space-x-4">
                                            <span class="flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path></svg> 4</span>
                                            <span class="flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg> 3</span>
                                            <span class="flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2H5a1 1 0 010-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" clip-rule="evenodd"></path></svg> 3200 sqft</span>
                                        </div>
                                        <span class="bg-blue-900/80 text-white text-xs px-2 py-1 rounded">New Listing</span>
                                    </div>
                                </div>

                                <!-- Navigation -->
                                <button class="prev8 absolute top-1/2 left-2 transform -translate-y-1/2 bg-white/80 hover:bg-white text-gray-800 px-2 py-1 rounded-full shadow-md z-10">&#10094;</button>
                                <button class="next8 absolute top-1/2 right-2 transform -translate-y-1/2 bg-white/80 hover:bg-white text-gray-800 px-2 py-1 rounded-full shadow-md z-10">&#10095;</button>
                            </div>
                        </div>
                    </div>

                    <!-- Duplicate the above block and update IDs to slider2, slider3, etc. for 4 total -->

                    <!-- Property Card 2 -->
                    <div class="rounded-2xl shadow-xl overflow-hidden transition-all duration-300 hover:shadow-2xl bg-white">
                        <div class="relative aspect-[1] h-full w-full">
                            <div id="slider8" class="w-full h-full relative">
                                <img src="https://cdn.pixabay.com/photo/2020/03/23/08/17/skansen-4959822_1280.jpg" class="slide-8 absolute inset-0 w-full h-full object-cover transition-opacity duration-700 ease-in-out" />
                                <img src="https://cdn.pixabay.com/photo/2021/10/03/12/35/house-6677890_1280.jpg" class="slide-8 absolute inset-0 w-full h-full object-cover transition-opacity duration-700 ease-in-out hidden" />
                                <img src="https://cdn.pixabay.com/photo/2013/05/31/23/51/villa-115193_1280.jpg" class="slide-8 absolute inset-0 w-full h-full object-cover transition-opacity duration-700 ease-in-out hidden" />

                                <div class="absolute inset-0 bg-gradient-to-b from-transparent via-black/50 to-black/90 p-4 flex flex-col justify-end text-white">
                                    <h3 class="text-xl font-semibold">Luxury Villa</h3>
                                    <p class="text-sm">Price: ₹ 345 Lakhs</p>
                                    <p class="text-sm text-white/90">📍 Alibaug Beachfront, Maharashtra</p>
                                    <div class="flex justify-between text-sm pt-2">
                                        <div class="flex space-x-4">
                                            <span class="flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z"></path></svg> 4</span>
                                            <span class="flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd"></path></svg> 3</span>
                                            <span class="flex items-center"><svg class="w-4 h-4 mr-1" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 4a2 2 0 012-2h8a2 2 0 012 2v12a1 1 0 110 2H5a1 1 0 010-2V4zm3 1h2v2H7V5zm2 4H7v2h2V9zm2-4h2v2h-2V5zm2 4h-2v2h2V9z" clip-rule="evenodd"></path></svg> 3200 sqft</span>
                                        </div>
                                        <span class="bg-blue-900/80 text-white text-xs px-2 py-1 rounded">New Listing</span>
                                    </div>
                                </div>


                                <button class="prev8 absolute top-1/2 left-2 transform -translate-y-1/2 bg-white/80 hover:bg-white text-gray-800 px-2 py-1 rounded-full shadow-md z-10">&#10094;</button>
                                <button class="next8 absolute top-1/2 right-2 transform -translate-y-1/2 bg-white/80 hover:bg-white text-gray-800 px-2 py-1 rounded-full shadow-md z-10">&#10095;</button>
                            </div>
                        </div>
                    </div>

                    <!-- Add slider3 and slider4 similarly... -->
                </div>
               </div>
            </div>
        </div>
    </section>

    <!-- Slider Script -->
    <script>
        function initSlider(sliderIndex) {
            const slides = document.querySelectorAll(`.slide-${sliderIndex}`);
            let current = 0;

            function showSlide(index) {
                slides.forEach((slide, i) => {
                    slide.classList.toggle('hidden', i !== index);
                });
            }

            document.querySelector(`.next${sliderIndex}`).addEventListener('click', () => {
                current = (current + 1) % slides.length;
                showSlide(current);
            });

            document.querySelector(`.prev${sliderIndex}`).addEventListener('click', () => {
                current = (current - 1 + slides.length) % slides.length;
                showSlide(current);
            });

            showSlide(0);
        }

        // Initialize sliders
        initSlider(1);
        initSlider(2);
        initSlider(3);
        initSlider(4);
        initSlider(5);
        initSlider(6);
        initSlider(7);
        initSlider(8);

        // Add initSlider(3); and initSlider(4); if you create more cards
    </script>





@endsection
