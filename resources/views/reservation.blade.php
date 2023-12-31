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
    <link href="/css/custom.css" rel="stylesheet">
</head>

<body class="bg-[#E5EFE8]">
    <nav>
        <div class="container flex items-center  sm:ml-10 sm:mr-14 py-4 px-6 relative">
            <a class="flex items-center" href="/">
                <img src="/images/lsu-logo 2.png" alt="Logo" class="h-12 mr-4">
                <span class="text-green-600 font-bold mr lg:block hidden">LA SALLE UNIVERSITY</span>
            </a>
        </div>
    </nav>
    <section class="ml-5 mr-5 sm:ml-14 sm:mr-14 rounded-xl">
        <div class="relative hidden sm:block"> <!-- Hide on small screens (sm and down) -->
            <div class="left-title"></div>
            <div class="absolute top-0 left-0 mt-8 ml-5">
                <span class="text-4xl font-bold text-green-900">RESERVATION 
                    <br>FORM</span>
            </div>
        </div>
        <div class="relative block sm:hidden">
            <div class="w-full h-32" style="background-image: url('/images/reservation.png'); background-size: cover;"></div>
            <div class="absolute top-0 left-0 right-0 flex items-center justify-center h-32 mt-6">
                <span class="text-2xl font-bold text-green-50">RESERVATION FORM</span>
            </div>
        </div>
    </section>



    <form method="post" action="{{ route('reservation.store') }}" enctype="multipart/form-data" class=" ml-5 mr-5 sm:ml-14 sm:mr-14 mt-5" >
        @csrf
        <div class="flex flex-col lg:flex-row">
            <div class="w-full lg:w-1/3 mb-5 lg:mb-0 pl-2 pr-2 ">
                <div class="bg-white h-full p-4 rounded-xl">
                    <div class="bg-[#5CC273] p-2">
                        <span class="text-m font-bold text-white pl-4">A. FACILITIES</span>
                    </div>
                    <div>
                        <input type="hidden" name="reservedetailsID" id="reservationcode">
                        @foreach ($facilities as $facility)
                            <div class="mb-2 sm:col-span-1 md:col-span-1 mr-2 ml-2 mt-2">
                                <label class="items-center space-x-2">
                                    <input type="checkbox" name="facility_checkbox[{{ $facility->facilityID }}]" class="form-checkbox equipment-checkbox">
                                    <span class="text-l font-bold">{{ $facility->facilityName }}</span>
                                </label>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="w-full lg:w-2/3 pl-2 pr-2 ">
                <div class="bg-white h-full p-4 rounded-xl">
                    <div>
                        <div class="bg-[#5CC273] p-2">
                            <span class="text-m font-bold text-white pl-4">B. RESERVATION DETAILS</span>
                        </div>
                        <div class="items-center mb-5 mt-5 ml-4 mr-4">
                            <label class="w-32 text-gray-700 text-sm font-bold">Name of Event:</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nameofevent" name="nameofevent" type="text" required>
                        </div>
                    </div>
                    <div>
                         
                        <div class="flex flex-col lg:flex-row">
                            <div class="w-full lg:w-1/2 pt-2 pl-2 pr-2 ">
                                <div>
                                    <div class="bg-[#5CC273] p-2">
                                        <span class="text-l font-bold text-white pl-4">B2. EVENT DETAILS</span>
                                    </div>
                                    <div class="items-center">
                                        <label class=" w-32 text-gray-700 text-sm font-bold mb-2" for="start-date">Start Date and Time of Event:</label>
                                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="event-start-date" name="event-start-date" type="datetime-local" required>
                                    </div>
                                    
                                    <div class=" items-center">
                                        <label class=" w-32 text-gray-700 text-sm font-bold mb-2" for="start-date">End Date and Time of Event:</label>
                                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="event-end-date" name="event-end-date" type="datetime-local" required>
                                    </div>
                                    <div class=" items-center">
                                        <label class=" w-32 text-gray-700 text-sm font-bold mb-2" for="start-date">Maximum Expected Number of Attendees:</label>
                                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="max-attendees" name="max-attendees" type="text" required>
                                    </div>
                                    <div class=" items-center">
                                        <label class=" w-32 text-gray-700 text-sm font-bold mb-2" for="start-date">Preparation Start Date and Time:</label>
                                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="preparation-start-date" name="preparation-start-date" type="datetime-local" required>
                                    </div>
                                    <div class=" items-center">
                                        <label class=" w-32 text-gray-700 text-sm font-bold mb-2" for="start-date">Preparation End Date and Time:</label>
                                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="preparation-end-date" name="preparation-end-date" type="datetime-local" required>
                                    </div>
                                    <div class=" items-center">
                                        <label class=" w-32 text-gray-700 text-sm font-bold mb-2" for="start-date">Clean-up Start Date and Time:</label>
                                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="cleanup-start-date" name="cleanup-start-date" type="datetime-local" required>
                                    </div>
                                    <div class=" items-center">
                                        <label class=" w-32 text-gray-700 text-sm font-bold mb-2" for="start-date">Clean-up End Date and Time:</label>
                                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="cleanup-end-date" name="cleanup-end-date" type="datetime-local" required>
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="w-full lg:w-1/2 pt-2 pl-2 pr-2 ">
                                <div class="bg-[#5CC273] p-2">
                                    <span class="text-l font-bold text-white pl-4">B3. FACILITIES & EQUIPMENT</span>
                                </div>
                                <div>
                                    @foreach ($equipments as $equipment)
                                    <div class="mb-2 flex items-center space-x-2">
                                        <input type="checkbox" name="equipment_checkbox[{{ $equipment->equipmentID }}]" class="form-checkbox equipment-checkbox">
                                        <span>{{ $equipment->equipmentName }}</span>
                                        <input type="text" name="equipment_details[{{ $equipment->equipmentID}}]" class="px-3 py-2 border rounded equipment-input" placeholder="No. Required" style="display: none;">
                                    </div>
                                    @endforeach
                                </div>

                                <div class="bg-[#5CC273] p-2">
                                    <span class="text-l font-bold text-white pl-4">B4. SUPPORT PERSONNEL</span>
                                </div>
                                <div>
                                <div>
                                    @foreach ($personnels as $personnel)
                                    <div class="mb-2 flex items-center space-x-2">
                                        <input type="checkbox" name="personnel_checkbox[{{ $personnel->personnelID }}]" class="form-checkbox personnel-checkbox">
                                        <span>{{ $personnel->personnelName }}</span>
                                        <input type="text" name="personnel_details[{{ $personnel->personnelID }}]" class="px-3 py-2 border rounded personnel-input" placeholder="No. Required" style="display: none;">
                                    </div>
                                    @endforeach
                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-5">
                        <div class="bg-[#5CC273] p-2">
                            <span class="text-l font-bold text-white pl-4">B5. ATTACHMENTS</span>
                        </div>
                        <div class="flex pt-5">
                            <input type="file" id="attachments" name="attachments[]" multiple class="hidden" onchange="displayFiles()">
                            <label for="attachments" class="inline-block bg-green-100 text-green-700 rounded-full w-10 h-10 text-center cursor-pointer m-2">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 m-auto mt-2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
                                </svg>
                            </label>
                            <div id="fileList" class="text-black" style="margin: 15px;"></div>
                        </div>
                    </div>


                    <div class="mt-5">
                        <div class="bg-[#5CC273] p-2">
                                <span class="text-l font-bold text-white pl-4">C. RESERVEE DETAILS</span>
                        </div>
                        <div class="flex flex-col lg:flex-row">
                            <div class="w-full lg:w-1/2 pt-2 pl-2 pr-2 ">
                                <div class="items-center ml-4 mr-4">
                                    <label class="w-32 text-gray-700 text-sm font-bold">Requested By:</label>
                                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="reserveeName" name="reserveeName" type="text" required>
                                </div>
                                <div class="items-center ml-4 mr-4">
                                    <label class="w-32 text-gray-700 text-sm font-bold">Person-in-Charge of Event:</label>
                                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="person_in_charge_event" name="person_in_charge_event" type="text" required>
                                </div>
                                <div class="items-center ml-4 mr-4">
                                    <label class="w-32 text-gray-700 text-sm font-bold">Contact Details:</label>
                                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="contact_details" name="contact_details" type="text" required>
                                </div>
                                <div class="items-center ml-4 mr-4">
                                    <label class="w-32 text-gray-700 text-sm font-bold">Unit/Department/Company:</label>
                                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="unit_department_company" name="unit_department_company" type="text" required>
                                </div>
                            </div>
                            <div class="w-full lg:w-1/2 pt-2 pl-2 pr-2 ">
                                <div class="items-center ml-4 mr-4">
                                    <label class="w-32 text-gray-700 text-sm font-bold">Date of Filing:</label>
                                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="date_of_filing" name="date_of_filing" type="date" required>
                                </div>
                                <div class="items-center ml-4 mr-4">
                                    <label class="w-32 text-gray-700 text-sm font-bold">Endorsed by:</label>
                                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="endorsed_by" name="endorsed_by" type="text" required>
                                </div>
                                <div class="items-center ml-4 mr-4">
                                    <label class="w-32 text-gray-700 text-sm font-bold">Designation</label>
                                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="designation" name="designation" type="text" required>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="m-2 flex justify-between ">
            <a href="/" id="back-button" class="bg-green-600 text-white px-8 py-2 rounded focus:outline-none">Back</a>
            <button type="submit" id="submit-button" class="bg-green-600 text-white px-6 py-2 rounded focus:outline-none" onclick="openModal()">Submit</button>
        </div>
    </form>



    
    <!-- <form method="post" action="{{ route('reservation.store') }}" class="ml-14 mr-14">
        @csrf
        <div class="container-1 mt-10">
    <div class="container-2 border">
        <section class="section-a relative">
            <div class="bg-[#5CC273] p-2">
                <span class="text-l font-bold text-white pl-4">A. FACILITIES</span>
            </div>
            <div class="absolute inset-x-0 top-full p-4">
                <input type="hidden" name="reservedetailsID" id="reservationcode">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 mt-3" id="facilitiesContainer">
                    @foreach ($facilities as $facility)
                        <div class="mb-2 sm:col-span-1 md:col-span-1 mr-2 ml-2">
                            <label class="items-center space-x-2 l">
                                <input type="checkbox" name="facilityID[]" value="{{ $facility->facilityID }}" class="form-checkbox">
                                <span class="text-l">{{ $facility->facilityName }}</span>
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>

        <section class="section-b mt-5">
            <div class="bg-[#5CC273] p-2">
                <span class="text-l font-bold text-white pl-4">B. RESERVATION DETAILS</span>
            </div>
            <div class="flex items-center mb-5 mt-5 ml-4 mr-4">
                <label class="block w-32 text-gray-700 text-sm font-bold" for="username">Name of Event:</label>
                <input class="flex-1 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nameofevent" name="nameofevent" type="text">
            </div>
        </section>
    </div>
</div>


        <section>
            <div class="container-1">
                <div class="container-2 border mx-4">
                    <div class="relative">
                        <div class="bg-[#5CC273] p-2">
                            <span class="text-l font-bold text-white pl-4">B2. EVENT DETAILS</span>
                        </div>
                        <div class=" flex items-center mb-5 mt-5 ml-4 mr-4">
                            <div class="w-1/2 pr-4">
                            <div class="flex items-center">
                                <label class="block w-32 text-gray-700 text-sm font-bold mb-2" for="start-date">Start Date:</label>
                                <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="start-date" type="date">
                            </div>
                            </div>
                            <div class="w-1/2">
                                dfsfsd
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section>
            <div class="mt-5 lg:flex mx-4">
                <div class="w-full lg:w-1/2">
                    <div class="bg-[#5CC273] p-2">
                        <span class="text-l font-bold text-white pl-4">B3. FACILITIES & EQUIPMENT</span>
                    </div>
                    <div class=" flex items-center mb-5 mt-5 ml-4 mr-4">
                            <label class="block w-32 text-gray-700 text-sm font-bold" for="username">Name of Event:</label>
                            <input class="flex-1 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nameofevent" name="nameofevent" type="text">
                        </div>
                </div>
                <div class="w-full lg:w-1/2">
                    <div class="bg-[#5CC273] p-2">
                        <span class="text-l font-bold text-white pl-4">B4. SUPPORT PERSONNEL</span>
                    </div>

                </div>
            </div>
        </section>


        <div class="mt-4 flex justify-between ">
            <button id="back-button" class="bg-green-600 text-white px-8 py-2 rounded focus:outline-none">Back</button>
            <button type="submit" id="submit-button" class="bg-green-600 text-white px-6 py-2 rounded focus:outline-none" onclick="openModal()">Submit</button>
        </div>
        
    </form> -->


    <!-- <div id="form-content" class=" bg-white ml-14 mr-14 rounded-3xl">
                <form method="post" action="{{ route('reservation.store') }}">
                    @csrf
                    <div class="p-6 bg-white rounded border border-green-500 rounded-2xl mt-5 b">
                        <div class="p-4 bg-white rounded border-green rounded-2xl">
                            <div class="w-full h-10  border border-green-500 bg-green-700 mx-auto">
                                <div class="w-full h-3.5 flex  items-center md:ml-5">
                                    <div class="mt-6 text-white text-[15px] font-bold font-['Inter']">FACILITIES
                                    </div>
                                </div>
                            </div>
                    
                            <input type="hidden" name="reservedetailsID" id="reservationcode">
                            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 mt-5">
                                @foreach ($facilities as $facility)
                                    <div class="mb-2 sm:col-span-1 md:col-span-1 mr-2 ml-2">
                                        <label class="flex items-center space-x-2">
                                        <input type="checkbox" name="facilityID[]" value="{{ $facility->facilityID }}" class="form-checkbox">
                                            <span>{{ $facility->facilityName }}</span>
                                        </label>
                                    </div>
                                @endforeach
                    </div>
                    <div class="p-4 mt-5 bg-white rounded border-green rounded-2xl  ">
                        <div class="w-full h-10 bg-green-700 mx-auto ">
                            <div class="w-full h-3.5 flex items-center md:ml-5">
                                <div class="mt-6 text-white text-[15px] font-bold font-['Inter']">RESERVATION DETAILS</div>
                            </div>
                        </div>
                        <div class="bg-white rounded border-green rounded-2xl mx-auto ">
                        <div class=" flex items-center mb-5">
                            <label class="block w-32 text-gray-700 text-sm font-bold" for="username">Name of Event:</label>
                            <input class="flex-1 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="nameofevent" name="nameofevent" type="text">
                        </div>

                        <div class="w-full h-10 bg-green-700 mx-auto ">
                            <div class="w-full h-3.5 flex items-center md:ml-5">
                                <div class="mt-6 text-white text-[15px] font-bold font-['Inter']">Event Details</div>
                            </div>
                        </div>
                    </div>
                    <div class="mt-4 flex justify-between ml-14 mr-14 ">
                        <button id="back-button" class="bg-green-600 text-white px-8 py-2 rounded focus:outline-none">Back</button>
                        <button type="submit" id="submit-button" class="bg-green-600 text-white px-6 py-2 rounded focus:outline-none" onclick="openModal()">Submit</button>
                    </div>
                </form>
            </div>
        </div>
             -->


    
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