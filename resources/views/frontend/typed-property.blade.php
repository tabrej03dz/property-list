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
                @php $count = 0; @endphp
                @foreach($properties as $property)
                    @php $count++; @endphp
                    <a href="{{ route('detail', $property->id) }}">
                        <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden property-card {{ $count > 3 ? 'hidden' : '' }}">
                            <!-- property content remains same -->

                            <div class="relative">
                            <img src="https://demo.htmlcodex.com/2259/real-estate-html-template/img/property-1.jpg"
                                 alt="Golden Urban House" class="w-full h-60 object-cover" />
                            <span
                                class="absolute top-3 left-3 bg-blue-900 text-white text-xs font-semibold p-3 rounded shadow">For
                                {{$property->type}}</span>
                            <span
                                class="absolute bottom-3 left-3 bg-white text-blue-900 text-xs font-semibold p-3 rounded shadow">{{$property->propertyType->title}}</span>
                        </div>
                        <div class="p-5">
                            <h2 class="text-xl font-semibold text-green-600 mb-1">Price: ₹{{number_format($property->price)}}</h2>
                            <p class="text-gray-800 font-medium mb-1">{{$property->title}}</p>
                            <p class="text-gray-600 text-sm mb-3">{{ \Illuminate\Support\Str::limit($property->description, 30) }}

                            </p>
                            <p class="flex items-center text-sm text-gray-500 mb-4">
                                <span class="material-symbols-outlined text-blue-500 mr-1">location_on</span>{{$property->address}}
                            </p>
                            <div class="flex justify-between text-sm text-gray-700 border-t pt-3">
                                <span class="flex items-center gap-1"><span
                                        class="material-symbols-outlined text-blue-500">crop_square</span>{{$property->area}} Sqft</span>
                                <span class="flex items-center gap-1"><span
                                        class="material-symbols-outlined text-blue-500">bed</span>{{$property->bedrooms}} Bedrooms</span>
                                <span class="flex items-center gap-1"><span
                                        class="material-symbols-outlined text-blue-500">bathtub</span>{{$property->bathroom}} Bath</span>
                            </div>
                        </div>
                    </div>
                    </a>
                @endforeach
            </div>

            <div class="text-center mt-12">
                <button id="show-more-properties" class="px-8 py-3 bg-blue-900 hover:bg-blue-800 text-white font-medium rounded-lg transition-all duration-300 transform hover:scale-105">
                    See More Properties
                </button>
            </div>
        </div>
    </section>


    {{-- PROPERTY LISTING --}}



    <section class="py-16 px-4 md:px-10 bg-blue-50">
        <div class="max-w-9xl mx-auto">
            <div class="flex flex-col md:flex-row gap-8">
                <!-- Map Section -->
                <div class="w-full md:w-3/5 h-auto rounded-2xl overflow-hidden shadow-xl relative">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3770.6747709189923!2d72.87765531522318!3d19.076089487092774!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be7cf3a10b8e123%3A0xd246ec78a7ad682f!2sMumbai!5e0!3m2!1sen!2sin!4v1620393041812!5m2!1sen!2sin"
                        width="100%" height="100%" allowfullscreen="" loading="lazy"
                        class="absolute inset-0 w-full h-full border-0">
                    </iframe>
                </div>

                <!-- Property Listing Section -->
                <div class="w-full md:w-4/5">
                    <div
                        class="my-6 bg-gradient-to-r from-blue-900 to-blue-700 text-white px-6 py-4 rounded-xl shadow-lg flex items-center justify-between">
                        <div>
                        <span
                            class="inline-block bg-gold-500 text-blue-900 text-xs font-bold px-2 py-1 rounded uppercase mr-2">Premium</span>
                            <span class="text-sm md:text-base">Exclusive Listing</span>
                        </div>
                        <button class="text-xs font-semibold uppercase tracking-wide hover:underline">View All</button>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        @if($recommendations)
                            @foreach($recommendations as $recommendation)
                                @php $sliderIndex = $loop->index + 1; @endphp
                                <div class="rounded-2xl shadow-xl overflow-hidden transition-all duration-300 bg-white">
                                    <div class="relative aspect-[1] h-full w-full">
                                        <div id="slider{{ $sliderIndex }}" class="w-full h-full relative">
                                            @foreach($recommendation->images as $image)
                                                <img src="{{ asset('storage/'.$image->url)  }}" class="slide-{{ $sliderIndex }} absolute inset-0 w-full h-full object-cover transition-opacity duration-700 ease-in-out {{ $loop->iteration != 1 ? 'hidden' : '' }}" />
                                            @endforeach

                                            <!-- Overlay -->
                                            <a href="{{route('detail', $recommendation->id)}}">
                                                <div class="absolute inset-0 bg-gradient-to-b from-transparent via-black/50 to-black/90 p-4 flex flex-col justify-end text-white">
                                                    <h3 class="text-xl font-semibold">{{ $recommendation->title ?? 'Luxury Villa' }}</h3>
                                                    <p class="text-sm">Price: ₹ {{ $recommendation->price ?? '345 Lakhs' }}</p>
                                                    <p class="text-sm text-white/90">📍 {{ $recommendation->address ?? 'Alibaug Beachfront, Maharashtra' }}</p>
                                                    <div class="flex justify-between text-sm pt-2">
                                                        <div class="flex space-x-4">
                                                            <span class="flex items-center">🛏️ {{ $recommendation->bedrooms ?? 4 }}</span>
                                                            <span class="flex items-center">🛁 {{ $recommendation->bathrooms ?? 3 }}</span>
                                                            <span class="flex items-center">📐 {{ $recommendation->area ?? '3200 sqft' }}</span>
                                                        </div>
                                                        <span class="bg-blue-900/80 text-white text-xs px-2 py-1 rounded">{{ucfirst($recommendation->type)}}</span>
                                                    </div>
                                                </div>
                                            </a>
                                            <!-- Navigation -->
                                            <button class="prev{{ $sliderIndex }} absolute top-1/2 left-2 transform -translate-y-1/2 bg-white/80 hover:bg-white text-gray-800 px-2 py-1 rounded-full shadow-md z-10">&#10094;</button>
                                            <button class="next{{ $sliderIndex }} absolute top-1/2 right-2 transform -translate-y-1/2 bg-white/80 hover:bg-white text-gray-800 px-2 py-1 rounded-full shadow-md z-10">&#10095;</button>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Dynamic Slider Script -->
    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const totalSliders = {{ isset($recommendations) ? count($recommendations) : 0 }};
            for (let i = 1; i <= totalSliders; i++) {
                initSlider(i);
            }
        });

        function initSlider(sliderIndex) {
            const slides = document.querySelectorAll(`.slide-${sliderIndex}`);
            let current = 0;

            function showSlide(index) {
                slides.forEach((slide, i) => {
                    slide.classList.toggle('hidden', i !== index);
                });
            }

            document.querySelector(`.next${sliderIndex}`)?.addEventListener('click', () => {
                current = (current + 1) % slides.length;
                showSlide(current);
            });

            document.querySelector(`.prev${sliderIndex}`)?.addEventListener('click', () => {
                current = (current - 1 + slides.length) % slides.length;
                showSlide(current);
            });

            showSlide(0);
        }
    </script>


    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const showMoreBtn = document.getElementById("show-more-properties");
            const cards = document.querySelectorAll(".property-card");
            let visibleCount = 3;

            showMoreBtn.addEventListener("click", () => {
                let nextVisible = 0;
                for (let i = visibleCount; i < cards.length && nextVisible < 3; i++) {
                    if (cards[i].classList.contains("hidden")) {
                        cards[i].classList.remove("hidden");
                        nextVisible++;
                    }
                }
                visibleCount += nextVisible;

                if (visibleCount >= cards.length) {
                    showMoreBtn.classList.add("hidden");
                }
            });
        });
    </script>





@endsection
