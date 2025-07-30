@extends('component.main')
@section('content')

 {{-- Banner --}}
 <div class="w-full h-[300px] md:h-[400px] relative">
    <img src="{{ asset('asset/img/banner.jpg') }}" alt="Property Banner" class="w-full h-full object-cover">
    <div class="absolute inset-0 top-0 left-0 right-0 bg-black/50 items-center text-center pt-32">
        <h1 class="text-white text-3xl md:text-5xl font-extrabold tracking-wide drop-shadow-lg">
            Find Your Dream Property
            </h1>
        <div class="flex justify-center space-x-2 py-2">
            <p class="text-white hover:underline"> <a href="/">Home</p></a>
            <p class="text-white">/</p>
            <p class="text-white hover:underline"><a href="{{route('disclaimer')}}">Disclaimer</p></a>
        </div>
    </div>
</div>


  <!-- Main Content -->
  <main class="max-w-4xl mx-auto p-6 mt-10">
    <h2 class="text-3xl font-bold text-[#449FC3] mb-4 border-b-4 border-black inline-block pb-1">Disclaimer</h2>
    <p class="text-lg text-gray-700 mb-6">
      The information provided by Real Victory Estates (“we,” “us” or “our”) on this website is for general informational purposes only.
    </p>

    <!-- Section 1 -->
    <section class="mb-8">
      <h3 class="text-2xl font-semibold gold mb-2">1. No Professional Advice</h3>
      <p class="text-gray-800">
        The content on this website is not intended to constitute legal, financial, real estate, or other professional advice. You should consult with a licensed professional before making any decisions based on information from our site.
      </p>
    </section>

    <!-- Section 2 -->
    <section class="mb-8">
      <h3 class="text-2xl font-semibold gold mb-2">2. Accuracy of Information</h3>
      <p class="text-gray-800">
        While we strive to ensure the information on our site is accurate and up to date, we do not guarantee that all details — including pricing, availability, and property features — are error-free or current.
      </p>
    </section>

    <!-- Section 3 -->
    <section class="mb-8">
      <h3 class="text-2xl font-semibold gold mb-2">3. Third-Party Links</h3>
      <p class="text-gray-800">
        Our website may contain links to third-party websites or services that are not owned or controlled by us. We are not responsible for the content, privacy policies, or practices of any third-party site or service.
      </p>
    </section>

    <!-- Section 4 -->
    <section class="mb-8">
      <h3 class="text-2xl font-semibold gold mb-2">4. Limitation of Liability</h3>
      <p class="text-gray-800">
        In no event shall Real Victory Estates be liable for any direct, indirect, incidental, or consequential damages arising from the use or inability to use the materials on our website.
      </p>
    </section>

    <!-- Section 5 -->
    <section class="mb-8">
      <h3 class="text-2xl font-semibold gold mb-2">5. Changes to This Disclaimer</h3>
      <p class="text-gray-800">
        We reserve the right to update or change this disclaimer at any time without notice. Continued use of our site following the posting of changes constitutes your acceptance of those changes.
      </p>
    </section>

    <!-- Section 6 -->
    <section class="mb-8">
      <h3 class="text-2xl font-semibold gold mb-2">6. Contact Information</h3>
      <p class="text-gray-800">
        If you have any questions regarding this disclaimer, you may contact us at:<br>
        <strong>Email:</strong> legal@realvictoryestates.com<br>
        <strong>Phone:</strong> +91-98765-43210
      </p>
    </section>
  </main>



@endsection
