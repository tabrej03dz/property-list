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
            <p class="text-white hover:underline"><a href="{{route('term')}}">Term</p></a>
        </div>
    </div>
</div>

  <!-- Main Content -->
  <main class="max-w-4xl mx-auto p-6 mt-10">
    <h2 class="text-3xl font-bold text-[#449FC3] mb-4 border-b-4 border-black inline-block pb-1">Terms and Conditions</h2>
    <p class="text-lg text-gray-700 mb-6">
      These terms and conditions outline the rules and regulations for the use of Real Victory Estates's Website.
    </p>

    <!-- Section 1 -->
    <section class="mb-8">
      <h3 class="text-2xl font-semibold gold mb-2">1. Acceptance of Terms</h3>
      <p class="text-gray-800">
        By accessing this website, we assume you accept these terms and conditions in full. Do not continue to use
        Real Victory Estates's website if you do not accept all of the terms and conditions stated on this page.
      </p>
    </section>

    <!-- Section 2 -->
    <section class="mb-8">
      <h3 class="text-2xl font-semibold gold mb-2">2. License</h3>
      <p class="text-gray-800 mb-2">
        Unless otherwise stated, Real Victory Estates and/or its licensors own the intellectual property rights
        for all material on the website.
      </p>
      <ul class="list-disc pl-6 text-gray-700 space-y-2">
        <li>You must not republish material from our website.</li>
        <li>You must not sell, rent or sub-license material.</li>
        <li>You must not reproduce or copy material for commercial purposes.</li>
      </ul>
    </section>

    <!-- Section 3 -->
    <section class="mb-8">
      <h3 class="text-2xl font-semibold gold mb-2">3. User Comments</h3>
      <p class="text-gray-800 mb-2">
        Certain parts of this website offer the opportunity for users to post opinions and information.
      </p>
      <ul class="list-disc pl-6 text-gray-700 space-y-2">
        <li>Comments do not reflect the views of Real Victory Estates.</li>
        <li>We reserve the right to monitor and remove any comment that is inappropriate or offensive.</li>
      </ul>
    </section>

    <!-- Section 4 -->
    <section class="mb-8">
      <h3 class="text-2xl font-semibold gold mb-2">4. Property Listings</h3>
      <p class="text-gray-800">
        All property listings are provided for informational purposes only. Real Victory Estates does not guarantee
        the accuracy, completeness, or availability of any listings.
      </p>
    </section>

    <!-- Section 5 -->
    <section class="mb-8">
      <h3 class="text-2xl font-semibold gold mb-2">5. Limitation of Liability</h3>
      <p class="text-gray-800">
        Real Victory Estates shall not be liable for any damages arising from your use or inability to use the website,
        including any loss of data or profit.
      </p>
    </section>

    <!-- Section 6 -->
    <section class="mb-8">
      <h3 class="text-2xl font-semibold gold mb-2">6. Changes to Terms</h3>
      <p class="text-gray-800">
        We reserve the right to revise these terms at any time. By using this website you are expected to review
        these terms regularly.
      </p>
    </section>
  </main>


@endsection
