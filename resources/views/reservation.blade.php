<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="/css/styles.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <link href="/css/custom.css" rel="stylesheet">
</head>

<body class="bg-[#E5EFE8]">
    <nav class>
        <div class="container flex items-center ml-10 py-4 px-6 relative">
            <a class="flex items-center" href="/">
                <img src="/images/lsu-logo 2.png" alt="Logo" class="h-12 mr-4">
                <span class="text-green-600 font-bold mr lg:block hidden">LA SALLE UNIVERSITY</span>
            </a>
        </div>
    </nav>
    <section class=" ml-14 mr-14 rounded-xl">
      
        <div class="relative">
            <div class="left-title"></div>
            <div class="absolute top-0 left-0 mt-8 ml-5">
                <span class="text-4xl font-bold text-green-900">RESERVATION 
                    <br>FORM</span>
            </div>
        </div>
    </section>

    <div class=" hidden md:inline container mx-auto p-4">
        <div id="form-progress" class="flex items-center justify-center space-x-4">
            <div class="step step-active">
                <span class="md:mr-4">1</span>
                <label class="hidden md:inline md:-mr-10 md:-ml-10">Select Facilities</label>
            </div>
            <div class="line hidden md:block md:w-1/4"></div>
            <div class="step">
                <span class="md:mr-4">2</span>
                <label class="hidden md:inline md:-mr-10 md:-ml-10">Reservation Details</label>
            </div>
            <div class="line hidden md:block md:w-1/4"></div>
            <div class="step md:mt-7 mt-6 ">
                <span>3</span>
                <label class="hidden md:inline md:-mr-10 md:-ml-10" >Reservee Details <br>and Endorsement</label>
            </div>
            <div class="line hidden md:block md:w-1/4"></div>
            <div class="step">
                <span class="md:mr-4 ">4</span>
                <label class="hidden md:inline md:-mr-10 md:-ml-10">Confirmation</label>
            </div>
        </div>
    </div>
    <div id="form-content" class=" bg-white ml-14 mr-14 rounded-3xl">
        <div class="step-content mt-" id="step-1-content">
            <div class="p-6  bg-white rounded border-green rounded-2xl">
                <div class= " mt-5 mr-10 ml-10 mb-5 ">
                    <div class="p-2 ">
                        <span class="text-2xl font-bold text-black ">FACILITIES</span>
                    </div>
                    <form method="post">
                        @csrf
                        <div class="grid grid-cols-4 gap-4">
                            @foreach ($facilities as $facility)
                                <div class="col-span-1 mr-5 ml-5">
                                    <label class="flex items-center space-x-2 text-xl">
                                        <input type="checkbox" name="facilities[]" value="{{ $facility->id }}" class="form-checkbox">
                                        <span>{{ $facility->facilityName }}</span>
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="step-content hidden" id="step-2-content">
            <div class="p-4 mt-5 bg-white rounded border-green rounded-2xl">
                <div class= " hidden md:block mt-4 mr-10 ml-10 mb-5 ">
                    <div class="  flex">
                        <div>
                            <label class="mb-1 md:mb-0 pr-4" for="inline-full-name">Name of Event</label>
                        </div>
                        <div class = "w-[960px]">
                            <input class=" appearance-none border-2 border-gray-200 rounded w-full py-2 px-4 text-gray-700" type="text">
                        </div>
                    </div>
                </div>
                
                <div class= "lg:hidden md:hidden  mt-5 mr-5 ml-5 mb-5 ">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                                Name of Event
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text">
                    </div>
                </div>
            </div>
        </div>
        <div class="step-content hidden" id="step-3-content">
            kapoy na
        </div>
        <div class="step-content hidden" id="step-4-content">
            huhu
        </div>
    </div>

    <div class="mt-4 flex justify-between ml-14 mr-14">
        <button id="prev-button" class="bg-green-600 text-white px-4 py-2 rounded focus:outline-none">Previous</button>
        <button id="next-button" class="bg-green-600 text-white px-7 py-2 rounded focus:outline-none">Next</button>
    </div>




<script>
    document.addEventListener('DOMContentLoaded', function () {
    const steps = document.querySelectorAll('.step');
    const prevButton = document.getElementById('prev-button');
    const nextButton = document.getElementById('next-button');
    const stepContent = document.querySelectorAll('.step-content');
    let currentStep = 0;

    function updateProgressBar() {
        steps.forEach((step, index) => {
            if (index < currentStep) {
                step.classList.add('step-active');
            } else if (index === currentStep) {
                step.classList.add('step-active');
            } else {
                step.classList.remove('step-active');
            }
        });

        stepContent.forEach((content, index) => {
            if (index === currentStep) {
                content.classList.remove('hidden');
            } else {
                content.classList.add('hidden');
            }
        });
    }

    prevButton.addEventListener('click', function () {
        if (currentStep > 0) {
            currentStep--;
            updateProgressBar();
        }
    });

    nextButton.addEventListener('click', function () {
        if (currentStep < steps.length - 1) {
            currentStep++;
            updateProgressBar();
        }
    });
});


</script>
</body>
</html>