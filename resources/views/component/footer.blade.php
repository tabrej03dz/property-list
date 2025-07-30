<footer class="bg-gradient-to-br from-[#459FC2] via-white to-[#459FC2] text-black px-4 py-8 sm:px-6 md:px-12 lg:px-20 xl:px-24 md:py-16">
    <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-5 gap-10">

      <!-- Company Overview -->
      <div>
        {{-- <h1 class="text-3xl sm:text-4xl font-extrabold text-yellow-400 mb-4 tracking-wide">RVG GROUP</h1>--}}
<img src="{{asset('asset/img/logo1.png')}}" alt="">
        <p class="text-black text-sm leading-relaxed">
          RVG Group is a full-service luxury real estate brokerage redefining the global real estate experience.
          With a world-class portfolio, innovative strategies, and unmatched client service, we elevate the art
          of buying, selling, and leasing luxury properties across the globe.
        </p>
      </div>

      <!-- Quick Links -->
      <div>
        <h2 class="text-xl sm:text-2xl font-semibold text-red-600 mb-4">Quick Links</h2>
        <ul class="space-y-2 text-sm text-black">
          <li><a href="/" class="hover:text-white transition">Home</a></li>
          <li><a href="{{route('about')}}" class="hover:text-white transition">About Us</a></li>
          <li><a href="{{route('blog')}}" class="hover:text-white transition">Luxury Listings</a></li>
          <li><a href="{{route('contact')}}" class="hover:text-white transition">Agents</a></li>
          <li><a href="{{route('blog')}}" class="hover:text-white transition">Blog</a></li>
          <li><a href="{{route('contact')}}" class="hover:text-white transition">Contact</a></li>
        </ul>
      </div>

      <!-- Legal -->
      <div>
        <h2 class="text-xl sm:text-2xl font-semibold text-red-600 mb-4">Legal</h2>
        <ul class="space-y-2 text-sm text-black">
          <li><a href="{{route('term')}}" class="hover:text-white transition">Terms & Conditions</a></li>
          <li><a href="{{route('privacy')}}" class="hover:text-white transition">Privacy Policy</a></li>
          <li><a href="{{route('refund')}}" class="hover:text-white transition">Refund Policy</a></li>
          <li><a href="{{route('disclaimer')}}" class="hover:text-white transition">Disclaimer</a></li>
        </ul>
      </div>

      <!-- Contact Info -->
      <div>
        <h2 class="text-xl sm:text-2xl font-semibold text-red-600 mb-4">Contact</h2>
        <ul class="text-sm text-black space-y-3">
          <li>
            <p class="font-medium text-black font-bold">Email</p>
            <a href="mailto:realvictorygroups.com" class="hover:text-white transition">RVGGROUP@THEAGENCYRE.COM</a>
          </li>
          <li>
            <p class="font-medium text-black font-bold">Phone</p>
            <p>+91 424 259-4765</p>
          </li>
          <li>
            <p class="font-medium text-black font-bold">Office Hours</p>
            <p>Mon - Sat: 9:00 AM - 6:00 PM</p>
          </li>
        </ul>
      </div>

      <!-- Address & CTA -->
      <div>
        <h2 class="text-xl sm:text-2xl font-semibold text-red-600 mb-4">Our Office</h2>
        <p class="text-black text-sm">331 Foothill Rd. Suite 100</p>
        <p class="text-black text-sm">Beverly Hills, CA 90210</p>
        <div class="mt-6">
          <a href="{{route('contact')}}"
            class="inline-block bg-red-600 text-gray-50 text-sm font-semibold px-6 py-2 rounded-full shadow hover:bg-red-800 transition">
            Get in Touch
          </a>
        </div>
      </div>
    </div>

    <!-- Social Icons -->
    <div class="mt-12 flex justify-center space-x-6">
      <a href="#" class="text-red-600 hover:text-black transition"><i class="ri-facebook-circle-fill text-xl"></i></a>
      <a href="#" class="text-red-600 hover:text-black transition"><i class="ri-instagram-line text-xl"></i></a>
      <a href="#" class="text-red-600 hover:text-black transition"><i class="ri-twitter-x-fill text-xl"></i></a>
      <a href="#" class="text-red-600 hover:text-black transition"><i class="ri-linkedin-box-fill text-xl"></i></a>
      <a href="#" class="text-red-600 hover:text-black transition"><i class="ri-youtube-fill text-xl"></i></a>
    </div>

    <!-- Footer Bottom -->
    <div class="border-t border-red-800 mt-10 pt-6 text-center text-sm text-black">
      <p class="mb-1">
        Website designed & developed by <span class="text-red-600 font-semibold hover:text-red-800 transition"><a href="https://realvictorygroups.com/">Real Victory Groups</a></span>
      </p>
      <p>
        © 2025 RVG Groups &middot; All rights reserved &middot;
        <a href="{{route('privacy')}}" class="underline hover:text-red-500">Privacy Policy</a>
      </p>
    </div>
  </footer>
