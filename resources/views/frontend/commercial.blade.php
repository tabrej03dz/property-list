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
                <p class="text-white hover:underline"><a href="{{route('commercial')}}">Commercial</p></a>
            </div>
        </div>
    </div>



    <section class="max-w-9xl lg::mx-24 p-4 md:py-12 bg-gray-50">
        <!-- Title -->
        <div class="mb-12 text-center">
            <h1
                class="text-3xl md:text-5xl font-extrabold bg-gradient-to-r from-red-500 to-black text-transparent bg-clip-text">
                Property Exploration - Commercial
            </h1>
        </div>

        <!-- Grid Layout -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-12">
            <!-- Commercial Cards -->
            <!-- Repeat this block for each image -->
            <!-- You can put this inside a if using Laravel Blade -->
            <div class="relative group w-full h-[400px]  overflow-hidden shadow-xl transition duration-300 ease-in-out">
                <img src="https://cdn.pixabay.com/photo/2020/06/25/10/21/architecture-5339245_1280.jpg" alt="Luxury Commercial"
                    class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500 ease-in-out" />
                <!-- Initial label -->
                <div class="absolute inset-0 flex justify-center items-center text-white text-4xl font-semibold z-10">
                    Commercial
                </div>
                <!-- Hover overlay -->
                <div
                    class="absolute inset-0 bg-black opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity duration-500 z-20">
                    <div class="text-center px-4">
                        <h2 class="text-white text-5xl font-extrabold mb-2 tracking-wide">𝚁𝚅𝙶</h2>
                        <p class="text-gray-300 text-base md:text-lg">Dream Commercial</p>
                    </div>
                </div>
            </div>
            {{-- !-- Duplicate for other Commercials --> --}}
            <div class="relative group w-full h-[400px]  overflow-hidden shadow-xl transition duration-300 ease-in-out">
                <img src="https://cdn.pixabay.com/photo/2020/09/01/15/03/building-5535464_1280.jpg" alt="Luxury Commercial"
                    class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500 ease-in-out" />
                <div class="absolute inset-0 flex justify-center items-center text-white text-4xl font-semibold z-10">Commercial
                </div>
                <div
                    class="absolute inset-0 bg-black opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity duration-500 z-20">
                    <div class="text-center px-4">
                        <h2 class="text-white text-5xl font-extrabold mb-2 tracking-wide">𝚁𝚅𝙶</h2>
                        <p class="text-gray-300 text-base md:text-lg">Dream Commercial</p>
                    </div>
                </div>
            </div>
            <div class="relative group w-full h-[400px] overflow-hidden shadow-xl transition duration-300 ease-in-out">
                <img src="https://cdn.pixabay.com/photo/2016/11/18/17/20/living-room-1835923_1280.jpg" alt="Luxury Commercial"
                    class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500 ease-in-out" />
                <div class="absolute inset-0 flex justify-center items-center text-white text-4xl font-semibold z-10">Commercial
                </div>
                <div
                    class="absolute inset-0 bg-black opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity duration-500 z-20">
                    <div class="text-center px-4">
                        <h2 class="text-white text-5xl font-extrabold mb-2 tracking-wide">𝚁𝚅𝙶</h2>
                        <p class="text-gray-300 text-base md:text-lg">Dream Commercial</p>
                    </div>
                </div>
            </div>
            <div class="relative group w-full h-[400px]  overflow-hidden shadow-xl transition duration-300 ease-in-out">
                <img src="https://cdn.pixabay.com/photo/2018/01/26/08/15/dining-room-3108037_1280.jpg" alt="Luxury Commercial"
                    class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500 ease-in-out" />
                <div class="absolute inset-0 flex justify-center items-center text-white text-4xl font-semibold z-10">Commercial
                </div>
                <div
                    class="absolute inset-0 bg-black opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity duration-500 z-20">
                    <div class="text-center px-4">
                        <h2 class="text-white text-5xl font-extrabold mb-2 tracking-wide">𝚁𝚅𝙶</h2>
                        <p class="text-gray-300 text-base md:text-lg">Dream Commercial</p>
                    </div>
                </div>
            </div>
            <div class="relative group w-full h-[400px]  overflow-hidden shadow-xl transition duration-300 ease-in-out">
                <img src="https://cdn.pixabay.com/photo/2017/03/27/15/17/apartment-2179337_1280.jpg" alt="Luxury Commercial"
                    class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500 ease-in-out" />
                <div class="absolute inset-0 flex justify-center items-center text-white text-4xl font-semibold z-10">Commercial
                </div>
                <div
                    class="absolute inset-0 bg-black opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity duration-500 z-20">
                    <div class="text-center px-4">
                        <h2 class="text-white text-5xl font-extrabold mb-2 tracking-wide">𝚁𝚅𝙶</h2>
                        <p class="text-gray-300 text-base md:text-lg">Dream Commercial</p>
                    </div>
                </div>
            </div>
            <div class="relative group w-full h-[400px]  overflow-hidden shadow-xl transition duration-300 ease-in-out">
                <img src="https://cdn.pixabay.com/photo/2021/09/13/06/27/apartment-6620410_1280.jpg" alt="Luxury Commercial"
                    class="w-full h-full object-cover transform group-hover:scale-105 transition duration-500 ease-in-out" />
                <div class="absolute inset-0 flex justify-center items-center text-white text-4xl font-semibold z-10">Commercial
                </div>
                <div
                    class="absolute inset-0 bg-black opacity-0 group-hover:opacity-100 flex items-center justify-center transition-opacity duration-500 z-20">
                    <div class="text-center px-4">
                        <h2 class="text-white text-5xl font-extrabold mb-2 tracking-wide">𝚁𝚅𝙶</h2>
                        <p class="text-gray-300 text-base md:text-lg">Dream Commercial</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

{{-- let's connect form  --}}
@include('frontend.contact-form')
@endsection
