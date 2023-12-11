<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Facilities Reservation System</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="/css/styles.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <link href="/css/custom.css" rel="stylesheet">
</head>

<body class="bg-[#E5EFE8] ">
    <nav class="w-full">
        <div class="flex items-center ml-10 py-4 px-6">
            <a class="flex items-center" href="#">
                <img src="/images/lsu-logo 2.png" alt="Logo" class="h-12 mr-4">
                <span class="text-green-600 font-bold lg:block hidden">LA SALLE UNIVERSITY</span>
            </a>

            <div class="lg:hidden absolute right-4 mr-12">
                <a href="login" class="text-black hover:text-blue-300 focus:outline-none">
                    <span><img src="/images/usericon.png" class="h-10"></span>
                </a>
            </div>
            <div class="hidden lg:inline-block absolute right-4 text-black hover:text-blue-300 mr-12">
                <a href="login" class="text-black hover:text-blue-300 focus:outline-none">
                    <span class="text-green-600 font-bold">Admin</span>
                </a>
            </div>
        </div>
    </nav>
    
    <section class="overflow-x-hidden">
            <div class="hidden md:block bg-center h-96 rounded-2xl relative bg-no-repeat bg-cover relative md:ml-12 md:mr-12" style="background-image: url('/images/bg-default.png');">
                <div>
                    <div class="md:absolute md:inset-0 flex flex-col items-center mt-12">
                        <img src="images/lsu-logo 2.png" style="height: 90px;">
                        <span class="text-4xl md:text-7xl text-green mt-5" style="font-family: 'Times New Roman', Times, serif; color: green;">La Salle University</span>
                        <span class="text-xl md:text-2xl mt-3" style="font-family: 'Times New Roman', Times, serif; color: green;">Facilities Reservation System</span>
                    </div>
                </div>

            </div>

            <div class=" lg:hidden md:hidden bg-center h-96 rounded-2xl relative bg-no-repeat bg-cover relative fixed" style="background-image: url('/images/bg-default.png');margin-left: 20px;margin-right:20px;">
                <div class="md:absolute md:inset-0 flex flex-col items-center ">
                    <img src="images/lsu-logo 2.png" style="height: 90px;" class="mt-7">
                    <span class="text-4xl md:text-7xl text-green mt-5" style="font-family: 'Times New Roman', Times, serif; color: green;">La Salle University</span>
                    <span class="text-xl md:text-2xl mt-3" style="font-family: 'Times New Roman', Times, serif; color: green;">Facilities Reservation System</span>
                    <div>
                        <div class=" bottom-0 left-0 right-0 p-4 flex flex-col items-center">
                        <a href="reservation" class="bg-green-600 text-white font-semibold py-2 px-4 rounded-full hover:bg-white hover:text-black transition duration-300 ease-in-out w-full mb-2 sm:block">RESERVATION</a>
                        <button class="bg-green-600 text-white font-semibold py-2 px-4 rounded-full hover:bg-white hover:text-black transition duration-300 ease-in-out w-full openBtn mb-2">CHECK STATUS</button>
                        <button id="" class= "bg-green-600 text-white font-semibold py-2 px-4 rounded-full hover:bg-white hover:text-black transition duration-300 ease-in-out w-full uppercase">Calendar</button>
                        </div>
                    </div>
                </div>   

            </div>
            <div class="fixed top-0 left-20 md:ml-80 md:mr-10 md:relative md:-mt-1 hidden md:block">

                <div class="md:absolute md:inset-0 flex flex-col justify-end items-center ">
                    <div class="bg-white rounded-full md:m-auto md:mt-4">
                        <div class="flex flex-col md:flex-row md:space-x-4 justify-center">
                            <button id="calendarButton" class="bg-white-500 hover:bg-green-600 text-black hover:text-white font-semibold py-2 px-3 md:py-2 md:px-4 rounded-full transition duration-300 ease-in-out mt-2 md:mt-0">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-5 h-5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5m-9-6h.008v.008H12v-.008zM12 15h.008v.008H12V15zm0 2.25h.008v.008H12v-.008zM9.75 15h.008v.008H9.75V15zm0 2.25h.008v.008H9.75v-.008zM7.5 15h.008v.008H7.5V15zm0 2.25h.008v.008H7.5v-.008zm6.75-4.5h.008v.008h-.008v-.008zm0 2.25h.008v.008h-.008V15zm0 2.25h.008v.008h-.008v-.008zm2.25-4.5h.008v.008H16.5v-.008zm0 2.25h.008v.008H16.5V15z" />
                                </svg>
                            </button>     
                        </div>
                    </div>
                </div>
            </div>

        
            <div class="hidden md:block container mx-auto h-full md:relative md:mt-10">
                <div class="md:absolute md:inset-0 flex flex-col justify-end">
                    <div class="bg-white p-3 md:p-5 rounded-full md:w-96 md:m-auto md:mt-4">
                        <div class="flex flex-col md:flex-row md:space-x-4 justify-center">
                            <a href="reservation" class="bg-white-500 hover:bg-green-600 text-black hover:text-white font-semibold py-2 px-3 md:py-2 md:px-4 rounded-full transition duration-300 ease-in-out mt-2 md:mt-0">RESERVATION</a>
                            <button id="checkStatusBtn" class="bg-white-500 hover:bg-green-600 text-black hover:text-white font-semibold py-2 px-3 md:py-2 md:px-4 rounded-full transition duration-300 ease-in-out mt-2 md:mt-0">CHECK STATUS</button>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    
    <section class="m-10 -mb-5 -mt-10 h-full">
        <div class="flex flex-col items-center mt-9">
            <span class="text-xl md:text-2xl mt-3 text-green-600 font-bold">FACILITIES</span>
        </div>

        <div class="swiper-container mt-5">
            <div class="swiper-wrapper">
                @foreach ($facilities as $facility)
                    <div class="swiper-slide w-1/1 md:w-1/2 lg:w-1/3 xl:w-1/4 min-w-1/4 fixed  left-0 h-full">
                        <div class="image-container relative fixed top-0 left-0">
                            <img src="{{ asset('uploads/facilities/' . $facility->image) }}" alt="Facility Image" class="w-full rounded-2xl h-30 w-15">
                        </div>
                        <p class=" text-3xl font-bold text-white absolute top-0 left-0 w-full mt-60 bg-green-800 ps-4 fixed ">{{ $facility->facilityName }}</p>
                        <p class=" text-xs font-semibold text-white absolute top-0 left-0 w-full mt-[272px] bg-green-800 ps-4 ">{{ $facility->facilityStatus }}</p>

                    </div>
                @endforeach
            </div>
        </div>  

    </section>
 

    <div class="hidden fixed inset-0 flex items-center justify-center overflow-auto z-50 w-90" id="statusModal">
        <div class="transition-opacity">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:align-middle sm:max-w-lg sm:w-full h-[300px]">
            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4 h-[280px]">
                <div class="sm:flex sm:items-start">
                    <div class="mt-3 text-center sm:mt-0 w-full">
                        <a href="/" class="-mt-5">
                            <img src="/images/lsu-logo 2.png"  class=" mx-auto w-[50px] h-[75px] mt-2" />
                        </a>
                        <form class="mt-10" id="statusForm">   
                            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                            <div class="relative">
                                <input type="search" id="default-search" class="block w-full p-4 ps-5 text-sm text-gray-900 border border-gray-300 rounded-lg focus:ring-blue-500 focus:border-blue-500  dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Enter Reservation Code" required>
                                <button type="button" onclick="getStatusFromDatabase()" class="text-white absolute end-2.5 bottom-2.5 bg-green-700 hover:bg-green-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-green-600 ">Search</button>
                            </div>
                            <div id="iconDisplay" class="text-4xl mt-3"></div>
                            <p id="statusDisplay" class="text-xl mt-5 font-bold text-green-700 uppercase "></p>

                        </form>

                        <a href="/" class="text-center text-black text-xs block mt-2 hover:text-green">Back to the Home Page</a>

                    </div>
                </div>
            </div>
        </div>
    </div> 
    
    <div class="hidden fixed inset-0 bg-black bg-opacity-50 z-50 overflow-y-auto" id="calendarModal">
    <div class="flex items-center justify-center min-h-screen">
        <div class="bg-white p-8 rounded shadow-md">
        <div class="flex flex-col items-center">
            <span class="text-xl md:text-2xl mt-3 text-green-600 font-bold">CALENDAR</span>
        </div>
        <div class="flex flex-col lg:flex-row">
        <div class="w-full lg:w-1/6 mb-5 lg:mb-0 pl-1 pr-1">
            <div class="min-h-full bg-white p-4 rounded-2xl shadow">
                <div class="flex items-center justify-center">
                    <span class="font-bold text-center">FILTER</span>
                </div>
                <div class="relative inline-block text-left mt-2 mb-2">
                    <div>
                        <span class="bg-[#43C6DB] rounded-full h-3 w-3 inline-block"></span>
                        <span>Event</span>
                    </div>
                    <div>
                        <span class="bg-[#7FFFD4] rounded-full h-3 w-3 inline-block"></span>
                        <span>Preparation</span>
                    </div>
                    <div>
                        <span class="bg-pink-500 rounded-full h-3 w-3 inline-block"></span>
                        <span>Clean-up</span>
                    </div>
                </div>

                <div class="relative inline-block text-left mt-2 mb-2">
                    <label for="scheduleFilter" class="block text-sm font-medium text-gray-700 mb-1">Schedule:</label>
                    <select id="scheduleFilter" class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-500 px-4 py-2 pr-8 rounded leading-tight focus:outline-none focus:shadow-outline">
                        <option value="">Select</option>
                        <option value="Event">Event</option>
                        <option value="Preparation">Preparation</option>
                        <option value="Cleanup">Clean-up</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4 mt-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M7 7l3-3 3 3m0 6l-3 3-3-3"></path></svg>
                    </div>
                </div>
                <div class="relative inline-block text-left mt-2 mb-2">
                    <label for="facilityFilter" class="block text-sm font-medium text-gray-700 mb-1">Facility:</label>
                    <select id="facilityFilter" class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-500 px-4 py-2 pr-8 rounded leading-tight focus:outline-none focus:shadow-outline">
                        <option value="">Select</option>
                        @foreach($facilities as $facility)
                            <option value="{{ $facility->facilityID }}">{{ $facility->facilityName }}</option>
                        @endforeach
                    </select>

                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4 mt-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M7 7l3-3 3 3m0 6l-3 3-3-3"></path></svg>
                    </div>
                </div>
                <div class="relative inline-block text-left mt-2 mb-2" style="display: none;">
                    <label hidden for="statusFilter" class="block text-sm font-medium text-gray-700 mb-1">Status:</label>
                    <select hidden id="statusFilter" class="block appearance-none w-full bg-white border border-gray-300 hover:border-gray-500 px-4 py-2 pr-8 rounded leading-tight focus:outline-none focus:shadow-outline">
                        <option value="Approved">Approved</option>
                        <option value="Not Approved">Not Approved</option>
                        <option value="Pending">Pending</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                        <svg class="fill-current h-4 w-4 mt-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M7 7l3-3 3 3m0 6l-3 3-3-3"></path></svg>
                    </div>
                </div>
            </div>
        </div>

        <div class="w-full lg:w-6/8 mb-5 lg:mb-0 pl-1 pr-1">
            <div class="min-h-full bg-white p-4 rounded-2xl shadow">
                <div class="flex items-center">
                    <button id="prevMonth" class="p-2 bg-green-500 rounded-full text-white hover:bg-green-900 mr-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                        </svg>
                    </button>
                    <button id="nextMonth" class="p-2 bg-green-500 text-white rounded-full hover:bg-green-900 mr-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                        </svg>
                    </button>
                    <div id="currentMonth" data-year="2023" data-month="12" class="text-2xl font-semibold text-uppercase"></div>
                </div>

                <div class="mt-2 grid grid-cols-7 gap-2 bg-green-600 py-2 text-white rounded-xl">
                    <div class="text-center text-sm font-semibold">Sunday</div>
                    <div class="text-center text-sm font-semibold">Monday</div>
                    <div class="text-center text-sm font-semibold">Tuesday</div>
                    <div class="text-center text-sm font-semibold">Wednesday</div>
                    <div class="text-center text-sm font-semibold">Thursday</div>
                    <div class="text-center text-sm font-semibold">Friday</div>
                    <div class="text-center text-sm font-semibold">Saturday</div>
                </div>

                <div class="calendar-grid mt-2" id="calendar"></div>
                </div>
            </div>
        </div>
        <button id="closeModal" class="mt-4 border-2 border-green-600  py-2 px-4 rounded-full">Close</button>
        </div>
    </div>
    </div>

    <footer class = "mt-10">
        <div class="border-t border-solid border-green-600" style="border-top: 30px solid green; display: flex; justify-content: center; align-items: center;">
            <img src="/images/polygon.png" class="-mt-12">
        </div>

        <div class="mx-10 py-10 text-center md:text-left">
            <div class="grid-1 grid gap-8 md:grid-cols-2 lg:grid-cols-4">
            <div class="">
                <h6 class ="mt-12">
                <div class="text-center align-center">
                    <img src="/images/lsu-logotype-colored.png" class="-mt-12 h-9"  style="justify-content: center; align-items: center;">

                </div>
                <p>
                Here you can use rows and columns to organize your footer
                content. Lorem ipsum dolor sit amet, consectetur adipisicing
                elit.
                </p>
            </div>
            <div class="">
                <h6
                class="mb-4 flex justify-center font-semibold uppercase md:justify-start">
                Title
                </h6>
                <p class="mb-4">
                <a href="#!" class="text-neutral-600 dark:text-black"
                    >Link</a
                >
                </p>
                <p class="mb-4">
                <a href="#!" class="text-neutral-600 dark:text-black"
                    >Link</a
                >
                </p>
                <p class="mb-4">
                <a href="#!" class="text-neutral-600 dark:text-black"
                    >Link</a
                >
                </p>
                <p>
                <a href="#!" class="text-neutral-600 dark:text-black"
                    >Link</a
                >
                </p>
            </div>
            <div class="">
                <h6
                class="mb-4 flex justify-center font-semibold uppercase md:justify-start">
                Title
                </h6>
                <p class="mb-4">
                <a href="#!" class="text-neutral-600 dark:text-black"
                    >Link</a
                >
                </p>
                <p class="mb-4">
                <a href="#!" class="text-neutral-600 dark:text-black"
                    >Link</a
                >
                </p>
                <p class="mb-4">
                <a href="#!" class="text-neutral-600 dark:text-black"
                    >Link</a
                >
                </p>
                <p>
                <a href="#!" class="text-neutral-600 dark:text-black"
                    >Link</a
                >
                </p>
            </div>
            <div>
                <h6
                class="mb-4 flex justify-center font-semibold uppercase md:justify-start">
                Contact
                </h6>
                <p class="mb-4 flex items-center justify-center md:justify-start">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                    class="mr-3 h-5 w-5">
                    <path
                    d="M11.47 3.84a.75.75 0 011.06 0l8.69 8.69a.75.75 0 101.06-1.06l-8.689-8.69a2.25 2.25 0 00-3.182 0l-8.69 8.69a.75.75 0 001.061 1.06l8.69-8.69z" />
                    <path
                    d="M12 5.432l8.159 8.159c.03.03.06.058.091.086v6.198c0 1.035-.84 1.875-1.875 1.875H15a.75.75 0 01-.75-.75v-4.5a.75.75 0 00-.75-.75h-3a.75.75 0 00-.75.75V21a.75.75 0 01-.75.75H5.625a1.875 1.875 0 01-1.875-1.875v-6.198a2.29 2.29 0 00.091-.086L12 5.43z" />
                </svg>
                New York, NY 10012, US
                </p>
                <p class="mb-4 flex items-center justify-center md:justify-start">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                    class="mr-3 h-5 w-5">
                    <path
                    d="M1.5 8.67v8.58a3 3 0 003 3h15a3 3 0 003-3V8.67l-8.928 5.493a3 3 0 01-3.144 0L1.5 8.67z" />
                    <path
                    d="M22.5 6.908V6.75a3 3 0 00-3-3h-15a3 3 0 00-3 3v.158l9.714 5.978a1.5 1.5 0 001.572 0L22.5 6.908z" />
                </svg>
                info@example.com
                </p>
                <p class="mb-4 flex items-center justify-center md:justify-start">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                    class="mr-3 h-5 w-5">
                    <path
                    fill-rule="evenodd"
                    d="M1.5 4.5a3 3 0 013-3h1.372c.86 0 1.61.586 1.819 1.42l1.105 4.423a1.875 1.875 0 01-.694 1.955l-1.293.97c-.135.101-.164.249-.126.352a11.285 11.285 0 006.697 6.697c.103.038.25.009.352-.126l.97-1.293a1.875 1.875 0 011.955-.694l4.423 1.105c.834.209 1.42.959 1.42 1.82V19.5a3 3 0 01-3 3h-2.25C8.552 22.5 1.5 15.448 1.5 6.75V4.5z"
                    clip-rule="evenodd" />
                </svg>
                + 01 234 567 88
                </p>
                <p class="flex items-center justify-center md:justify-start">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 24 24"
                    fill="currentColor"
                    class="mr-3 h-5 w-5">
                    <path
                    fill-rule="evenodd"
                    d="M7.875 1.5C6.839 1.5 6 2.34 6 3.375v2.99c-.426.053-.851.11-1.274.174-1.454.218-2.476 1.483-2.476 2.917v6.294a3 3 0 003 3h.27l-.155 1.705A1.875 1.875 0 007.232 22.5h9.536a1.875 1.875 0 001.867-2.045l-.155-1.705h.27a3 3 0 003-3V9.456c0-1.434-1.022-2.7-2.476-2.917A48.716 48.716 0 0018 6.366V3.375c0-1.036-.84-1.875-1.875-1.875h-8.25zM16.5 6.205v-2.83A.375.375 0 0016.125 3h-8.25a.375.375 0 00-.375.375v2.83a49.353 49.353 0 019 0zm-.217 8.265c.178.018.317.16.333.337l.526 5.784a.375.375 0 01-.374.409H7.232a.375.375 0 01-.374-.409l.526-5.784a.373.373 0 01.333-.337 41.741 41.741 0 018.566 0zm.967-3.97a.75.75 0 01.75-.75h.008a.75.75 0 01.75.75v.008a.75.75 0 01-.75.75H18a.75.75 0 01-.75-.75V10.5zM15 9.75a.75.75 0 00-.75.75v.008c0 .414.336.75.75.75h.008a.75.75 0 00.75-.75V10.5a.75.75 0 00-.75-.75H15z"
                    clip-rule="evenodd" />
                </svg>
                + 01 234 567 89
                </p>
            </div>
            </div>
        </div>

        <div class="bg-neutral-200 p-6 text-center dark:bg-green-800">
            <span class="text-white">© 2023 Copyright:</span>
            <a
            class="font-semibold text-neutral-600 dark:text-white"
            href="https://tw-elements.com/"
            >La Salle University - Ozamiz</a
            >
        </div>
        </div>

    </footer>


<script src="/js/homecalendar.js"></script>


<script>

    var swiper = new Swiper('.swiper-container', {
        slidesPerView: 'auto', 
            spaceBetween: 10,
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            },
            breakpoints: {
    
                640: {
                    slidesPerView: 1,
                },
            
                768: {
                    slidesPerView: 2,
                },
                1024: {
                    slidesPerView: 3,
                },
            },
        });
    

        function toggleStatusModal() {
            var modal = document.getElementById('statusModal');
            modal.classList.toggle('hidden');
        }

        document.getElementById('checkStatusBtn').addEventListener('click', function () {
            toggleStatusModal();
        });

        document.getElementById('closeStatusModalBtn').addEventListener('click', function () {
            toggleStatusModal();
        });

        function getStatusFromDatabase() {
            var reserveeID = document.getElementById('default-search').value;

            fetch(`/get-status/${reserveeID}`)
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Failed to fetch');
                    }
                    return response.json();
                })
                .then(data => {
                    document.getElementById('statusDisplay').innerText = data.status;
                })
                .catch(error => {
                    console.error('Error:', error.message);
                    document.getElementById('statusDisplay').innerText = 'Error fetching status. Please try again.';
                });
        }


</script>




</body>
</html>
