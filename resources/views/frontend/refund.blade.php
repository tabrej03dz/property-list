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
            <p class="text-white hover:underline"><a href="{{route('refund')}}">Refund</p></a>
        </div>
    </div>
</div>


  <!-- Main Content -->
  <main class="max-w-4xl mx-auto p-6 mt-10">
    <h2 class="text-3xl font-bold text-[#449FC3] mb-4 border-b-4 border-black inline-block pb-1">Refund Policy</h2>
    <p class="text-lg text-gray-700 mb-6">
      At Real Victory Estates, we strive to provide high-quality services and ensure customer satisfaction. However, we understand there may be circumstances where refunds are required. Please read our refund policy carefully.
    </p>

    <!-- Section 1 -->
    <section class="mb-8">
      <h3 class="text-2xl font-semibold gold mb-2">1. Non-Refundable Services</h3>
      <p class="text-gray-800">
        All listing fees, promotional packages, and service subscriptions purchased on Real Victory Estates are non-refundable once the service has been activated or delivered.
      </p>
    </section>

    <!-- Section 2 -->
    <section class="mb-8">
      <h3 class="text-2xl font-semibold gold mb-2">2. Eligible Refund Cases</h3>
      <ul class="list-disc pl-6 text-gray-700 space-y-2">
        <li>Duplicate transactions due to system errors</li>
        <li>Payments made by mistake for services not rendered</li>
        <li>Failure to deliver services after payment due to technical issues</li>
      </ul>
    </section>

    <!-- Section 3 -->
    <section class="mb-8">
      <h3 class="text-2xl font-semibold gold mb-2">3. Refund Process</h3>
      <p class="text-gray-800">
        If you believe you are eligible for a refund, please contact our support team within 7 days of the transaction with the following:
      </p>
      <ul class="list-disc pl-6 text-gray-700 space-y-2">
        <li>Proof of payment (transaction ID, invoice)</li>
        <li>Reason for refund request</li>
        <li>Your contact details</li>
      </ul>
      <p class="text-gray-800 mt-2">
        Approved refunds will be processed within 7-10 business days to your original payment method.
      </p>
    </section>

    <!-- Section 4 -->
    <section class="mb-8">
      <h3 class="text-2xl font-semibold gold mb-2">4. Changes to the Refund Policy</h3>
      <p class="text-gray-800">
        Real Victory Estates reserves the right to modify or update this refund policy at any time. Changes will be posted on this page.
      </p>
    </section>

    <!-- Section 5 -->
    <section class="mb-8">
      <h3 class="text-2xl font-semibold gold mb-2">5. Contact Us</h3>
      <p class="text-gray-800">
        For refund inquiries, contact us at:<br>
        <strong>Email:</strong> refunds@realvictoryestates.com<br>
        <strong>Phone:</strong> +91-98765-43210
      </p>
    </section>
  </main>



@endsection
