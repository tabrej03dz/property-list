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
                <p class="text-white hover:underline"><a href="{{route('villa')}}">Villa</p></a>
            </div>
        </div>
    </div>

<<<<<<< HEAD
    <section class="max-w-9xl lg:mx-24 p-4 md:py-12 bg-gray-50">
=======
    <!-- Show All Validation Errors -->
    @if ($errors->any())
        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded-md">
            <ul class="list-disc list-inside text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <section class="max-w-9xl md:mx-24 p-4 md:py-12 bg-gray-50">
>>>>>>> cf58eee5af7ad868e1b1965ad0f4e942ec9ae57f
        <!-- Title -->
        <div class="mb-12 text-center">
            <h1
                class="text-3xl md:text-5xl font-extrabold bg-gradient-to-r from-yellow-500 to-yellow-700 text-transparent bg-clip-text">
                Property Exploration - Villa
            </h1>
        </div>

        <!-- Grid Layout -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Villa Cards -->
            <!-- Repeat this block for each image -->
            <!-- You can put this inside a if using Laravel Blade -->
            <div class="relative group w-full h-[400px]  overflow-hidden shadow-xl transition duration-300 ease-in-out">
                <img src="https://cdn.pixabay.com/photo/2020/06/25/10/21/architecture-5339245_1280.jpg" alt="Luxury Villa"
                    class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500 ease-in-out" />
                <!-- Initial label -->
                <div class="absolute inset-0 flex justify-center items-center text-white text-4xl font-semibold z-10">
                    Villa
                </div>
                <!-- Hover overlay -->
                <div
                    class="absolute inset-0 bg-black opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity duration-500 z-20">
                    <div class="text-center px-4">
                        <h2 class="text-white text-5xl font-extrabold mb-2 tracking-wide">𝚁𝚅𝙶</h2>
                        <p class="text-gray-300 text-base md:text-lg">Dream Villa</p>
                    </div>
                </div>
            </div>
            {{-- !-- Duplicate for other villas --> --}}
            <div class="relative group w-full h-[400px]  overflow-hidden shadow-xl transition duration-300 ease-in-out">
                <img src="https://cdn.pixabay.com/photo/2020/09/01/15/03/building-5535464_1280.jpg" alt="Luxury Villa"
                    class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500 ease-in-out" />
                <div class="absolute inset-0 flex justify-center items-center text-white text-4xl font-semibold z-10">Villa
                </div>
                <div
                    class="absolute inset-0 bg-black opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity duration-500 z-20">
                    <div class="text-center px-4">
                        <h2 class="text-white text-5xl font-extrabold mb-2 tracking-wide">𝚁𝚅𝙶</h2>
                        <p class="text-gray-300 text-base md:text-lg">Dream Villa</p>
                    </div>
                </div>
            </div>
            <div class="relative group w-full h-[400px] overflow-hidden shadow-xl transition duration-300 ease-in-out">
                <img src="https://cdn.pixabay.com/photo/2016/11/18/17/20/living-room-1835923_1280.jpg" alt="Luxury Villa"
                    class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500 ease-in-out" />
                <div class="absolute inset-0 flex justify-center items-center text-white text-4xl font-semibold z-10">Villa
                </div>
                <div
                    class="absolute inset-0 bg-black opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity duration-500 z-20">
                    <div class="text-center px-4">
                        <h2 class="text-white text-5xl font-extrabold mb-2 tracking-wide">𝚁𝚅𝙶</h2>
                        <p class="text-gray-300 text-base md:text-lg">Dream Villa</p>
                    </div>
                </div>
            </div>
            <div class="relative group w-full h-[400px]  overflow-hidden shadow-xl transition duration-300 ease-in-out">
                <img src="https://cdn.pixabay.com/photo/2018/01/26/08/15/dining-room-3108037_1280.jpg" alt="Luxury Villa"
                    class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500 ease-in-out" />
                <div class="absolute inset-0 flex justify-center items-center text-white text-4xl font-semibold z-10">Villa
                </div>
                <div
                    class="absolute inset-0 bg-black opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity duration-500 z-20">
                    <div class="text-center px-4">
                        <h2 class="text-white text-5xl font-extrabold mb-2 tracking-wide">𝚁𝚅𝙶</h2>
                        <p class="text-gray-300 text-base md:text-lg">Dream Villa</p>
                    </div>
                </div>
            </div>
            <div class="relative group w-full h-[400px]  overflow-hidden shadow-xl transition duration-300 ease-in-out">
                <img src="https://cdn.pixabay.com/photo/2017/03/27/15/17/apartment-2179337_1280.jpg" alt="Luxury Villa"
                    class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500 ease-in-out" />
                <div class="absolute inset-0 flex justify-center items-center text-white text-4xl font-semibold z-10">Villa
                </div>
                <div
                    class="absolute inset-0 bg-black opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity duration-500 z-20">
                    <div class="text-center px-4">
                        <h2 class="text-white text-5xl font-extrabold mb-2 tracking-wide">𝚁𝚅𝙶</h2>
                        <p class="text-gray-300 text-base md:text-lg">Dream Villa</p>
                    </div>
                </div>
            </div>
            <div class="relative group w-full h-[400px]  overflow-hidden shadow-xl transition duration-300 ease-in-out">
                <img src="https://cdn.pixabay.com/photo/2021/09/13/06/27/apartment-6620410_1280.jpg" alt="Luxury Villa"
                    class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500 ease-in-out" />
                <div class="absolute inset-0 flex justify-center items-center text-white text-4xl font-semibold z-10">Villa
                </div>
                <div
                    class="absolute inset-0 bg-black opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity duration-500 z-20">
                    <div class="text-center px-4">
                        <h2 class="text-white text-5xl font-extrabold mb-2 tracking-wide">𝚁𝚅𝙶</h2>
                        <p class="text-gray-300 text-base md:text-lg">Dream Villa</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

{{-- let's connect form  --}}
<div class="relative w-full min-h-full">
    <!-- Background Image -->
    <img src="{{ asset('asset/img/image1.jpg') }}" alt="Background"
        class="absolute inset-0 w-full h-full object-cover z-0" />

    <!-- Contact Form Overlay -->
<<<<<<< HEAD
    <div class="relative z-10 w-1/4/60 h-auto lg:min-h-screen flex items-center justify-center px-4 py-12">
        <form
            class="bg-white/10 backdrop-blur-md p-6 my-6 md:p-10 rounded-xl w-full max-w-6xl space-y-6 shadow-xl border border-white/20">
=======
    <div class="relative z-10 w-1/4/60 min-h-screen flex items-center justify-center px-4 py-12">
        <form action="{{ route('contact.save') }}" method="POST"
              class="bg-white/10 backdrop-blur-md p-6 md:p-10 rounded-xl w-full max-w-6xl space-y-6 shadow-xl border border-white/20">
            @csrf
>>>>>>> cf58eee5af7ad868e1b1965ad0f4e942ec9ae57f

            <!-- Heading -->
            <h2 class="text-2xl md:text-3xl text-white font-bold text-center">Contact Us</h2>

            <!-- Form Fields -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 ">
                <!-- Name -->
                <div class="col-span-1">
                    <input type="text" name="name" placeholder="Your Name" value="{{ old('name') }}"
                           class="w-full px-4 py-3 bg-white/20 text-white placeholder-white/70 border border-white/30 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400" />
                    @error('name')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Email -->
                <div class="col-span-1">
                    <input type="email" name="email" placeholder="Your Email" value="{{ old('email') }}"
                           class="w-full px-4 py-3 bg-white/20 text-white placeholder-white/70 border border-white/30 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400" />
                    @error('email')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Phone (optional, uncomment if needed) -->
                {{--
                <div class="col-span-1">
                    <input type="number" name="phone" placeholder="Your Phone" value="{{ old('phone') }}"
                        class="w-full px-4 py-3 bg-white/20 text-white placeholder-white/70 border border-white/30 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400" />
                    @error('phone')
                        <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>
                --}}

                <!-- Message -->
                <div class="col-span-1 lg:col-span-1">
            <textarea name="message" rows="1" placeholder="Your Message"
                      class="w-full px-4 py-3 bg-white/20 text-white placeholder-white/70 border border-white/30 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400 resize-none">{{ old('message') }}</textarea>
                    @error('message')
                    <p class="text-red-400 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Submit Button -->
                <div class="col-span-1">
                    <button type="submit"
                            class="w-full bg-yellow-400 text-blue-950 font-semibold py-3 rounded-md hover:bg-yellow-300 transition">
                        Send Message
                    </button>
                </div>
            </div>

            <!-- Consent Note -->
            <div class="flex items-start gap-3 pt-4">
                <input type="checkbox" class="mt-1" />
                <p class="text-white text-sm leading-snug">
                    By providing Brandon Piller your contact information, you acknowledge and agree to our Privacy Policy and
                    consent to receiving marketing communications...
                </p>
            </div>
        </form>

    </div>
</div>
@endsection
