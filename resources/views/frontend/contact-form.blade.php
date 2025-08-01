{{-- <div class="relative w-full min-h-full">
    <!-- Background Image -->
    <img src="{{ asset('asset/img/image1.jpg') }}" alt="Background"
        class="absolute inset-0 w-full h-full object-cover z-0" />

    <!-- Contact Form Overlay -->
    <div class="relative z-10 w-1/4/60 h-auto lg:min-h-screen flex items-center justify-center px-4 lg:py-12">
        <form
            class="bg-white/10 backdrop-blur-md p-6 my-6 md:p-10 rounded-xl w-full max-w-6xl lg:space-y-6 shadow-xl border border-white/20">

            <!-- Heading -->
            <h2 class="text-2xl md:text-3xl text-white font-bold text-center"> Contact Us</h2>

            <!-- Form Fields -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 ">
                <!-- Name -->
                <input type="text" placeholder="Your Name"
                    class="w-full px-4 py-3 bg-white/20 text-white placeholder-white/70 border border-white/30 rounded-md focus:outline-none focus:ring-2 focus:ring-sky-400" />

                <!-- Email -->
                <input type="email" placeholder="Your Email"
                    class="w-full px-4 py-3 bg-white/20 text-white placeholder-white/70 border border-white/30 rounded-md focus:outline-none focus:ring-2 focus:ring-sky-400" />

                <!-- Message -->
                <textarea rows="1" placeholder="Your Message"
                    class="w-full px-4 py-3 bg-white/20 text-white placeholder-white/70 border border-white/30 rounded-md focus:outline-none focus:ring-2 focus:ring-sky-400 resize-none md:col-span-1 lg:col-span-1"></textarea>

                <!-- Submit Button -->
                <button type="submit"
                    class="w-full bg-black text-white hover:text-black font-semibold py-3 rounded-md hover:bg-white transition">
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
</div> --}}

<div class="relative w-full min-h-full">
    <!-- Background Image -->
    <img src="{{ asset('asset/img/image1.jpg') }}" alt="Background"
         class="absolute inset-0 w-full h-full object-cover z-0" />

    <!-- Contact Form Overlay -->
    <div class="relative z-10 w-1/4/60 min-h-screen flex items-center justify-center px-4 py-12">
        <form action="{{ route('contact.save') }}" method="POST"
              class="bg-white/10 backdrop-blur-md p-6 md:p-10 rounded-xl w-full max-w-6xl space-y-6 shadow-xl border border-white/20">
            @csrf

            <!-- Heading -->
            <h2 class="text-2xl md:text-3xl text-white font-bold text-center">Contact Us</h2>

            <!-- Form Fields -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
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
