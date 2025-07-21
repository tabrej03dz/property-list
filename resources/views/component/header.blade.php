<nav class="bg-gradient-to-r from-blue-50 to-sky-500 fixed w-full z-50 shadow-sm">
    <div class="max-w-8xl mx-auto px-4 sm:px-6 lg:px-8">
        <!-- Top Bar (Logo + Mobile Menu) -->
        <div class="flex justify-between items-center h-12">
            <!-- Mobile Menu Button -->
            <div class="md:hidden">
                <button id="menu-toggle" class="text-blue-900 focus:outline-none" aria-label="Toggle menu" aria-expanded="false">
                    <svg id="menu-open-icon" class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                    </svg>
                    <svg id="menu-close-icon" class="w-8 h-8 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            <!-- Logo (Centered) -->
            <div class="absolute left-1/2 transform -translate-x-1/2 md:relative md:left-0 md:transform-none">
                <a href="/" class="flex items-center" aria-label="Home">
                    <img src="{{ asset('asset/img/logo-w.png') }}" alt="Company Logo" class="h-10 w-auto md:h-24 py-3 transition-all duration-300 hover:scale-105">
                </a>
            </div>

            <!-- Desktop Right Items -->
            <div class="hidden md:flex items-center space-x-6">
                <a href="{{route('contact')}}" class="px-4 py-2 bg-blue-900 text-white rounded-full text-sm font-semibold hover:bg-blue-700 transition-colors shadow-sm">
                    Contact Us
                </a>
            </div>
        </div>

        <!-- Desktop Navigation Bar -->
        <div class="hidden md:flex justify-center items-center md:py-1 border-t border-blue-100">
            <div class="flex space-x-1">
                <a href="{{route('typed-property', 'sale')}}" class="px-5 py-2 text-blue-900 hover:bg-blue-100 rounded-lg font-medium transition-all flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    Buy
                </a>
                <a href="{{route('typed-property', 'rent')}}" class="px-5 py-2 text-blue-900 hover:bg-blue-100 rounded-lg font-medium transition-all flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"/>
                    </svg>
                    Rent
                </a>

                <!-- Category Dropdown -->
                <div class="relative group">
                    <button class="px-5 py-2 text-blue-900 hover:bg-blue-100 rounded-lg font-medium transition-all flex items-center group">
                        <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                        </svg>
                        Category
                        <svg class="w-4 h-4 ml-1 transform group-hover:rotate-180 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div class="absolute left-0 mt-1 w-56 bg-white rounded-lg shadow-xl py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 border border-blue-50 z-50">
                        @php
                            $propertyTypes = \App\Models\PropertyType::all();
                        @endphp
                        @foreach($propertyTypes as $propertyType)
                            <a href="{{route('category-properties', $propertyType)}}" class="block px-5 py-2 text-sm text-blue-900 hover:bg-blue-50 transition-colors flex items-center">
                                <svg class="w-4 h-4 mr-3 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                                </svg>
                                {{$propertyType->title}}
                            </a>
                        @endforeach
{{--                        <a href="{{route('land')}}" class="block px-5 py-2 text-sm text-blue-900 hover:bg-blue-50 transition-colors flex items-center">--}}
{{--                            <svg class="w-4 h-4 mr-3 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">--}}
{{--                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/>--}}
{{--                                </svg>--}}
{{--                            Land--}}
{{--                        </a>--}}
{{--                        <a href="{{route('commercial')}}" class="block px-5 py-2 text-sm text-blue-900 hover:bg-blue-50 transition-colors flex items-center">--}}
{{--                            <svg class="w-4 h-4 mr-3 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">--}}
{{--                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>--}}
{{--                            </svg>--}}
{{--                            Commercial--}}
{{--                        </a>--}}
                    </div>
                </div>

                <a href="{{route('about')}}" class="px-5 py-2 text-blue-900 hover:bg-blue-100 rounded-lg font-medium transition-all flex items-center">
                    <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    About
                </a>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div id="mobile-menu" class="md:hidden hidden bg-white shadow-lg rounded-b-lg px-5 py-3 transform origin-top transition-all duration-300 ease-out">
            <div class="space-y-2">
                <a href="{{route('buy')}}" class="block px-4 py-3 text-blue-900 hover:bg-blue-50 rounded-lg font-medium transition-colors flex items-center">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"/>
                    </svg>
                    Buy
                </a>
                <a href="{{route('rent')}}" class="block px-4 py-3 text-blue-900 hover:bg-blue-50 rounded-lg font-medium transition-colors flex items-center">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 14v3m4-3v3m4-3v3M3 21h18M3 10h18M3 7l9-4 9 4M4 10h16v11H4V10z"/>
                    </svg>
                    Rent
                </a>

                <!-- Mobile Category Dropdown -->
                <div class="relative">
                    <button id="mobile-category-btn" class="w-full px-4 py-3 text-left text-blue-900 hover:bg-blue-50 rounded-lg font-medium transition-colors flex items-center justify-between">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2H6a2 2 0 01-2-2v-2zM14 16a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z"/>
                            </svg>
                            Category
                        </div>
                        <svg id="mobile-category-arrow" class="w-4 h-4 transform transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                        </svg>
                    </button>
                    <div id="mobile-category-menu" class="pl-12 mt-1 space-y-1 hidden transition-all duration-300">
                        <a href="{{route('villa')}}" class="block px-4 py-2 text-sm text-blue-800 hover:bg-blue-50 rounded-lg transition-colors flex items-center">
                            <svg class="w-4 h-4 mr-3 text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                            </svg>
                            Villa
                        </a>
                        <a href="{{route('land')}}" class="block px-4 py-2 text-sm text-blue-800 hover:bg-blue-50 rounded-lg transition-colors flex items-center">
                            <svg class="w-4 h-4 mr-3 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zm0 0h12a2 2 0 002-2v-4a2 2 0 00-2-2h-2.343M11 7.343l1.657-1.657a2 2 0 012.828 0l2.829 2.829a2 2 0 010 2.828l-8.486 8.485M7 17h.01"/>
                            </svg>
                            Land
                        </a>
                        <a href="{{route('commercial')}}" class="block px-4 py-2 text-sm text-blue-800 hover:bg-blue-50 rounded-lg transition-colors flex items-center">
                            <svg class="w-4 h-4 mr-3 text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                            </svg>
                            Commercial
                        </a>
                    </div>
                </div>

                <a href="{{route('about')}}" class="block px-4 py-3 text-blue-900 hover:bg-blue-50 rounded-lg font-medium transition-colors flex items-center">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    About
                </a>
                <a href="{{route('contact')}}" class="block px-4 py-3 bg-blue-600 text-white rounded-lg font-medium transition-colors flex items-center justify-center shadow-sm hover:bg-blue-700">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                    </svg>
                    Contact Us
                </a>
            </div>
        </div>
    </div>
</nav>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        // Mobile menu toggle
        const menuToggle = document.getElementById('menu-toggle');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuOpenIcon = document.getElementById('menu-open-icon');
        const menuCloseIcon = document.getElementById('menu-close-icon');

        menuToggle.addEventListener('click', () => {
            const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
            menuToggle.setAttribute('aria-expanded', !isExpanded);

            mobileMenu.classList.toggle('hidden');
            menuOpenIcon.classList.toggle('hidden');
            menuCloseIcon.classList.toggle('hidden');
        });

        // Mobile category dropdown
        const mobileCategoryBtn = document.getElementById('mobile-category-btn');
        const mobileCategoryMenu = document.getElementById('mobile-category-menu');
        const mobileCategoryArrow = document.getElementById('mobile-category-arrow');

        mobileCategoryBtn.addEventListener('click', () => {
            const isExpanded = mobileCategoryBtn.getAttribute('aria-expanded') === 'true';
            mobileCategoryBtn.setAttribute('aria-expanded', !isExpanded);

            mobileCategoryMenu.classList.toggle('hidden');
            mobileCategoryArrow.classList.toggle('rotate-180');
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', (e) => {
            if (!menuToggle.contains(e.target) && !mobileMenu.contains(e.target)) {
                menuToggle.setAttribute('aria-expanded', 'false');
                mobileMenu.classList.add('hidden');
                menuOpenIcon.classList.remove('hidden');
                menuCloseIcon.classList.add('hidden');
            }
        });
    });
</script>
