<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" /><meta name="viewport" content="width=device-width,initial-scale=1.0" />
  <title>BZP Real Estate | Premium Properties</title>
  <meta name="description" content="Find your dream home with BZP Real Estate. Browse luxury properties, villas, and commercial spaces." />
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css" rel="stylesheet" />
  <style>
    .nav-transition {
      transition: background-color 0.3s ease, box-shadow 0.3s ease;
    }
    a:focus, button:focus {
      outline: 2px solid #fcfcfc
      outline-offset: 2px;
    }
  </style>
</head>
<body class="font-sans antialiased text-gray-900 bg-white">
  <nav id="mainNav" class="fixed w-full z-50 nav-transition bg-gradient-to-r from-[#459FC2] to-sky-50 bg-opacity-45 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between items-center h-16">
        <div class="hidden md:flex items-center space-x-4">
          <a href="{{route('typed-property', 'sale')}}" class="px-3 py-2 text-red-900 hover:bg-red-100/50 rounded-lg font-medium flex items-center">
            <i class="ri-home-4-line mr-2"></i> Buy
          </a>
          <a href="{{route('typed-property', 'rent')}}" class="px-3 py-2 text-red-900 hover:bg-red-100/50 rounded-lg font-medium flex items-center">
            <i class="ri-community-line mr-2"></i> Rent
          </a>
        </div>
        <div class="md:hidden">
          <button id="menu-toggle" class="text-red-900 focus:outline-none" aria-label="Toggle menu" aria-expanded="false">
            <svg id="menu-open-icon" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M4 6h16M4 12h16M4 18h16"/>
            </svg>
            <svg id="menu-close-icon" class="w-6 h-6 hidden" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M6 18L18 6M6 6l12 12"/>
            </svg>
          </button>
        </div>
        <div class="absolute left-1/2 transform -translate-x-1/2 md:static md:transform-none">
          <a href="/" class="flex items-center" aria-label="BZP Real Estate">
            <div class="flex items-center space-x-2">
            <img src="{{asset('asset/img/logo2.png')}}" alt="" class="w-36 h-8">
            </div>
          </a>
        </div>
        <div class="hidden md:flex items-center space-x-4">
          <div class="relative group">
            <button class="px-3 py-2 text-red-900 hover:bg-red-100/50 rounded-lg font-medium flex items-center">
              <i class="ri-apps-2-line mr-2"></i> Categories
              <i class="ri-arrow-down-s-line ml-1 transition-transform group-hover:rotate-180"></i>
            </button>
              @php
                  $propertyTypes = \App\Models\PropertyType::all();
              @endphp
            <div class="absolute left-0 mt-1 w-56 bg-white rounded-lg shadow-xl py-2 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200 border border-gray-100 z-50">
                @foreach($propertyTypes as $propertyType)
                    <a href="{{route('category-properties', $propertyType->id)}}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-50 flex items-center">
                        <i class="ri-home-3-line mr-3 text-red-500"></i> {{ucfirst($propertyType->title)}}
                    </a>
                @endforeach

            </div>
          </div>
          <a href="{{route('about')}}" class="px-3 py-2 text-red-900 hover:bg-red-100/50 rounded-lg font-medium flex items-center">
            <i class="ri-information-line mr-2"></i> About
          </a>
          <a href="{{route('contact')}}" class="px-4 py-2 bg-red-800 text-white rounded-lg text-sm font-semibold hover:bg-red-900 shadow-sm flex items-center">
            <i class="ri-phone-line mr-2"></i> Contact
          </a>
        </div>
      </div>

      <div id="mobile-menu" class="md:hidden hidden bg-white shadow-lg rounded-b-lg px-4 py-3 transform origin-top transition-all duration-300 ease-out">
        <a href="{{route('buy')}}" class="block px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-lg flex items-center">
          <i class="ri-home-4-line mr-3"></i> Buy
        </a>
        <a href="{{route('rent')}}" class="block px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-lg flex items-center">
          <i class="ri-community-line mr-3"></i> Rent
        </a>
        <div>
          <button id="mobile-category-btn" class="w-full text-left px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-lg font-medium flex items-center justify-between" aria-expanded="false">
            <div class="flex items-center">
              <i class="ri-apps-2-line mr-3"></i> Categories
            </div>
            <i id="mobile-category-arrow" class="ri-arrow-down-s-line transition-transform"></i>
          </button>
          <div id="mobile-category-menu" class="pl-12 mt-1 space-y-1 hidden">
              @foreach($propertyTypes as $propertyType)
                  <a href="{{route('category-properties', $propertyType->id)}}" class="block px-4 py-2 text-sm text-gray-600 hover:bg-gray-50 rounded-lg flex items-center">
                      <i class="ri-home-3-line mr-3 text-red-500"></i> {{ucfirst($propertyType->title)}}
                  </a>
              @endforeach

          </div>
        </div>
        <a href="{{route('about')}}" class="block px-4 py-3 text-gray-700 hover:bg-gray-50 rounded-lg flex items-center">
          <i class="ri-information-line mr-3"></i> About
        </a>
        <a href="{{route('contact')}}" class="block px-4 py-3 bg-red-800 text-white rounded-lg text-center font-medium hover:bg-red-900 flex items-center justify-center">
          <i class="ri-phone-line mr-3"></i> Contact Us
        </a>
      </div>
    </div>
  </nav>

  <script>
    document.addEventListener('DOMContentLoaded', () => {
      const mainNav = document.getElementById('mainNav');
      const menuToggle = document.getElementById('menu-toggle');
      const mobileMenu = document.getElementById('mobile-menu');
      const menuOpenIcon = document.getElementById('menu-open-icon');
      const menuCloseIcon = document.getElementById('menu-close-icon');
      const mobileCategoryBtn = document.getElementById('mobile-category-btn');
      const mobileCategoryMenu = document.getElementById('mobile-category-menu');
      const mobileCategoryArrow = document.getElementById('mobile-category-arrow');

      function updateHeader() {
        if (window.scrollY > 10) {
          mainNav.classList.remove('bg-gradient-to-r', 'from-sky-50', 'to-sky-50', 'bg-opacity-45');
          mainNav.classList.add('bg-white', 'shadow-md');
        } else {
          mainNav.classList.add('bg-gradient-to-r', 'from-sky-50', 'to-sky-50', 'bg-opacity-45');
          mainNav.classList.remove('bg-white', 'shadow-md');
        }
      }

      menuToggle.addEventListener('click', (e) => {
        e.stopPropagation();
        const isExpanded = menuToggle.getAttribute('aria-expanded') === 'true';
        menuToggle.setAttribute('aria-expanded', !isExpanded);
        mobileMenu.classList.toggle('hidden');
        menuOpenIcon.classList.toggle('hidden');
        menuCloseIcon.classList.toggle('hidden');
        if (isExpanded) {
          mobileCategoryMenu.classList.add('hidden');
          mobileCategoryArrow.classList.remove('rotate-180');
          mobileCategoryBtn.setAttribute('aria-expanded', 'false');
        }
      });

      mobileCategoryBtn.addEventListener('click', (e) => {
        e.stopPropagation();
        const expanded = mobileCategoryBtn.getAttribute('aria-expanded') === 'true';
        mobileCategoryBtn.setAttribute('aria-expanded', !expanded);
        mobileCategoryMenu.classList.toggle('hidden');
        mobileCategoryArrow.classList.toggle('rotate-180');
      });

      document.addEventListener('click', () => {
        mobileMenu.classList.add('hidden');
        menuOpenIcon.classList.remove('hidden');
        menuCloseIcon.classList.add('hidden');
        menuToggle.setAttribute('aria-expanded', 'false');
        mobileCategoryMenu.classList.add('hidden');
        mobileCategoryArrow.classList.remove('rotate-180');
        mobileCategoryBtn.setAttribute('aria-expanded', 'false');
      });

      mobileMenu.addEventListener('click', e => e.stopPropagation());
      mobileCategoryMenu.addEventListener('click', e => e.stopPropagation());

      updateHeader();
      window.addEventListener('scroll', updateHeader);
    });
  </script>
</body>
</html>
