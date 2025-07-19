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
            <p class="text-white hover:underline"><a href="{{route('privacy')}}">Privacy</p></a>
        </div>
    </div>
</div>

  <!-- Main Content -->
  <main class="max-w-4xl mx-auto p-6 mt-10">
    <h2 class="text-3xl font-bold text-blue-900 mb-4 border-b-4 border-yellow-400 inline-block pb-1">Privacy Policy</h2>
    <p class="text-lg text-gray-700 mb-6">
      At Real Victory Estates, we are committed to safeguarding your privacy and protecting your personal data.
    </p>

    <!-- Section 1 -->
    <section class="mb-8">
      <h3 class="text-2xl font-semibold gold mb-2">1. Information We Collect</h3>
      <p class="text-gray-800 mb-2">
        We may collect personal information such as your:
      </p>
      <ul class="list-disc pl-6 text-gray-700 space-y-2">
        <li>Name</li>
        <li>Email address</li>
        <li>Phone number</li>
        <li>Location and preferences</li>
      </ul>
    </section>

    <!-- Section 2 -->
    <section class="mb-8">
      <h3 class="text-2xl font-semibold gold mb-2">2. How We Use Your Information</h3>
      <p class="text-gray-800 mb-2">We use the information to:</p>
      <ul class="list-disc pl-6 text-gray-700 space-y-2">
        <li>Provide property listings and services</li>
        <li>Improve user experience on our site</li>
        <li>Send updates, newsletters, or promotions</li>
        <li>Comply with legal obligations</li>
      </ul>
    </section>

    <!-- Section 3 -->
    <section class="mb-8">
      <h3 class="text-2xl font-semibold gold mb-2">3. Data Sharing and Disclosure</h3>
      <p class="text-gray-800">
        We do not sell or trade your personal information. Data may be shared with trusted partners who help operate our
        website or conduct business, as long as they agree to keep this information confidential.
      </p>
    </section>

    <!-- Section 4 -->
    <section class="mb-8">
      <h3 class="text-2xl font-semibold gold mb-2">4. Cookies</h3>
      <p class="text-gray-800">
        We use cookies to enhance your experience, track usage, and analyze trends. You can choose to disable cookies through your browser settings.
      </p>
    </section>

    <!-- Section 5 -->
    <section class="mb-8">
      <h3 class="text-2xl font-semibold gold mb-2">5. Data Security</h3>
      <p class="text-gray-800">
        We implement a variety of security measures to maintain the safety of your personal information and protect it
        from unauthorized access.
      </p>
    </section>

    <!-- Section 6 -->
    <section class="mb-8">
      <h3 class="text-2xl font-semibold gold mb-2">6. Third-Party Links</h3>
      <p class="text-gray-800">
        Our website may contain links to third-party websites. We are not responsible for the content or privacy practices
        of such sites.
      </p>
    </section>

    <!-- Section 7 -->
    <section class="mb-8">
      <h3 class="text-2xl font-semibold gold mb-2">7. Changes to This Policy</h3>
      <p class="text-gray-800">
        We may update this privacy policy from time to time. Any changes will be posted on this page with an updated revision date.
      </p>
    </section>

    <!-- Section 8 -->
    <section class="mb-8">
      <h3 class="text-2xl font-semibold gold mb-2">8. Contact Us</h3>
      <p class="text-gray-800">
        If you have any questions about this privacy policy, you can contact us at:
        <br />
        <strong>Email:</strong> support@realvictoryestates.com
      </p>
    </section>
  </main>


@endsection
