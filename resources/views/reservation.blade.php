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

    
    <div id="form-content" class=" bg-white ml-14 mr-14 rounded-3xl">
        <div class="p-6 bg-white rounded border-green rounded-2xl mt-5">
            <div class="p-4 bg-white rounded border-green rounded-2xl">
                <div class="w-full h-10 bg-green-700 mx-auto">
                    <div class="w-full h-3.5 flex items-center md:ml-5">
                        <div class="mt-6 text-white text-[15px] font-bold font-['Inter']">FACILITIES
                        </div>
                    </div>
                </div>
                
                <form method="post" action="{{ route('reservation.store') }}">
                    @csrf
                    <input type="hidden" name="reservedetailsID" id="reservationcode">
                    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 mt-5">
                        @foreach ($facilities as $facility)
                            <div class="mb-2 sm:col-span-1 md:col-span-1">
                                <label class="flex items-center space-x-2">
                                <input type="checkbox" name="facilityID[]" value="{{ $facility->id }}" class="form-checkbox" onchange="limitFacilitySelections(this)">
                                    <span>{{ $facility->facilityName }}</span>
                                </label>
                            </div>
                        @endforeach
                    </div>
                    <div class="mt-4 flex justify-between ml-14 mr-14 ">
                        <button id="back-button" class="bg-green-600 text-white px-8 py-2 rounded focus:outline-none">Back</button>
                        <button type="submit" id="submit-button" class="bg-green-600 text-white px-6 py-2 rounded focus:outline-none" onclick="openModal()">Submit</button>
                    </div>
                    </div>
                </form>
            </div>
        </div>
            
    <!-- Modal -->

    
    <div id="modal" class="fixed inset-0 z-50 flex items-center justify-center hidden">
        <div class="modal-overlay absolute w-full h-full bg-gray-900 opacity-50"></div>
        <div class="modal-container bg-green-700 w-100px md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
            <div class="mt-5 mb-5 flex flex-col items-center justify-center">
                <a href="/" class="m-4">
                    <img src="/images/lsu-logo 2.png" class="mx-auto w-16 h-30" />
                </a>
                <span class=" font-bold text-2xl text-white text-center">YOUR RESERVATION REQUEST IS SUBMITTED.</span>
                <span id="reservation-code" class="text-center text-white mt-2">Reservation Code: </span>
                <a href="/" class="border border-white px-4 py-2 mt-5 text-white rounded-xl mb-5">Home</a>
            </div>
        </div>
    </div>




<script src="/js/reservationmodal.js"></script>



</body>
</html>