@extends('component.main')
@section('content')

    <div class="relative w-full h-screen overflow-hidden">

        <!-- Background with gradient overlay -->
        <div class="absolute inset-0">
            <img src="https://cdn.pixabay.com/photo/2023/01/29/18/28/dubai-7753826_1280.jpg" alt="Luxury Property"
                class="w-full h-full object-cover opacity-70" />
            <div class="absolute inset-0 bg-gradient-to-t from-black via-transparent to-transparent"></div>
        </div>

        <!-- Hero Content -->
        <div class="relative h-full flex items-center justify-center px-4 sm:px-6 lg:px-8">
            <div
                class="w-full max-w-5xl text-center px-4 py-8 sm:px-8 sm:py-12 md:py-16 backdrop-blur-md bg-black/20 rounded-xl border-2 border-yellow-400 mx-4">

                <h3 class="text-xs sm:text-sm md:text-lg tracking-widest font-bold text-yellow-400 mb-2 sm:mb-4">
                    PRESENCE LUXURY REAL ESTATE
                </h3>

                <h1
                    class="text-2xl sm:text-4xl md:text-5xl lg:text-6xl xl:text-7xl font-serif font-bold text-white mb-4 sm:mb-6 leading-snug sm:leading-tight">
                    Exceptional Properties <span class="hidden sm:inline"><br></span> for Extraordinary Lives
                </h1>

                <div class="w-16 sm:w-24 h-0.5 sm:h-1 bg-yellow-400 mx-auto my-4 sm:my-6"></div>

                <p
                    class="text-sm sm:text-base md:text-lg text-white/90 font-light max-w-xs sm:max-w-md md:max-w-2xl mx-auto mb-6 sm:mb-8">
                    Discover bespoke properties that redefine luxury living in the world's most exclusive locations.
                </p>

                <button
                    class="bg-transparent border-2 border-yellow-400 text-yellow-300 hover:bg-yellow-500 hover:text-white transition-all duration-300 py-3 px-8 text-md md:text-lg font-medium tracking-wide">
                   <a href="{{route('blog')}}"> EXPLORE COLLECTIONS</a>
                </button>

            </div>
        </div>

        <!-- Scroll Indicator -->
        <div class="absolute bottom-4 sm:bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
            <svg class="w-6 h-6 sm:w-8 sm:h-8 text-yellow-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3"></path>
            </svg>
        </div>

    </div>


    <!-- Search Form -->
    <div class="max-w-7xl container mx-auto px-4 my-12 md:-mt-16 relative z-10">
        <div class="bg-white shadow-xl rounded-lg overflow-hidden border border-cream-200">
            <div class="p-8 bg-[#459FC2] ">
                <h3 class="text-2xl font-serif text-white mb-6">Find Your Perfect Property</h3>

                <form action="{{ route('typed-property') }}" method="get">
                    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                        <!-- Column 1 -->
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-white mb-1">I'm Looking To</label>
                                <div class="flex space-x-2">
                                    <label class="flex-1 cursor-pointer">
                                        <input type="radio" name="type" value="buy" class="hidden peer" checked>
                                        <div
                                            class="w-full text-center py-2 px-4 border rounded font-medium transition-colors peer-checked:bg-black hover:bg-white peer-checked:text-white border-black bg-black text-white">
                                            Buy
                                        </div>
                                    </label>

                                    <label class="flex-1 cursor-pointer">
                                        <input type="radio" name="type" value="rent" class="hidden peer">
                                        <div
                                            class="w-full text-center py-2 px-4 border rounded font-medium transition-colors peer-checked:bg-black peer-checked:text-black hover:bg-black border-gray-900 bg-red-50 text-black hover:text-white">
                                            Rent
                                        </div>
                                    </label>
                                </div>

                            </div>

                            <div>
                                <label class="block text-sm font-medium text-white mb-1">Property Type</label>
                                <select name="property_type_id"
                                    class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-sky-300 focus:border-sky-300">
                                    <option value="">All Types</option>
                                    @foreach ($propertyTypes as $propertyType)
                                        <option value="{{ $propertyType->id }}">{{ $propertyType->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <!-- Column 2 -->
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-white mb-1">Location</label>
                                <input type="text" name="location" placeholder="Preferred location..."
                                    class="w-full px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-sky-300 focus:border-sky-300">
                            </div>

                            <div>
                                <label class="block text-sm font-medium text-white mb-1">Price Range</label>
                                <div class="flex items-center space-x-2">
                                    <select name="min_price"
                                        class="flex-1 px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-sky-300 focus:border-sky-300">
                                        <option value="">Min</option>
                                        <option value="1000000">₹1M</option>
                                        <option value="5000000">₹5M</option>
                                        <option value="10000000">₹10M</option>
                                    </select>
                                    <span class="text-gray-50">to</span>
                                    <select name="max_price"
                                        class="flex-1 px-4 py-2 border border-gray-300 rounded focus:ring-2 focus:ring-sky-300 focus:border-sky-300">
                                        <option value="">Max</option>
                                        <option value="5000000">₹5M</option>
                                        <option value="10000000">₹10M</option>
                                        <option value="20000000">₹20M+</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Column 3 -->
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-white mb-1">Bedrooms</label>
                                <div class="flex flex-wrap gap-2">
                                    @for ($i = 1; $i <= 5; $i++)
                                        <label>
                                            <input type="radio" name="bedrooms" value="{{ $i }}"
                                                class="peer hidden">
                                            <div
                                                class="px-4 py-2 text-white border border-gray-300 rounded cursor-pointer
                           hover:border-sky-300 hover:text-sky-700
                           peer-checked:border-sky-300 peer-checked:text-sky-700 peer-checked:bg-white">
                                                {{ $i }}+
                                            </div>
                                        </label>
                                    @endfor
                                </div>
                            </div>


                            <div class="pt-2">
                                <button type="submit"
                                    class="w-full py-3 px-4 hover:bg-white bg-black text-white active:bg-black  hover:text-black font-semibold text-base rounded-lg transition-colors duration-300 flex items-center justify-center gap-2 shadow-md focus:outline-none focus:ring-2 focus:ring-sky-500 focus:ring-offset-2">
                                    <span>Search</span>

                                </button>
                            </div>

                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>


    <!-- Statement Section -->
    <div class=" relative  lg:my-20 py-8 bg-[#1a3d4b] overflow-hidden">
        <div class="absolute inset-0">
            <img src="https://cdn.pixabay.com/photo/2017/07/03/21/45/house-2469110_1280.jpg"
                class="w-full h-full object-cover opacity-20" alt="Luxury Home">
        </div>

        <div class="relative container mx-auto px-6">
            <div class=" max-w-4xl mx-auto text-center">
                <div class="w-16 h-1 bg-gray-300 mx-auto mb-8"></div>
                <h2 class="text-3xl md:text-4xl font-serif font-light text-white mb-8 leading-relaxed">
                    "We don't just sell properties—we curate lifestyles. Each home in our portfolio represents the pinnacle
                    of design, location, and craftsmanship."
                </h2>
                <p class="text-lg text-cream-100 font-light mb-8">
                    With over 25 years of experience in luxury real estate, our team has established unparalleled
                    connections in the world's most exclusive markets. We provide discreet, personalized service to a select
                    clientele who demand nothing but the best.
                </p>
                <button class="inline-flex items-center text-gray-300 hover:text-red-50 font-medium group">
                    Meet Our Team
                    <svg class="ml-2 w-5 h-5 group-hover:translate-x-1 transition-transform" fill="none"
                        stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3">
                        </path>
                    </svg>
                </button>
            </div>
        </div>
    </div>

    {{-- PROPERTY TYPE --}}
    <div class="max-w-7xl mx-auto px-4 md:py-12 py-8">
        <div class="text-center mb-10 py-4">
            <h1 class="text-4xl font-extrabold text-gray-900 mb-2">Explore Property Types</h1>
            <p class="text-lg text-gray-600">
                Discover a wide range of premium property types tailored to your lifestyle and comfort.
            </p>
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
            <!-- Card Start -->
            @foreach($propertyTypes as $propertyType)
                <div
                    class="relative bg-white rounded-3xl shadow-lg overflow-hidden group hover:shadow-2xl transition duration-500 hover:scale-[1.03]">
                    <!-- Animated Glow Overlay -->
                    <div
                        class="absolute inset-0 bg-gradient-to-br from-[#459FC2] via-white to-[#459FC2] opacity-0 group-hover:opacity-40 transition duration-500 mix-blend-multiply pointer-events-none">
                    </div>

                    <!-- Decorative Top Border -->
                    <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-[#459FC2] to-[#459FC2]"></div>

                    <div class="relative z-10 flex flex-col items-center p-8">
                        <!-- Icon Container -->
                        <div
                            class="w-24 h-24 rounded-full bg-gradient-to-br from-[#459FC2] to-[#459FC2] shadow-md flex items-center justify-center transform group-hover:rotate-3 transition duration-300">
                            <img src="{{ asset('asset/img/residential.png') }}" alt="Studio"
                                 class="w-12 h-12 object-contain" />
                        </div>

                        <!-- Title -->
                        <h2
                            class="text-2xl font-bold text-gray-800 mt-5 tracking-wide group-hover:text-[#459FC2] transition duration-300">
                            {{$propertyType->title}}
                        </h2>

                        <!-- Subtitle -->
                        <p class="mt-1 text-sm text-gray-500 group-hover:text-gray-700 transition duration-300">
                            {{$propertyType->properties()->where('status', 'available')->count()}}+ Available
                        </p>

                        <!-- Action Button (Optional) -->
                        <a href="{{route('category-properties', $propertyType->id)}}"
                            class="mt-4 text-sm px-4 py-2 bg-[#459FC2] text-white rounded-full font-medium shadow-md hover:bg-black transition duration-300">
                            Explore
                        </a>
                    </div>
                </div>
            @endforeach



            <!-- Add more cards as needed... -->
        </div>
    </div>


    {{-- PROPERTY PLACE --}}
    <div
        class="flex flex-col md:flex-row items-center gap-8 md:gap-12 px-4 sm:px-6 lg:px-24 py-10 sm:py-14 bg-gradient-to-br from-[#459FC2] via-white to-[#459FC2] rounded-3xl shadow-xl my-12 mx-4 sm:mx-6 lg:mx-auto max-w-screen-xl">

        <!-- Image Section -->
        <div class="w-full md:w-1/2">
            <div class="aspect-w-16 aspect-h-10 overflow-hidden rounded-2xl shadow-xl">
                <img src="https://demo.htmlcodex.com/2259/real-estate-html-template/img/about.jpg" alt="Perfect Property"
                    class="w-full h-full object-cover hover:scale-110 transition-transform duration-500 ease-in-out" />
            </div>
        </div>

        <!-- Content Section -->
        <div class="w-full md:w-1/2 text-center md:text-left">
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-gray-900 leading-tight mb-4 tracking-tight">
                <span class="bg-gradient-to-r from-red-500 to-red-700 text-transparent bg-clip-text">
                    #1 Place
                </span>
                <br class="block md:hidden" />
                To Find The Perfect Property
            </h2>

            <p class="text-base sm:text-lg text-gray-700 mb-6 leading-relaxed">
                Discover the ideal property for your lifestyle. From elegant homes to modern apartments, our listings offer
                unmatched value. Trust us to turn your dreams into an address.
            </p>

            <ul class="space-y-4 text-gray-800 text-sm sm:text-base mb-8">
                <li class="flex items-start gap-3">
                    <svg class="w-6 h-6 text-red-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span>Tempor erat elitr rebum at clita</span>
                </li>
                <li class="flex items-start gap-3">
                    <svg class="w-6 h-6 text-red-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span>Aliqu diam amet diam et eos</span>
                </li>
                <li class="flex items-start gap-3">
                    <svg class="w-6 h-6 text-red-500 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                    <span>Clita duo justo magna dolore erat amet</span>
                </li>
            </ul>

            <button
                class="bg-red-500 hover:bg-[#459FC2] text-white text-sm sm:text-base font-skyi9old px-6 py-3 rounded-full shadow-md hover:shadow-lg transition duration-300 hover:scale-105">
                Read More
            </button>
        </div>
    </div>


    {{-- slider --}}
    <div class="flex flex-col items-center text-center px-4 md:py-12">
        <!-- Heading -->
        <h1
            class="text-4xl md:text-6xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-red-700  to-black drop-shadow-md">
            Best Deals
        </h1>

        <!-- Gradient Line -->
        <div class="w-24 h-1 bg-gradient-to-r from-blue-950 to-red-400 rounded-full my-4"></div>

        <!-- Description -->
        <p class="text-gray-700 text-base md:text-lg max-w-2xl leading-relaxed">
            Unlock the best real estate opportunities with expert guidance. From cozy apartments to luxurious villas,
            explore hand-picked listings tailored to your lifestyle, budget, and location preferences.
        </p>
    </div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-8 md:px-16 py-8 group">
        <!-- Carousel container -->
        <div class="relative overflow-hidden">
            <!-- Track -->
            <div id="carouselTrack" class=" flex transition-transform duration-500 ease-in-out will-change-transform">
                <!-- Slides will be inserted here by JavaScript -->
            </div>
        </div>

        <!-- Navigation buttons -->
        <button id="prevButton" aria-label="Previous slide"
            class="absolute left-2 top-1/2 -translate-y-1/2 bg-black/70 hover:bg-red-600 text-white rounded-full p-2 shadow-lg z-10 opacity-0 group-hover:opacity-100 transition-opacity duration-300 focus:opacity-100">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z"
                    clip-rule="evenodd" />
            </svg>
        </button>
        <button id="nextButton" aria-label="Next slide"
            class="absolute right-2 top-1/2 -translate-y-1/2 bg-black/70 hover:bg-red-600 text-white rounded-full p-2 shadow-lg z-10 opacity-0 group-hover:opacity-100 transition-opacity duration-300 focus:opacity-100">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z"
                    clip-rule="evenodd" />
            </svg>
        </button>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Sample data - replace with your actual data
            const properties = [{
                    title: "Luxury Villa",
                    price: "฿12,000,000",
                    location: "Maret, Ko Samui",
                    date: "3 days ago",
                    beds: 4,
                    baths: 3,
                    area: "350 Sqm",
                    images: [
                        "{{ asset('asset/img/image1.jpg') }}",
                        "{{ asset('asset/img/residential.png') }}",
                        "{{ asset('asset/img/image1.jpg') }}"
                    ]
                },
                {
                    title: "Beachfront House",
                    price: "฿8,500,000",
                    location: "Chaweng, Ko Samui",
                    date: "1 week ago",
                    beds: 3,
                    baths: 2,
                    area: "280 Sqm",
                    images: [
                        "{{ asset('asset/img/image1.jpg') }}",
                        "{{ asset('asset/img/residential.png') }}",
                        "{{ asset('asset/img/image1.jpg') }}"
                    ]
                },
                {
                    title: "Modern Apartment",
                    price: "฿5,200,000",
                    location: "Lamai, Ko Samui",
                    date: "2 days ago",
                    beds: 2,
                    baths: 1,
                    area: "120 Sqm",
                    images: [
                        "{{ asset('asset/img/image1.jpg') }}",
                        "{{ asset('asset/img/residential.png') }}",
                        "{{ asset('asset/img/image1.jpg') }}"
                    ]
                },
                {
                    title: "Hillside Villa",
                    price: "฿15,000,000",
                    location: "Bophut, Ko Samui",
                    date: "5 days ago",
                    beds: 5,
                    baths: 4,
                    area: "420 Sqm",
                    images: [
                        "{{ asset('asset/img/image1.jpg') }}",
                        "{{ asset('asset/img/residential.png') }}",
                        "{{ asset('asset/img/image1.jpg') }}"
                    ]
                },
                {
                    title: "Garden House",
                    price: "฿6,750,000",
                    location: "Maenam, Ko Samui",
                    date: "1 day ago",
                    beds: 3,
                    baths: 2,
                    area: "320 Sqm",
                    images: [
                        "{{ asset('asset/img/image1.jpg') }}",
                        "{{ asset('asset/img/residential.png') }}",
                        "{{ asset('asset/img/image1.jpg') }}"
                    ]
                }
            ];

            const carouselTrack = document.getElementById('carouselTrack');
            const prevButton = document.getElementById('prevButton');
            const nextButton = document.getElementById('nextButton');

            let currentIndex = 0;
            let slideWidth = 0;
            let visibleSlides = 1;
            let autoSlideInterval;
            let isDragging = false;
            let startPos = 0;
            let currentTranslate = 0;
            let prevTranslate = 0;
            let animationID;

            // Initialize carousel
            function initCarousel() {
                // Clear existing slides
                carouselTrack.innerHTML = '';

                // Determine number of visible slides based on screen width
                visibleSlides = window.innerWidth >= 1024 ? 3 : window.innerWidth >= 768 ? 2 : 1;

                // Create slides
                properties.forEach((property, index) => {
                    const slide = document.createElement('div');
                    slide.className =
                        `flex-shrink-0 px-2 transition-all duration-300 ${visibleSlides === 1 ? 'w-full' : visibleSlides === 2 ? 'w-1/2' : 'w-1/3'}`;
                    slide.innerHTML = `
                        <div class="bg-white rounded-2xl shadow-lg overflow-hidden h-full flex flex-col">
                            <div class="relative aspect-[4/3] overflow-hidden">
                                ${property.images.map((img, imgIndex) => `
                                                                                    <img src="${img}" alt="${property.title}"
                                                                                        class="absolute inset-0 w-full h-full object-cover transition-opacity duration-500 ${imgIndex === 0 ? 'opacity-100' : 'opacity-0'}"
                                                                                        data-slide-img="${index}-${imgIndex}">
                                                                                `).join('')}

                                <div class="absolute bottom-0 left-0 w-full bg-gradient-to-b from-transparent via-black/80 to-black/90 text-white p-4 space-y-1">
                                    <h3 class="text-lg font-semibold leading-tight">${property.title}</h3>
                                    <p class="text-md">${property.price}</p>
                                    <div class="flex justify-between text-sm">
                                        <p>📍 ${property.location}</p>
                                        <p>${property.date}</p>
                                    </div>
                                    <div class="flex justify-center text-sm text-white gap-4 mt-2">
                                        <span>🛏 ${property.beds}</span>
                                        <span>🛁 ${property.baths}</span>
                                        <span>📐 ${property.area}</span>
                                    </div>
                                </div>

                                <div class="absolute top-1/2 w-full flex justify-between px-2">
                                    <button onclick="changeImage(${index}, -1)" aria-label="Previous image"
                                        class="bg-white/70 hover:bg-white text-black rounded-full p-1 transition-all duration-300 shadow">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M12.707 5.293a1 1 0 010 1.414L9.414 10l3.293 3.293a1 1 0 01-1.414 1.414l-4-4a1 1 0 010-1.414l4-4a1 1 0 011.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                    <button onclick="changeImage(${index}, 1)" aria-label="Next image"
                                        class="bg-white/70 hover:bg-white text-black rounded-full p-1 transition-all duration-300 shadow">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    `;
                    carouselTrack.appendChild(slide);
                });

                // Clone slides for infinite loop
                for (let i = 0; i < visibleSlides; i++) {
                    const clone = carouselTrack.children[i].cloneNode(true);
                    carouselTrack.appendChild(clone);
                }

                updateCarousel();
                startAutoSlide();

                // Add touch event listeners for mobile swipe
                carouselTrack.addEventListener('touchstart', touchStart);
                carouselTrack.addEventListener('touchmove', touchMove);
                carouselTrack.addEventListener('touchend', touchEnd);

                // Add mouse event listeners for desktop drag
                carouselTrack.addEventListener('mousedown', dragStart);
                carouselTrack.addEventListener('mousemove', dragMove);
                carouselTrack.addEventListener('mouseup', dragEnd);
                carouselTrack.addEventListener('mouseleave', dragEnd);
            }

            // Update carousel position
            function updateCarousel() {
                slideWidth = carouselTrack.children[0].offsetWidth;
                carouselTrack.style.transform = `translateX(-${slideWidth * currentIndex}px)`;
            }

            // Move to specific slide
            function moveToSlide(index) {
                stopAutoSlide();
                currentIndex = index;

                // Handle loop when reaching end
                if (currentIndex >= properties.length) {
                    setTimeout(() => {
                        carouselTrack.style.transition = 'none';
                        currentIndex = 0;
                        updateCarousel();
                    }, 500);
                }

                carouselTrack.style.transition = 'transform 0.5s ease-in-out';
                updateCarousel();
                startAutoSlide();
            }

            // Next slide
            function nextSlide() {
                moveToSlide(currentIndex + 1);
            }

            // Previous slide
            function prevSlide() {
                if (currentIndex <= 0) {
                    // Jump to clone at end for smooth loop
                    carouselTrack.style.transition = 'none';
                    currentIndex = properties.length;
                    updateCarousel();

                    setTimeout(() => {
                        carouselTrack.style.transition = 'transform 0.5s ease-in-out';
                        prevSlide();
                    }, 50);
                } else {
                    moveToSlide(currentIndex - 1);
                }
            }

            // Auto slide
            function startAutoSlide() {
                autoSlideInterval = setInterval(nextSlide, 5000);
            }

            function stopAutoSlide() {
                clearInterval(autoSlideInterval);
            }

            // Change image within a slide
            window.changeImage = function(slideIndex, direction) {
                const slide = carouselTrack.children[slideIndex];
                const images = slide.querySelectorAll('[data-slide-img^="' + slideIndex + '-"]');
                let currentImgIndex = 0;

                // Find current visible image
                images.forEach((img, index) => {
                    if (img.style.opacity === '1') {
                        currentImgIndex = index;
                    }
                });

                let newIndex = currentImgIndex + direction;

                // Handle loop
                if (newIndex < 0) newIndex = images.length - 1;
                if (newIndex >= images.length) newIndex = 0;

                // Update opacity
                images.forEach(img => img.style.opacity = '0');
                images[newIndex].style.opacity = '1';
            };

            // Touch events for mobile swipe
            function touchStart(e) {
                stopAutoSlide();
                startPos = e.touches[0].clientX;
                isDragging = true;
                carouselTrack.style.transition = 'none';
                animationID = requestAnimationFrame(animation);
            }

            function touchMove(e) {
                if (isDragging) {
                    const currentPosition = e.touches[0].clientX;
                    currentTranslate = prevTranslate + currentPosition - startPos;
                }
            }

            function touchEnd() {
                if (isDragging) {
                    cancelAnimationFrame(animationID);
                    isDragging = false;

                    const movedBy = currentTranslate - prevTranslate;

                    if (movedBy < -50) {
                        nextSlide();
                    } else if (movedBy > 50) {
                        prevSlide();
                    } else {
                        carouselTrack.style.transition = 'transform 0.5s ease-in-out';
                        updateCarousel();
                    }

                    startAutoSlide();
                }
            }

            // Mouse events for desktop drag
            function dragStart(e) {
                stopAutoSlide();
                startPos = e.clientX;
                isDragging = true;
                carouselTrack.style.transition = 'none';
                animationID = requestAnimationFrame(animation);
            }

            function dragMove(e) {
                if (isDragging) {
                    const currentPosition = e.clientX;
                    currentTranslate = prevTranslate + currentPosition - startPos;
                }
            }

            function dragEnd() {
                if (isDragging) {
                    cancelAnimationFrame(animationID);
                    isDragging = false;

                    const movedBy = currentTranslate - prevTranslate;

                    if (movedBy < -50) {
                        nextSlide();
                    } else if (movedBy > 50) {
                        prevSlide();
                    } else {
                        carouselTrack.style.transition = 'transform 0.5s ease-in-out';
                        updateCarousel();
                    }

                    startAutoSlide();
                }
            }

            // Smooth animation for dragging
            function animation() {
                carouselTrack.style.transform =
                    `translateX(calc(-${slideWidth * currentIndex}px + ${currentTranslate - prevTranslate}px))`;
                animationID = requestAnimationFrame(animation);
            }

            // Event listeners for navigation buttons
            prevButton.addEventListener('click', () => {
                prevSlide();
            });

            nextButton.addEventListener('click', () => {
                nextSlide();
            });

            // Initialize on load
            initCarousel();

            // Handle resize
            window.addEventListener('resize', () => {
                stopAutoSlide();
                initCarousel();
            });
        });
    </script>



    {{-- PROPERTY LISTING TABS --}}
    <section class="bg-[#459FC2]/10 px-4 lg:px-12 px-8 lg:py-16 mt-4">
        <div class="max-w-7xl mx-auto py-12">
            <!-- Header -->
            <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-10 gap-6">
                <div>
                    <h1
                        class="text-4xl md:text-5xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-red-700 via-black to-black">
                        Discover Property
                    </h1>
                    <div class="w-20 h-1 bg-gradient-to-r from-blue-950 to-red-400 rounded-full mt-2 mb-3"></div>
                    <p class="text-gray-600 max-w-xl text-base md:text-lg leading-relaxed">
                        From cozy apartments to luxurious villas, find hand-picked listings tailored to your lifestyle,
                        budget, and location preferences.
                    </p>
                </div>

                <!-- Tab Buttons -->
                <div class="flex space-x-1 lg:gap-3">
                    <button
                        class="active tab-btn bg-[#449FC3] text-gray-800 lg:px-5 lg:py-2 p-2 rounded-lg lg:text-sm text-xs font-semibold shadow"
                        data-tab="featured">Featured</button>
                    <button
                        class="tab-btn bg-[#449FC3] text-gray-800 lg:px-5 lg:py-2 p-2 rounded-lg lg:text-sm text-xs font-semibold shadow"
                        data-tab="sell">For Sell</button>
                    <button
                        class="tab-btn bg-[#449FC3] text-gray-800 lg:px-5 lg:py-2 p-2 rounded-lg lg:text-sm text-xs font-semibold shadow"
                        data-tab="rent">For Rent</button>
                </div>
            </div>

            <!-- Property Grid -->
            <div id="propertyGrid" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Property Card (Repeat & Change data-category) -->

                <!-- Clone and change the data-category accordingly: "sell", "rent", "featured" -->
                <!-- Example Sell Property -->
                @foreach($properties as $property)
                    <div class="property-card" data-category="{{$property->type}}">
                        <!-- Use same card structure -->
                        <!-- Only category, title, and price needs change -->
                        <!-- ... -->
                        <div class="bg-white rounded-xl shadow hover:shadow-lg transition overflow-hidden">
                            <div class="relative">
                                <img src="{{asset('storage/'. $property->image?->url)}}"
                                     alt="Golden Urban House" class="w-full h-60 object-cover" />
                                <span
                                    class="absolute top-3 left-3 bg-[#459FC2] text-white text-xs font-semibold p-3 rounded shadow">For
                                {{ucfirst($property->type)}}</span>
                                <span
                                    class="absolute bottom-3 left-3 bg-white text-blue-900 text-xs font-semibold p-3 rounded shadow">Apartment</span>
                            </div>
                            <div class="p-5">
                                <h2 class="text-xl font-semibold text-green-600 mb-1">Price: ₹{{number_format($property->price)}}</h2>
                                <a href="{{ route('detail', $property->id) }}"
                                   class="text-gray-800 font-medium mb-1 hover:text-blue-600 transition-colors">{{$property->title}}</a>
                                <p class="text-gray-600 text-sm mb-3">{{ strlen($property->description) > 30 ? substr($property->description, 0, 30) . '...' : $property->description }}
                                </p>
                                <p class="flex items-center text-sm text-gray-500 mb-4">
                                    <span class="material-symbols-outlined text-[#459FC2] mr-1">location_on</span>{{$property->address}}
                                </p>
                                <div class="flex justify-between text-sm text-gray-700 border-t pt-3">
                                <span class="flex items-center gap-1"><span
                                        class="material-symbols-outlined text-[#459FC2]">crop_square</span>{{$property->area}} Sqft</span>
                                    <span class="flex items-center gap-1"><span
                                            class="material-symbols-outlined text-[#459FC2]">bed</span>{{$property->bedrooms}} Bed</span>
                                    <span class="flex items-center gap-1"><span
                                            class="material-symbols-outlined text-[#459FC2]">bathtub</span>{{$property->bathrooms}} Bath</span>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach



                <!-- Add more cards here -->
            </div>

            <!-- Browse More Button -->
            <div class="flex justify-center my-6 pb-4">
                <button class="bg-[#459FC2] hover:bg-[#459FC9] text-white px-6 py-3 rounded-lg font-semibold transition">
                    Browse More Properties
                </button>
            </div>
        </div>
    </section>

    <!-- Tab Filtering Script -->
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const tabs = document.querySelectorAll('.tab-btn');
            const cards = document.querySelectorAll('.property-card');

            tabs.forEach(tab => {
                tab.addEventListener('click', () => {
                    const category = tab.getAttribute('data-tab');

                    tabs.forEach(btn => btn.classList.remove('active', 'bg-sky-600',
                        'text-white'));
                    tab.classList.add('active', 'bg-sky-600', 'text-white');

                    cards.forEach(card => {
                        card.style.display = (category === 'featured' || card.getAttribute(
                                'data-category') === category) ?
                            'block' :
                            'none';
                    });
                });
            });
        });
    </script>

    {{-- SERVICE WE OFFER --}}

    <div class="max-w-7xl mx-auto px-6 md:px-12 lg:px-24 my-16">
        <!-- Heading -->
        <div class="text-center mb-10">
            <h1
                class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-red-600 via-black to-black">
                Services We Offer
            </h1>
            <p class="text-gray-700 text-base md:text-lg font-medium mt-2">
                Trusted real estate solutions in Koh Samui for buying, selling, and managing properties
            </p>
        </div>

        <!-- Cards -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
            <!-- Card 1 -->
            <div
                class="bg-gradient-to-br from-white to-[#459FC2]/50 p-6 rounded-xl shadow-md hover:shadow-xl hover:scale-[1.03] transition-transform duration-300">
                <div class="mb-4 text-sky-700">
                    <i class="ri-terminal-box-fill text-3xl"></i>
                </div>
                <h2 class="text-lg font-bold text-gray-800 mb-2">Property Management</h2>
                <p class="text-gray-600 text-sm">
                    Comprehensive services for landlords and investors to manage real estate assets efficiently and
                    profitably.
                </p>
            </div>

            <!-- Card 2 -->
            <div
                class="bg-gradient-to-br from-white to-[#459FC2]/50 p-6 rounded-xl shadow-md hover:shadow-xl hover:scale-[1.03] transition-transform duration-300">
                <div class="mb-4 text-sky-700">
                    <i class="ri-bank-card-2-fill text-3xl"></i>
                </div>
                <h2 class="text-lg font-bold text-gray-800 mb-2">Property Buying</h2>
                <p class="text-gray-600 text-sm">
                    Discover hand-picked listings and receive expert advice to buy the perfect property in the ideal
                    location.
                </p>
            </div>

            <!-- Card 3 -->
            <div
                class="bg-gradient-to-br from-white to-[#459FC2]/50 p-6 rounded-xl shadow-md hover:shadow-xl hover:scale-[1.03] transition-transform duration-300">
                <div class="mb-4 text-sky-700">
                    <i class="ri-verified-badge-fill text-3xl"></i>
                </div>
                <h2 class="text-lg font-bold text-gray-800 mb-2">Legal Assistance</h2>
                <p class="text-gray-600 text-sm">
                    Navigate the legal side of real estate with confidence—contracts, titles, and compliance all covered.
                </p>
            </div>

            <!-- Card 4 -->
            <div
                class="bg-gradient-to-br from-white to-[#459FC2]/50 p-6 rounded-xl shadow-md hover:shadow-xl hover:scale-[1.03] transition-transform duration-300">
                <div class="mb-4 text-sky-700">
                    <i class="ri-verified-badge-fill text-3xl"></i>
                </div>
                <h2 class="text-lg font-bold text-gray-800 mb-2">Legal Assistance</h2>
                <p class="text-gray-600 text-sm">
                    Navigate the legal side of real estate with confidence—contracts, titles, and compliance all covered.
                </p>
            </div>

            <!-- Card 5 -->
            <div
                class="bg-gradient-to-br from-white to-[#459FC2]/50 p-6 rounded-xl shadow-md hover:shadow-xl hover:scale-[1.03] transition-transform duration-300">
                <div class="mb-4 text-sky-700">
                    <svg class="w-8 h-8" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M13 16h-1v-4h-1m1-4h.01M12 2a10 10 0 1010 10A10 10 0 0012 2z" />
                    </svg>
                </div>
                <h2 class="text-lg font-bold text-gray-800 mb-2">Investment Consulting</h2>
                <p class="text-gray-600 text-sm">
                    Make smart investment decisions with data-driven strategies and personalized ROI forecasts.
                </p>
            </div>

            <!-- Card 6 -->
            <div
                class="bg-gradient-to-br from-white to-[#459FC2]/50 p-6 rounded-xl shadow-md hover:shadow-xl hover:scale-[1.03] transition-transform duration-300">
                <div class="mb-4 text-sky-700">
                    <i class="ri-home-3-fill text-3xl"></i>
                </div>
                <h2 class="text-lg font-bold text-gray-800 mb-2">Rental Services</h2>
                <p class="text-gray-600 text-sm">
                    Get expert help listing, marketing, and managing rental properties with tenant screening and support.
                </p>
            </div>
        </div>


    </div>

    {{-- CONTACT US --}}
    <div class="w-full bg-gradient-to-r from-sky-50 to-sky-100 py-16 px-4">
        <div
            class="max-w-7xl mx-auto bg-white rounded-3xl shadow-2xl overflow-hidden flex flex-col-reverse md:flex-row items-center gap-10 p-6 md:p-12 transition-all duration-300">

            <!-- Text Content -->
            <div class="w-full md:w-1/2 space-y-6">
                <h2 class="text-4xl font-bold text-sky-800 leading-snug">Talk to Our Certified Agent Today</h2>
                <p class="text-gray-600 text-lg">
                    Ready to find your perfect home? Our experienced agents are here to guide you every step of the way with
                    personalized support and professional insight.
                </p>

                <div class="flex flex-col sm:flex-row gap-4">
                    <a href="tel:+1234567890"
                        class="flex items-center justify-center bg-[#459FC2] hover:bg-sky-900 text-white font-semibold lg:px-6 lg:py-3 p-3 rounded-xl shadow-md transition duration-300 transform hover:scale-105">
                        📞 Make a Call
                    </a>
                    <a href="#appointment"
                        class="flex items-center justify-center bg-black hover:bg-white text-white font-semibold lg:px-6 lg:py-3 p-3 rounded-xl shadow-md transition duration-300 transform hover:scale-105">
                        📅 Get Appointment
                    </a>
                </div>
            </div>

            <!-- Image -->
            <div class="w-full md:w-1/2">
                <div class="relative group">
                    <img src="https://demo.htmlcodex.com/2259/real-estate-html-template/img/call-to-action.jpg"
                        alt="Certified Agent"
                        class="w-full h-auto rounded-2xl shadow-xl transform group-hover:scale-105 transition duration-500" />
                    <div
                        class="absolute bottom-4 left-4 bg-white text-blue-700 font-semibold px-4 py-2 rounded-lg shadow-md text-sm uppercase tracking-wider">
                        24/7 Support
                    </div>
                </div>
            </div>

        </div>
    </div>

    {{-- PROPERTY AGENT --}}

    <div class="max-w-7xl mx-auto lg:my-24 px-4 py-8">
        <div class="text-center mb-10">
            <h1 class="text-4xl font-extrabold text-gray-800 mb-4">Meet Our Property Agents</h1>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                Our expert agents are here to help you find your dream property with personalized support and local
                expertise.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
            <!-- Card Start -->
            <div
                class="bg-white shadow-xl rounded-2xl overflow-hidden group hover:shadow-2xl transition-shadow duration-300">
                <img src="https://demo.htmlcodex.com/2259/real-estate-html-template/img/team-1.jpg" alt="Agent"
                    class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">

                <!-- Social Icons -->
                <div class="flex justify-center gap-3 -mt-6 z-10 relative">
                    <a href="#" class="bg-[#459FC2] text-white p-2 rounded-full hover:bg-sky-900 transition">
                        <i class="ri-facebook-fill text-xl"></i>
                    </a>
                    <a href="#" class="bg-[#459FC2] text-white p-2 rounded-full hover:bg-sky-900 transition">
                        <i class="ri-instagram-fill text-xl"></i>
                    </a>
                    <a href="#" class="bg-[#459FC2] text-white p-2 rounded-full hover:bg-sky-900 transition">
                        <i class="ri-whatsapp-fill text-xl"></i>
                    </a>
                </div>

                <!-- Details -->
                <div class="p-4 text-center">
                    <h2 class="text-xl font-semibold text-gray-800">Agent Name</h2>
                    <p class="text-sm text-gray-500 mt-1">Senior Property Consultant</p>
                </div>
            </div>
            <!-- Repeat above card 3 more times -->
            <div
                class="bg-white shadow-xl rounded-2xl overflow-hidden group hover:shadow-2xl transition-shadow duration-300">
                <img src="https://demo.htmlcodex.com/2259/real-estate-html-template/img/team-1.jpg" alt="Agent"
                    class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
                <div class="flex justify-center gap-3 -mt-6 z-10 relative">
                    <a href="#" class="bg-[#459FC2] text-white p-2 rounded-full hover:bg-sky-900 transition">
                        <i class="ri-facebook-fill text-xl"></i>
                    </a>
                    <a href="#" class="bg-[#459FC2] text-white p-2 rounded-full hover:bg-sky-900 transition">
                        <i class="ri-instagram-fill text-xl"></i>
                    </a>
                    <a href="#" class="bg-[#459FC2] text-white p-2 rounded-full hover:bg-sky-900 transition">
                        <i class="ri-whatsapp-fill text-xl"></i>
                    </a>
                </div>
                <div class="p-4 text-center">
                    <h2 class="text-xl font-semibold text-gray-800">Agent Name</h2>
                    <p class="text-sm text-gray-500 mt-1">Senior Property Consultant</p>
                </div>
            </div>

            <div
                class="bg-white shadow-xl rounded-2xl overflow-hidden group hover:shadow-2xl transition-shadow duration-300">
                <img src="https://demo.htmlcodex.com/2259/real-estate-html-template/img/team-1.jpg" alt="Agent"
                    class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
                <div class="flex justify-center gap-3 -mt-6 z-10 relative">
                    <a href="#" class="bg-[#459FC2] text-white p-2 rounded-full hover:bg-sky-900 transition">
                        <i class="ri-facebook-fill text-xl"></i>
                    </a>
                    <a href="#" class="bg-[#459FC2] text-white p-2 rounded-full hover:bg-sky-900 transition">
                        <i class="ri-instagram-fill text-xl"></i>
                    </a>
                    <a href="#" class="bg-[#459FC2] text-white p-2 rounded-full hover:bg-sky-900 transition">
                        <i class="ri-whatsapp-fill text-xl"></i>
                    </a>
                </div>
                <div class="p-4 text-center">
                    <h2 class="text-xl font-semibold text-gray-800">Agent Name</h2>
                    <p class="text-sm text-gray-500 mt-1">Senior Property Consultant</p>
                </div>
            </div>

            <div
                class="bg-white shadow-xl rounded-2xl overflow-hidden group hover:shadow-2xl transition-shadow duration-300">
                <img src="https://demo.htmlcodex.com/2259/real-estate-html-template/img/team-1.jpg" alt="Agent"
                    class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
                <div class="flex justify-center gap-3 -mt-6 z-10 relative">
                    <a href="#" class="bg-[#459FC2] text-white p-2 rounded-full hover:bg-sky-900 transition">
                        <i class="ri-facebook-fill text-xl"></i>
                    </a>
                    <a href="#" class="bg-[#459FC2] text-white p-2 rounded-full hover:bg-sky-900 transition">
                        <i class="ri-instagram-fill text-xl"></i>
                    </a>
                    <a href="#" class="bg-[#459FC2] text-white p-2 rounded-full hover:bg-sky-900 transition">
                        <i class="ri-whatsapp-fill text-xl"></i>
                    </a>
                </div>
                <div class="p-4 text-center">
                    <h2 class="text-xl font-semibold text-gray-800">Agent Name</h2>
                    <p class="text-sm text-gray-500 mt-1">Senior Property Consultant</p>
                </div>
            </div>
        </div>
    </div>


    {{-- let's connect form  --}}
@include('frontend.contact-form')
@endsection
