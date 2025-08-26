@extends('component.main')
@section('content')
    <!-- Property Header -->
    <header class="relative">
        <div class="h-96 bg-cover bg-center"
            style="background-image: url('https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&auto=format&fit=crop&w=2070&q=80');">
            <div class="absolute inset-0 bg-black/50"></div>
            <div class="container mx-auto px-4 h-full flex items-end pb-6 relative">
                <div>
                    <h1 class="text-3xl md:text-5xl font-bold text-white">{{$property->title}}</h1>
                    <p class="text-lg text-white mt-1 flex items-center">
                        <i class="fas fa-map-marker-alt mr-2"></i>{{$property->address}}
                    </p>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8 ">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Left Column (Details) -->
            <div class="lg:w-2/3">
                <!-- Price & Quick Facts -->
                <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-4">
                        <h2 class="text-3xl font-bold text-gray-800">{{number_format($property->price)}}</h2>
                        <div class="flex space-x-4 mt-2 md:mt-0">
                            <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm font-medium">
                                <i class="fas fa-bed mr-1"></i> {{$property->bedrooms}} Bedrooms
                            </span>
                            <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm font-medium">
                                <i class="fas fa-bath mr-1"></i> {{$property->bathrooms}} Baths
                            </span>
                            <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded-full text-sm font-medium">
                                <i class="fas fa-ruler-combined mr-1"></i> {{$property->area}} sqft
                            </span>
                        </div>
                    </div>
                    <div class="border-t border-b border-gray-200 py-4 my-4">
                        <div class="grid grid-cols-2 md:grid-cols-4 gap-4 text-center">
{{--                            <div>--}}
{{--                                <p class="text-gray-500 text-sm">Type</p>--}}
{{--                                <p class="font-medium">Single-Family</p>--}}
{{--                            </div>--}}
                            <div>
                                <p class="text-gray-500 text-sm">Built In</p>
                                <p class="font-medium">{{$property->built_in}}</p>
                            </div>
                            <div>
                                <p class="text-gray-500 text-sm">Garage</p>
                                <p class="font-medium">0 Cars</p>
                            </div>
                            <div>
                                <p class="text-gray-500 text-sm">Lot Size</p>
                                <p class="font-medium">{{$property->area}} Acres</p>
                            </div>
                        </div>
                    </div>
                    <button
                        class="w-full bg-yellow-600 hover:bg-yellow-700 text-white py-3 rounded-lg font-medium transition duration-300">
                        <i class="fas fa-calendar-alt mr-2"></i> Schedule a Tour
                    </button>
                </div>

                <!-- Description -->
                <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Property Description</h3>
                    <p class="text-gray-700 mb-4">
                        {{$property->description}}
                    </p>
{{--                    <p class="text-gray-700">--}}
{{--                        The property features a gourmet chef's kitchen, infinity pool with spa, smart home automation, and a--}}
{{--                        private home theater. Perfect for luxury living and entertaining.--}}
{{--                    </p>--}}
                </div>

                <!-- Features -->
                <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Features</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        @foreach($property->amenities as $amenity)
                            <div class="flex items-start">
                                <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>
                                <span class="text-gray-700">{{$amenity->name}}</span>
                            </div>
                        @endforeach
{{--                        <div class="flex items-start">--}}
{{--                            <i class="fas fa-check-circle text-green-500 mt-1 mr-2"></i>--}}
{{--                            <span class="text-gray-700">Smart Home Technology</span>--}}
{{--                        </div>--}}

                    </div>
                </div>

                <!-- Gallery (Placeholder) -->
                <div class="bg-white rounded-lg shadow-md p-6 mb-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Gallery</h3>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4">
                        @foreach($property->images as $image)
                            <div class="h-40 bg-gray-200 rounded-lg overflow-hidden">
                                <img src="{{asset('storage/'. $image->url)}}"
                                     alt="Living Room" class="w-full h-full object-cover">
                            </div>
                        @endforeach
{{--                        <div class="h-40 bg-gray-200 rounded-lg overflow-hidden">--}}
{{--                            <img src="https://images.unsplash.com/photo-1605276374104-dee2a0ed3cd6?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=2070&q=80"--}}
{{--                                alt="Kitchen" class="w-full h-full object-cover">--}}
{{--                        </div>--}}
{{--                        --}}
                    </div>
                    <!-- View More Button -->
                    <div class="flex justify-center py-4 w-full">
                        <button id="openGalleryBtn"
                            class="bg-yellow-600 w-full text-white px-6 py-3 text-lg font-semibold rounded hover:bg-yellow-700 transition duration-300">
                            View all
                        </button>
                    </div>
                </div>

                {{-- pop up --}}




                <!-- Popup Modal -->
                {{-- <!-- Trigger Button -->
<div class="flex justify-center py-10">
    <button id="openGalleryBtn" class="bg-yellow-600 text-white px-6 py-3 text-lg font-semibold rounded hover:bg-yellow-700 transition duration-300">
      View Gallery
    </button>
  </div> --}}

                <!-- Popup Gallery -->
                <div id="propertyPopup"
                    class="fixed inset-0 z-50 hidden bg-black/80 backdrop-blur-sm flex items-center justify-center">
                    <div
                        class="relative rounded-xl  max-w-6xl w-full h-[70vh] p-4 flex flex-col items-center justify-center">

                        <!-- Close Button -->
                        <button id="closeGalleryBtn"
                            class="absolute top-2 right-4 text-3xl text-gray-100 hover:text-red-600 bg-black rounded-full p-1 transition z-10">&times;</button>

                        <!-- Slider Wrapper -->
                        <div class="relative w-full overflow-hidden">
                            <div id="propertySlider" class="flex transition-transform ease-in-out duration-500 space-x-4">
                                <!-- Slide 1 -->
                                <div class="min-w-full flex justify-center items-center">
                                    <img src="https://cdn.pixabay.com/photo/2017/03/30/00/24/villa-2186912_1280.jpg"
                                        class="w-[600px] h-[600px] object-cover rounded-lg shadow-md" alt="Slide 1" />
                                </div>
                                <!-- Slide 2 -->
                                <div class="min-w-full flex justify-center items-center">
                                    <img src="https://cdn.pixabay.com/photo/2022/07/05/14/59/living-room-7303275_1280.jpg"
                                        class="w-[600px] h-[600px] object-cover rounded-lg shadow-md" alt="Slide 2" />
                                </div>
                                <!-- Slide 3 -->
                                <div class="min-w-full flex justify-center items-center">
                                    <img src="https://cdn.pixabay.com/photo/2022/07/05/14/58/living-room-7303274_1280.jpg"
                                        class="w-[600px] h-[600px] object-cover rounded-lg shadow-md" alt="Slide 3" />
                                </div>
                            </div>

                            <!-- Navigation Buttons -->
                            <button id="prevBtn"
                                class="absolute top-1/2 left-4 transform -translate-y-1/2 bg-white text-gray-800 border shadow-md rounded-full p-3 hover:bg-gray-200 transition z-10">
                                <i class="ri-arrow-left-s-line text-2xl"></i>
                            </button>
                            <button id="nextBtn"
                                class="absolute top-1/2 right-4 transform -translate-y-1/2 bg-white text-gray-800 border shadow-md rounded-full p-3 hover:bg-gray-200 transition z-10">
                                <i class="ri-arrow-right-s-line text-2xl"></i>
                            </button>
                        </div>
                    </div>
                </div>


                <script>
                    document.addEventListener("DOMContentLoaded", () => {
                        const openBtn = document.getElementById("openGalleryBtn");
                        const popup = document.getElementById("propertyPopup");

                        const closeBtn = () => document.getElementById("closeGalleryBtn");
                        const slider = document.getElementById("propertySlider");
                        const nextBtn = document.getElementById("nextBtn");
                        const prevBtn = document.getElementById("prevBtn");

                        let index = 1;
                        let slideWidth = 0;

                        const slides = [...slider.children];
                        const firstClone = slides[0].cloneNode(true);
                        const lastClone = slides[slides.length - 1].cloneNode(true);
                        firstClone.setAttribute("data-clone", "first");
                        lastClone.setAttribute("data-clone", "last");

                        slider.appendChild(firstClone);
                        slider.insertBefore(lastClone, slider.firstChild);

                        const updateSlideWidth = () => {
                            slideWidth = slides[0].offsetWidth + 16;
                            slider.style.transition = "none";
                            slider.style.transform = `translateX(-${slideWidth * index}px)`;
                        };

                        const moveToSlide = (newIndex) => {
                            slider.style.transition = "transform 0.5s ease-in-out";
                            slider.style.transform = `translateX(-${slideWidth * newIndex}px)`;
                            index = newIndex;
                        };

                        nextBtn.addEventListener("click", () => {
                            if (index >= slider.children.length - 1) return;
                            moveToSlide(index + 1);
                        });

                        prevBtn.addEventListener("click", () => {
                            if (index <= 0) return;
                            moveToSlide(index - 1);
                        });

                        slider.addEventListener("transitionend", () => {
                            const current = slider.children[index];
                            if (current.getAttribute("data-clone") === "last") {
                                slider.style.transition = "none";
                                index = slides.length;
                                slider.style.transform = `translateX(-${slideWidth * index}px)`;
                            }
                            if (current.getAttribute("data-clone") === "first") {
                                slider.style.transition = "none";
                                index = 1;
                                slider.style.transform = `translateX(-${slideWidth * index}px)`;
                            }
                        });

                        // Open popup
                        openBtn?.addEventListener("click", () => {
                            popup.classList.remove("hidden");

                            // Wait for DOM to update
                            setTimeout(() => {
                                updateSlideWidth();

                                // Attach close button listener only when popup is open and button exists
                                const closeButton = closeBtn();
                                closeButton?.addEventListener("click", () => {
                                    popup.classList.add("hidden");
                                });
                            }, 100);
                        });

                        window.addEventListener("resize", updateSlideWidth);

                        setTimeout(updateSlideWidth, 200);
                    });
                </script>

                {{-- pop up end --}}

                {{-- scroll slider --}}
                <div
                    class="w-full mx-auto bg-gradient-to-br from-white to-yellow-50 p-8 border border-blue-100 transform hover:scale-[1.01] transition-transform duration-300">

                    <!-- Header -->
                    <div class="relative mb-8">
                        <div class="absolute -top-4 -left-4 w-16 h-16 bg-blue-100 rounded-full opacity-30"></div>
                        <div class="absolute -bottom-4 -right-4 w-20 h-20 bg-blue-200 rounded-full opacity-20"></div>
                        <h2 class="relative text-3xl font-bold text-center text-blue-800 z-10">
                            <span
                                class="inline-block bg-clip-text text-transparent bg-gradient-to-r from-yellow-600 to-yellow-400">
                                🏡 Calculator
                            </span>
                        </h2>
                    </div>

                    <!-- Progress Bar -->
                    <div class="relative mb-10">
                        <div class="h-3 w-full bg-gray-200 rounded-full overflow-hidden">
                            <div id="sliderProgressBar"
                                class="h-full w-[1%] bg-gradient-to-r from-yellow-400 to-yellow-600 transition-all duration-500 ease-out">
                            </div>
                        </div>
                        <div class="flex justify-between text-xs text-gray-500 mt-1 px-1">
                            <span>1%</span>
                            <span>25%</span>
                            <span>50%</span>
                        </div>
                    </div>

                    <!-- Calculator Sections -->
                    <div class="space-y-6">

                        <!-- Home Price -->
                        <div
                            class="bg-white/80 backdrop-blur-sm p-5 rounded-xl border border-blue-100 shadow-sm hover:shadow-md transition-shadow">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-800">Home Price</h3>
                                    <p class="text-sm text-gray-500">Total value of the property</p>
                                </div>
                                <div
                                    class="text-2xl font-bold bg-clip-text text-transparent bg-gradient-to-r from-yellow-600 to-yellow-400">
                                    $1,100,000
                                </div>
                            </div>
                        </div>

                        <!-- Down Payment -->
                        <div
                            class="bg-white/80 backdrop-blur-sm p-5 rounded-xl border border-blue-100 shadow-sm hover:shadow-md transition-shadow">
                            <div class="mb-4">
                                <h3 class="text-lg font-semibold text-gray-800 mb-1">Down Payment</h3>
                                <div class="flex justify-between text-sm text-gray-500">
                                    <span>Percentage</span>
                                    <span>Amount</span>
                                </div>
                                <div class="flex justify-between items-center mb-2">
                                    <span id="downPaymentPercent" class="text-xl font-bold text-yellow-600">1%</span>
                                    <span id="downPaymentAmount" class="text-xl font-bold text-yellow-600">$11,000</span>
                                </div>
                            </div>
                            <input type="range" min="1" max="50" value="1" id="downPaymentSlider"
                                class="w-full h-3 bg-gradient-to-r from-yellow-100 to-yellow-300 rounded-full appearance-none cursor-pointer transition-all duration-300 [&::-webkit-slider-thumb]:appearance-none [&::-webkit-slider-thumb]:h-5 [&::-webkit-slider-thumb]:w-5 [&::-webkit-slider-thumb]:rounded-full [&::-webkit-slider-thumb]:bg-gradient-to-r [&::-webkit-slider-thumb]:from-yellow-500 [&::-webkit-slider-thumb]:to-yellow-700 [&::-webkit-slider-thumb]:shadow-lg" />
                            <div class="flex justify-between mt-1 text-xs text-gray-500">
                                <span>Minimum (1%)</span>
                                <span>Recommended (20%)</span>
                                <span>Maximum (50%)</span>
                            </div>
                        </div>

                        <!-- Monthly Payment -->
                        <div
                            class="bg-white/80 backdrop-blur-sm p-5 rounded-xl border border-yellow-100 shadow-sm hover:shadow-md transition-shadow">
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-lg font-semibold text-gray-800">Estimated Monthly Payment</h3>
                                    <p class="text-sm text-gray-500">Principal & Interest</p>
                                </div>
                                <div class="text-right">
                                    <div id="monthlyPayment" class="text-2xl font-bold text-green-600">$0.00</div>
                                    <div class="text-xs text-gray-500">7% interest, 30 years</div>
                                </div>
                            </div>

                            <!-- Loan Breakdown -->
                            <div class="mt-4 grid grid-cols-3 gap-2 text-center">
                                <div class="bg-yellow-50 p-2 rounded-lg">
                                    <div class="text-xs text-blue-500">Principal</div>
                                    <div class="font-medium" id="principalValue">$0</div>
                                </div>
                                <div class="bg-yellow-50 p-2 rounded-lg">
                                    <div class="text-xs text-blue-500">Interest</div>
                                    <div class="font-medium" id="interestValue">$0</div>
                                </div>
                                <div class="bg-yellow-50 p-2 rounded-lg">
                                    <div class="text-xs text-blue-500">Taxes</div>
                                    <div class="font-medium" id="taxValue">$0</div>
                                </div>
                            </div>
                        </div>

                        <!-- Additional Costs -->
                        <div
                            class="bg-white/80 backdrop-blur-sm p-5 rounded-xl border border-blue-100 shadow-sm hover:shadow-md transition-shadow">
                            <h3 class="text-lg font-semibold text-gray-800 mb-3">Additional Monthly Costs</h3>

                            <!-- Property Tax -->
                            <div class="flex justify-between items-center py-2 border-b border-gray-100">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-yellow-100 rounded-full flex items-center justify-center mr-3">
                                        🧾
                                    </div>
                                    <div>
                                        <div class="font-medium text-gray-700">Property Tax</div>
                                        <div class="text-xs text-gray-500">Estimated annual 0.95%</div>
                                    </div>
                                </div>
                                <div class="font-medium" id="propertyTaxValue">$0</div>
                            </div>

                            <!-- HOA Fees -->
                            <div class="flex justify-between items-center py-2">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-yellow-100 rounded-full flex items-center justify-center mr-3">
                                        🏘️
                                    </div>
                                    <div>
                                        <div class="font-medium text-gray-700">HOA Fees</div>
                                        <div class="text-xs text-gray-500">If applicable</div>
                                    </div>
                                </div>
                                <div>
                                    <input type="number" id="hoa" value="0"
                                        class="w-24 px-3 py-1 border border-gray-300 rounded-md text-right focus:ring-2 focus:ring-blue-300 focus:border-blue-500"
                                        placeholder="$0">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- ✅ Script -->
                <script>
                    const slider = document.getElementById('downPaymentSlider');
                    const dpPercent = document.getElementById('downPaymentPercent');
                    const dpAmount = document.getElementById('downPaymentAmount');
                    const monthlyPayment = document.getElementById('monthlyPayment');
                    const progressBar = document.getElementById('sliderProgressBar');

                    const principalValue = document.getElementById('principalValue');
                    const interestValue = document.getElementById('interestValue');
                    const taxValue = document.getElementById('taxValue');
                    const propertyTaxValue = document.getElementById('propertyTaxValue');
                    const hoaInput = document.getElementById('hoa');

                    const homePrice = 1100000;
                    const interestRate = 0.07;
                    const termYears = 30;
                    const propertyTaxRate = 0.0095;

                    function formatCurrency(amount) {
                        return new Intl.NumberFormat('en-US', {
                            style: 'currency',
                            currency: 'USD'
                        }).format(amount);
                    }

                    function calculateMortgage(principal, rate, years) {
                        const monthlyRate = rate / 12;
                        const n = years * 12;
                        return (principal * monthlyRate) / (1 - Math.pow(1 + monthlyRate, -n));
                    }

                    function updateValues() {
                        const percent = parseInt(slider.value);
                        const downPayment = homePrice * (percent / 100);
                        const loanAmount = homePrice - downPayment;
                        const monthly = calculateMortgage(loanAmount, interestRate, termYears);

                        const monthlyPropertyTax = (homePrice * propertyTaxRate) / 12;
                        const hoa = parseFloat(hoaInput.value) || 0;

                        const firstMonthInterest = loanAmount * interestRate / 12;
                        const firstMonthPrincipal = monthly - firstMonthInterest;

                        // UI updates
                        dpPercent.innerText = percent + '%';
                        dpAmount.innerText = formatCurrency(downPayment);
                        monthlyPayment.innerText = formatCurrency(monthly + monthlyPropertyTax + hoa);

                        principalValue.textContent = formatCurrency(firstMonthPrincipal);
                        interestValue.textContent = formatCurrency(firstMonthInterest);
                        taxValue.textContent = formatCurrency(monthlyPropertyTax);
                        propertyTaxValue.textContent = formatCurrency(monthlyPropertyTax);

                        progressBar.style.width = percent * 2 + '%';
                        progressBar.style.background =
                            progressBar.style.background =
                            `linear-gradient(90deg, rgba(253,224,71,1) 0%, rgba(234,179,8,1) ${percent}%, rgba(202,138,4,1) 100%)`;
                    }

                    slider.addEventListener('input', updateValues);
                    hoaInput.addEventListener('input', updateValues);

                    updateValues(); // initialize
                </script>


                {{-- map location --}}
                <!-- Location Map -->
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Location</h3>
{{--                    <div class="aspect-w-16 aspect-h-9 bg-gray-200 rounded-lg overflow-hidden">--}}
{{--                        <iframe class="w-full h-64"--}}
{{--                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3306.037069764355!2d-118.6764079243286!3d34.0389440731556!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x80e82d5f1a1dc0a3%3A0x6b0b671b3c7e7a1e!2sMalibu%2C%20CA%2090265!5e0!3m2!1sen!2sus!4v1689876543210!5m2!1sen!2sus"--}}
{{--                            frameborder="0" style="border:0;" allowfullscreen="" loading="lazy"></iframe>--}}
{{--                    </div>--}}
                    <div class="aspect-w-16 aspect-h-9 bg-gray-200 rounded-lg overflow-hidden">
                        <iframe
                            class="w-full h-64"
                            src="https://www.google.com/maps?q={{ urlencode($property->address) }}&output=embed"
                            frameborder="0"
                            style="border:0;"
                            allowfullscreen
                            loading="lazy">
                        </iframe>
                    </div>


                </div>


            </div>


            <!-- Right Column (Contact & Agent) -->
            <div class="lg:w-1/3">
                <!-- Contact Form -->
                <div class="bg-white rounded-lg shadow-md p-6 mb-6 sticky top-32">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Contact Agent</h3>
                    <form action="{{route('contact.save', $property->id)}}" method="post">
                        @csrf
                        
                        <div class="mb-4">
                            <input type="text" name="name" placeholder="Your Name"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div class="mb-4">
                            <input type="email" name="email" placeholder="Email Address"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div class="mb-4">
                            <input type="tel" name="phone" placeholder="Phone Number"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                        </div>
                        <div class="mb-4">
                            <textarea placeholder="Message" name="message" rows="4"
                                class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
                        </div>
                        <button type="submit"
                            class="w-full bg-yellow-600 hover:bg-yellow-700 text-white py-3 rounded-lg font-medium transition duration-300">
                            <i class="fas fa-paper-plane mr-2"></i> Send Message
                        </button>
                    </form>
                </div>

                <!-- Agent Card -->
                {{-- <div class="bg-white rounded-lg shadow-md p-6">
                    <h3 class="text-xl font-bold text-gray-800 mb-4">Listing Agent</h3>
                    <div class="flex items-center mb-4">
                        <img src="https://randomuser.me/api/portraits/women/44.jpg" alt="Agent" class="w-16 h-16 rounded-full object-cover mr-4">
                        <div>
                            <h4 class="font-bold text-gray-800">Sarah Johnson</h4>
                            <p class="text-gray-600">Luxury Homes Specialist</p>
                        </div>
                    </div>
                    <div class="space-y-3">
                        <div class="flex items-center">
                            <i class="fas fa-phone-alt text-blue-500 mr-2"></i>
                            <span>(555) 123-4567</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-envelope text-blue-500 mr-2"></i>
                            <span>sarah@luxuryhomes.com</span>
                        </div>
                        <div class="flex items-center">
                            <i class="fas fa-building text-blue-500 mr-2"></i>
                            <span>Malibu Coastal Realty</span>
                        </div>
                    </div>
                    <button class="mt-4 w-full bg-gray-100 hover:bg-gray-200 text-gray-800 py-2 rounded-lg font-medium transition duration-300">
                        <i class="fas fa-user mr-2"></i> View Profile
                    </button>
                </div> --}}
            </div>
        </div>
    </main>
@endsection
