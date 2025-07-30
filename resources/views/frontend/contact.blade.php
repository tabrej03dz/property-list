@extends('component.main')
@section('content')
    {{-- Hero Banner --}}
    <div class="w-full h-[300px] md:h-[400px] relative">
        <img src="{{ asset('asset/img/image1.jpg') }}" alt="Property Banner" class="w-full h-full object-cover">
        <div class="absolute inset-0 bg-black/60 flex flex-col justify-center items-center text-center px-4">
            <h1 class="text-white text-4xl md:text-5xl font-extrabold drop-shadow-xl">Find Your Dream Property</h1>
            <div class="flex gap-2 pt-4 text-white text-sm md:text-base">
                <a href="/" class="hover:underline">Home</a>
                <span>/</span>
                <a href="{{ route('contact') }}" class="hover:underline">Contact Us</a>
            </div>
        </div>
    </div>

    {{-- Search Form --}}
    <div class="relative z-10 max-w-7xl mx-auto px-4 md:px-8 md:-mt-12">
        <div class="bg-white rounded-xl shadow-lg px-6 py-8 md:py-10">
            <form class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 animate-fade-in">
                <input type="text" placeholder="Search"
                    class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />

                <select
                    class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option disabled selected>Property Type</option>
                    <option>Villa</option>
                    <option>Apartment</option>
                    <option>Commercial</option>
                </select>

                <select
                    class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option disabled selected>Location</option>
                    <option>Chennai</option>
                    <option>Hyderabad</option>
                    <option>Bangalore</option>
                </select>

                <button type="submit"
                    class="w-full bg-[#449FC3] text-white font-semibold py-3 rounded-md hover:bg-sky-900 transition duration-200">
                    🔍 Search Here
                </button>
            </form>
        </div>
    </div>

    {{-- Contact CTA --}}

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 px-4 md:px-12 py-12 bg-blue-50">
        {{-- Contact Form with Background --}}
         {{-- Google Map --}}

         <div class="relative w-full h-full rounded-xl overflow-hidden shadow-lg">
            <!-- Background -->
            <img src="{{ asset('asset/img/image1.jpg') }}" alt="Contact Background"
                 class="absolute inset-0 w-full h-full object-cover brightness-75" />

            <!-- Overlay Content -->
            <div class="relative z-10 w-full h-full flex items-center justify-center p-6 md:p-10">
                <div class="w-full h-[480px] rounded-xl overflow-hidden shadow-lg">
                    <iframe class="w-full h-full"
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3570.7953955523994!2d80.2796977!3d26.4945319!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x399c3826d4ebf859%3A0xe9e2ed37cc371552!2sReal%20Victory%20Groups!5e0!3m2!1sen!2sin!4v1752661872773!5m2!1sen!2sin"
                        style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
                    </iframe>
                </div>
            </div>
        </div>

        <div class="relative w-full h-full rounded-xl overflow-hidden shadow-lg">
            <!-- Background -->
            <img src="{{ asset('asset/img/image1.jpg') }}" alt="Contact Background"
                 class="absolute inset-0 w-full h-full object-cover brightness-75" />

            <!-- Overlay Content -->
            <div class="relative z-10 w-full h-full flex items-center justify-center p-6 md:p-10">
                <form class="bg-white/10 backdrop-blur-md w-full max-w-3xl rounded-xl p-6 md:p-10 space-y-6 border border-white/20 text-white">
                    <!-- Title -->
                    <h2 class="text-3xl md:text-4xl font-extrabold text-center text-white">Get in Touch</h2>

                    <!-- Fields -->
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Name -->
                        <input type="text" placeholder="Your Name"
                            class="w-full px-4 py-3 bg-white/20 text-white placeholder-white/70 border border-white/30 rounded-md focus:outline-none focus:ring-2 focus:ring-sky-400" />

                        <!-- Email -->
                        <input type="email" placeholder="Your Email"
                            class="w-full px-4 py-3 bg-white/20 text-white placeholder-white/70 border border-white/30 rounded-md focus:outline-none focus:ring-2 focus:ring-sky-400" />
                    </div>

                    <!-- Message -->
                    <textarea rows="4" placeholder="Your Message"
                        class="w-full px-4 py-3 bg-white/20 text-white placeholder-white/70 border border-white/30 rounded-md focus:outline-none focus:ring-2 focus:ring-sky-400 resize-none"></textarea>

                    <!-- Consent -->
                    <div class="flex items-start gap-3">
                        <input type="checkbox" class="mt-1 text-sky-400 focus:ring-sky-400" />
                        <p class="text-sm text-white leading-snug">
                            By submitting this form, you agree to our Privacy Policy and consent to receive communication, which may include automated emails, texts, or calls. You can opt out at any time.
                        </p>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit"
                            class="px-8 py-3 bg-[#449FC3] hover:bg-sky-600 text-white font-bold rounded-md transition duration-300 shadow-md">
                            Send Message
                        </button>
                    </div>
                </form>
            </div>
        </div>


    </div>

@endsection
