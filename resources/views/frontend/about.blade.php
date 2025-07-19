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
                <p class="text-white hover:underline"><a href="{{route('about')}}">About</p></a>
            </div>
        </div>
    </div>

    {{-- Search Form --}}
    <div class="relative z-10 max-w-7xl mx-auto px-4 md:px-8 md:-mt-12">
        <div class="bg-white rounded-xl shadow-lg px-6 py-8 md:py-10">
            <form class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                <!-- Search Input -->
                <input type="text" placeholder="Search"
                    class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" />

                <!-- Property Type -->
                <select
                    class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option disabled selected>Property Type</option>
                    <option>Villa</option>
                    <option>Apartment</option>
                    <option>Commercial</option>
                </select>

                <!-- Location -->
                <select
                    class="w-full px-4 py-3 bg-gray-100 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500">
                    <option disabled selected>Location</option>
                    <option>Location1</option>
                    <option>Chennai</option>
                    <option>Hyderabad</option>
                </select>

                <!-- Search Button -->
                <button type="submit"
                    class="w-full bg-blue-950 text-white font-semibold py-3 rounded-md hover:bg-blue-900 transition duration-200">
                    Search Here
                </button>
            </form>
        </div>
    </div>

    {{-- About Us --}}
    <section class="bg-white py-20 px-4 sm:px-6 lg:px-12">
        <div class="max-w-7xl mx-auto grid grid-cols-1 lg:grid-cols-2 gap-12 items-center">
            <!-- Image Section -->
            <div class="rounded-xl overflow-hidden shadow-md hover:shadow-xl transition duration-300">
                <img src="https://cdn.pixabay.com/photo/2023/03/27/23/09/house-7881834_1280.jpg" alt="About Us"
                    class="w-full h-[400px] md:h-[500px] object-cover" />
            </div>

            <!-- Text Section -->
            <div>
                <h2 class="text-4xl font-bold text-blue-950 mb-6 text-center lg:text-left">Who We Are</h2>
                <p class="text-gray-700 text-lg leading-relaxed text-center lg:text-left">
                    In today’s digital age, the real estate industry is rapidly evolving beyond traditional "word of mouth"
                    and local networks.
                    <strong class="text-blue-900">Realestate.Com</strong> stands as a reliable gateway for buyers, sellers,
                    and investors navigating the e-real estate world.
                    <br><br>
                    With a pulse on the latest market trends and a growing network of active users, our platform simplifies
                    property discovery and transactions nationwide.
                    Trusted by professionals and seekers alike, we’re redefining how property deals are made in the modern
                    era.
                </p>
            </div>
        </div>
    </section>

    <!-- Fonts (optional, for styling) -->

    <section class="bg-blue-50 py-16 font-[Raleway]">
        <div class="max-w-7xl mx-auto px-4">
            <h2 class="text-4xl font-bold text-center text-blue-950 mb-12">What Our Clients Say</h2>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-10">

                <!-- Testimonial Card 1 -->
                <div
                    class="bg-white rounded-xl shadow-md flex flex-col md:flex-row overflow-hidden transition hover:shadow-xl">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample10.jpg" alt="Client Image"
                        class="w-full md:w-1/3 object-cover">
                    <div class="p-6 flex flex-col justify-center relative">
                        <p class="text-sm text-gray-600 italic leading-relaxed mb-4 relative">
                            <span class="text-yellow-400 text-3xl absolute -left-3 -top-3">“</span>
                            Sometimes I think the surest sign that intelligent life exists elsewhere in the universe is that
                            none of it has tried to contact us.
                            <span class="text-yellow-400 text-3xl absolute -right-3 -bottom-3">”</span>
                        </p>
                        <div class="mt-2">
                            <h4 class="text-blue-950 font-bold text-sm uppercase">Pelican Steve</h4>
                            <span class="text-xs text-gray-400">LittleSnippets</span>
                        </div>
                    </div>
                </div>

                <!-- Testimonial Card 2 -->
                <div
                    class="bg-white rounded-xl shadow-md flex flex-col md:flex-row overflow-hidden transition hover:shadow-xl">
                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample33.jpg" alt="Client Image"
                        class="w-full md:w-1/3 object-cover">
                    <div class="p-6 flex flex-col justify-center relative">
                        <p class="text-sm text-gray-600 italic leading-relaxed mb-4 relative">
                            <span class="text-yellow-400 text-3xl absolute -left-3 -top-3">“</span>
                            I don't need to compromise on my principles, because they don't have the slightest bearing on
                            what happens to me anyway.
                            <span class="text-yellow-400 text-3xl absolute -right-3 -bottom-3">”</span>
                        </p>
                        <div class="mt-2">
                            <h4 class="text-blue-950 font-bold text-sm uppercase">Max Conversion</h4>
                            <span class="text-xs text-gray-400">LittleSnippets</span>
                        </div>
                    </div>
                </div>

                 <!-- Testimonial Card 1 -->
                 <div
                 class="bg-white rounded-xl shadow-md flex flex-col md:flex-row overflow-hidden transition hover:shadow-xl">
                 <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/331810/sq-sample10.jpg" alt="Client Image"
                     class="w-full md:w-1/3 object-cover">
                 <div class="p-6 flex flex-col justify-center relative">
                     <p class="text-sm text-gray-600 italic leading-relaxed mb-4 relative">
                         <span class="text-yellow-400 text-3xl absolute -left-3 -top-3">“</span>
                         Sometimes I think the surest sign that intelligent life exists elsewhere in the universe is that
                         none of it has tried to contact us.
                         <span class="text-yellow-400 text-3xl absolute -right-3 -bottom-3">”</span>
                     </p>
                     <div class="mt-2">
                         <h4 class="text-blue-950 font-bold text-sm uppercase">Pelican Steve</h4>
                         <span class="text-xs text-gray-400">LittleSnippets</span>
                     </div>
                 </div>
             </div>

            </div>
        </div>
    </section>




    {{-- Mission & Vision Placeholder --}}
    {{-- <section class="bg-gray-50 py-20">
        <div class="max-w-6xl mx-auto text-center">
            <h2 class="text-3xl font-bold text-blue-950 mb-6">Our Mission & Vision</h2>
            <p class="text-gray-600 text-lg max-w-3xl mx-auto leading-relaxed">
                Empower people to find their perfect property through innovation, transparency, and trust.
                We're committed to building a smarter, faster, and more connected real estate ecosystem.
            </p>

            <strong> Unleashing Possibilities:</strong>
            <p class="text-gray-600 text-lg max-w-3xl mx-auto leading-relaxed">We believe that real estate is not just about properties; it’s about the endless
                possibilities they offer. Our mission is to empower you to dream big, think creatively, and explore
                opportunities that redefine the way you live.</p>

                <strong>Elevating Experiences:</strong>
                <p class="text-gray-600 text-lg max-w-3xl mx-auto leading-relaxed"> Your home is more than just a place; it’s an experience. We strive to locate homes
                that enrich your life, offering comfort, joy, and a sense of belonging that transcends walls and embraces
                your soul.</p>

                <strong>Building Lasting Relationships:</strong>
                <p class="text-gray-600 text-lg max-w-3xl mx-auto leading-relaxed">  We are not just real estate agents; we are your trusted partners in your
                journey towards a new lifestyle. Our mission is to forge genuine connections with our clients, built on
                trust, transparency, and shared visions.</p>

                <strong>Empowering Decisions: </strong>
                <p class="text-gray-600 text-lg max-w-3xl mx-auto leading-relaxed">  Making real estate decisions can be overwhelming, but we are here to guide you every
                step of the way. Our mission is to empower you with knowledge, insights, and market expertise, enabling you
                to make informed choices.</p>

                <strong>Innovation and Creativity:</strong>
                <p class="text-gray-600 text-lg max-w-3xl mx-auto leading-relaxed"> We are pioneers in reimagining real estate. Our mission is to infuse innovation
                and creativity into every aspect of our services, from cutting-edge technology to imaginative marketing, to
                redefine the real estate experience.</p>

                <strong>Exceeding Expectations:</strong>
                <p class="text-gray-600 text-lg max-w-3xl mx-auto leading-relaxed"> At Manderley, we aim higher, reach farther, and exceed expectations. Our mission is
                to set new standards of excellence in the industry and deliver extraordinary results that leave a lasting
                impact.</p>

                <strong>Nurturing Communities:</strong>
                <p class="text-gray-600 text-lg max-w-3xl mx-auto leading-relaxed">Real estate is not just about individual properties; it’s about building thriving
                communities. Our mission is to contribute positively to the neighborhoods we serve, fostering a sense of
                community, belonging, and harmony.</p>

                <strong>Enabling Your Vision:</strong>
                <p class="text-gray-600 text-lg max-w-3xl mx-auto leading-relaxed"> Your lifestyle is unique, and so are your dreams. Our mission is to listen,
                understand, and bring to life your vision of an ideal home, locating spaces that reflect your personality
                and aspirations. We also understand the need for change are sensitive to all situations when selling a
                property.
            </p>
        </div>
    </section> --}}

    {{-- contact --}}
        {{-- let's connect form  --}}
    <div class="relative w-full min-h-full">
            <!-- Background Image -->
            <img src="{{ asset('asset/img/image1.jpg') }}" alt="Background"
                class="absolute inset-0 w-full h-full object-cover z-0" />

            <!-- Contact Form Overlay -->
            <div class="relative z-10 w-1/4/60 min-h-screen flex items-center justify-center px-4 py-12">
                <form
                    class="bg-white/10 backdrop-blur-md p-6 md:p-10 rounded-xl w-full max-w-6xl space-y-6 shadow-xl border border-white/20">

                    <!-- Heading -->
                    <h2 class="text-2xl md:text-3xl text-white font-bold text-center"> Contact Us</h2>

                    <!-- Form Fields -->
                    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
                        <!-- Name -->
                        <input type="text" placeholder="Your Name"
                            class="w-full px-4 py-3 bg-white/20 text-white placeholder-white/70 border border-white/30 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400" />

                        <!-- Email -->
                        <input type="email" placeholder="Your Email"
                            class="w-full px-4 py-3 bg-white/20 text-white placeholder-white/70 border border-white/30 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400" />

                        <!-- Message -->
                        <textarea rows="1" placeholder="Your Message"
                            class="w-full px-4 py-3 bg-white/20 text-white placeholder-white/70 border border-white/30 rounded-md focus:outline-none focus:ring-2 focus:ring-yellow-400 resize-none md:col-span-1 lg:col-span-1"></textarea>

                        <!-- Submit Button -->
                        <button type="submit"
                            class="w-full bg-yellow-400 text-blue-950 font-semibold py-3 rounded-md hover:bg-yellow-300 transition">
                            Send Message
                        </button>
                    </div>

                    <!-- Consent Note -->
                    <div class="flex items-start gap-3 pt-4">
                        <input type="checkbox" class="mt-1" />
                        <p class="text-white text-sm leading-snug">
                            By providing Brandon Piller your contact information, you acknowledge and agree to our Privacy
                            Policy and
                            consent to receiving marketing communications, including through automated calls, texts, and emails,
                            some of
                            which may use artificial or prerecorded voices. This consent isn’t necessary for purchasing any
                            products or
                            services and you may opt out at any time.
                        </p>
                    </div>
                </form>
            </div>
    </div>

@endsection
