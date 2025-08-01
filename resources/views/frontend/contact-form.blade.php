<div class="relative w-full min-h-full">
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
</div>
