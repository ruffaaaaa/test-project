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

    <div class=" hidden md:inline container mx-auto p-4 ">
        <div id="form-progress" class=" ml-14 mr-14 rounded-xl flex items-center justify-center space-x-4 bg-white">
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
                <label class="hidden md:inline md:-mr-10 md:-ml-10 mb-5" >Reservee Details <br>and Endorsement</label>
            </div>
            <!-- <div class="line hidden md:block md:w-1/4"></div> -->
            <!-- <div class="step">
                <span class="md:mr-4 ">4</span>
                <label class="hidden md:inline md:-mr-10 md:-ml-10">Confirmation</label>
            </div> -->
        </div>
    </div>
    <div id="form-content" class=" bg-white ml-14 mr-14 rounded-3xl">
        <div class="step-content mt-" id="step-1-content">
            <div class="p-6 bg-white rounded border-green rounded-2xl">
                <div class="p-4 mt-5 bg-white rounded border-green rounded-2xl  ">
                    <div class="w-full h-10 bg-green-700 mx-auto ">
                        <div class="w-full h-3.5 flex items-center md:ml-5">
                            <div class="mt-6 text-white text-[15px] font-bold font-['Inter']">FACILITIES
                            </div>
                        </div>
                    </div>
                    <form method="post">
                        @csrf
                        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-4 gap-4 mt-5">
                            @foreach ($facilities as $facility)
                                <div class="mb-2 sm:col-span-1 md:col-span-1">
                                    <label class="flex items-center space-x-2">
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
        <div class="step-content hidden mr-10 ml-10" id="step-2-content">
            <div class="p-4 mt-5 bg-white rounded border-green rounded-2xl  ">
                <div class="w-full h-10 bg-green-700 mx-auto ">
                    <div class="w-full h-3.5 flex items-center md:ml-5">
                        <div class="mt-6 text-white text-[15px] font-bold font-['Inter']">RESERVATION DETAILS</div>
                    </div>
                </div>
            <div class="p-4 bg-white rounded border-green rounded-2xl mx-auto ">
            <div class=" flex items-center mb-5">
                <label class="block w-32 text-gray-700 text-sm font-bold" for="username">Name of Event:</label>
                <input class="flex-1 shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text">
            </div>

                <!-- <div class="lg:hidden md:hidden mt-5 mr-5 ml-5 mb-5">
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                            Name of Event
                        </label>
                        <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="username" type="text">
                    </div>
                </div> -->
                <div class="w-full h-10 bg-green-700 mx-auto ">
                    <div class="w-full h-3.5 flex items-center md:ml-5">
                        <div class="mt-6 text-white text-[15px] font-bold font-['Inter']">Event Details</div>
                    </div>
                </div>
                <div class="mt-5 mx-5 flex">
                    <div class="w-1/2">
                        <div class="flex items-center">
                            <label class="block w-32 text-gray-700 text-sm font-bold mb-2" for="start-date">Start Date:</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="start-date" type="date">
                        </div>
                        <div class="flex items-center mt-2">
                            <label class="block w-32 text-gray-700 text-sm font-bold mb-2" for="end-date">End Date:  </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="end-date" type="date">
                        </div>
                        <div class="flex items-center mt-2">
                            <label class="block w-32 text-gray-700 text-sm font-bold mb-2" for="end-date">Max. number of attendees  </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"  type="text">
                        </div>
                        <div class="flex items-center">
                            <label class="block w-32 text-gray-700 text-sm font-bold mb-2" for="start-date">Preparation Date:</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="start-date" type="date">
                        </div>
                        <div class="flex items-center mt-2">
                            <label class="block w-32 text-gray-700 text-sm font-bold mb-2" for="end-date">Clean-up Date:  </label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="end-date" type="date">
                        </div>
                    </div>
                    <div class="w-1/2 ml-5">
                        <div class="flex items-center">
                            <label class="block w-32 text-gray-700 text-sm font-bold mb-2" for="start-time">Start Time:</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="start-time" type="time">
                        </div>
                        <div class="flex items-center mt-2">
                            <label class="block w-32 text-gray-700 text-sm font-bold mb-2" for="end-time">End Time:</label>
                            <input class="shadow appearance-none border rounded w-full py-3 px-4 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="end-time" type="time">
                        </div>
                        <div class="flex items-center mt-2">
                            <label class="block w-32 text-gray-700 text-sm font-bold mb-2" for="end-date">  </label>
                            <input class= " py-2 px-3">
                        </div>
                        <div class="flex items-center">
                            <label class="block w-32 text-gray-700 text-sm font-bold mb-2" for="start-time">Preparation Time Range:</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="time-range" type="text" placeholder="e.g., 1:00pm to 2:00pm">
                        </div>
                        <div class="flex items-center">
                            <label class="block w-32 text-gray-700 text-sm font-bold mb-2" for="time-range">Clean-up Time Range:</label>
                            <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="time-range" type="text" placeholder="e.g., 1:00pm to 2:00pm">
                        </div>

                    </div>
                </div>
                <div class="mt-5 mx-5 flex">
                    <div class="w-1/2">
                        <!-- Add this within the step-2-content div -->
                        <div class="w-full h-10 bg-green-700 mx-auto">
                            <div class="w-full h-3.5 flex items-center md:ml-5">
                                <div class="mt-6 text-white text-[15px] font-bold font-['Inter']">No. of Regular Personnel</div>
                            </div>
                        </div>
                        <div class="w-full mt-5">
                            @foreach ($personnels as $personnel)
                                <div class="mb-2 flex items-center space-x-2">
                                    <label class="flex items-center">
                                        <input type="checkbox" class="form-checkbox personnel-checkbox" name="personnels[]" value="{{ $personnel->id }}">
                                        <span>{{ $personnel->personnelName }}</span>
                                    </label>
                                    <input type="text" name="personnel_details[{{ $personnel->id }}]" class="px-3 py-2 border rounded" placeholder="Details">
                                </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="w-1/2 ml-5">
                        <div class="w-full h-10 bg-green-700 mx-auto ">
                            <div class="w-full h-3.5 flex items-center md:ml-5">
                                <div class="mt-6 text-white text-[15px] font-bold font-['Inter']"> Equipment</div>
                            </div>
                        </div>
                        <div class="w-full mt-5">
                            
                        </div>
                    </div>
                </div>
                <div>
                    <div class="w-full h-10 bg-green-700 mx-auto">
                        <div class="w-full h-3.5 flex items-center md:ml-5">
                            <div class="mt-6 text-white text-[15px] font-bold font-['Inter']">Attachments</div>
                        </div>
                    </div>
                </div>
                <div class="p-4 bg-white rounded border-green rounded-2xl">
                    <input type="file" id="attachments" name="attachments" multiple class="hidden">
                    <label for="attachments" class="inline-block bg-green-100 text-green-700 rounded-full w-10 h-10 text-center cursor-pointer">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6 m-auto mt-2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18.375 12.739l-7.693 7.693a4.5 4.5 0 01-6.364-6.364l10.94-10.94A3 3 0 1119.5 7.372L8.552 18.32m.009-.01l-.01.01m5.699-9.941l-7.81 7.81a1.5 1.5 0 002.112 2.13" />
                        </svg>
                    </label>
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
    <div class="mt-4 flex justify-between ml-14 mr-14 mb-10">
        <button id="prev-button" class="bg-green-600 text-white px-4 py-2 rounded focus:outline-none">Previous</button>
        <button id="next-button" class="bg-green-600 text-white px-7 py-2 rounded focus:outline-none">Next</button>
    </div>

<script src="/js/reservation.js"></script>

<script>
    const personnelCheckboxes = document.querySelectorAll('.personnel-checkbox');
    
    personnelCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            const detailsInput = this.parentNode.querySelector('input[type="text"]');
            if (this.checked) {
                detailsInput.classList.remove('hidden');
            } else {
                detailsInput.classList.add('hidden');
            }
        });
    });
</script>


</body>
</html>