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

<body class="bg-[#E5EFE8]">
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
    
    <section>
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
                        <div class=" bottom-0 left-0 right-0 p-4 flex flex-col items-center mt-6">
                        <a href="reservation" class="bg-green-600 text-white font-semibold py-2 px-4 rounded-full hover:bg-white hover:text-black transition duration-300 ease-in-out w-full mb-2 sm:block">RESERVATION</a>
                        <button class="bg-green-600 text-white font-semibold py-2 px-4 rounded-full hover:bg-white hover:text-black transition duration-300 ease-in-out w-full openBtn">CHECK STATUS</button>
                        </div>
                    </div>
                </div>   

            </div>
        
            <div class="hidden md:block container mx-auto h-full md:relative md:mt-10">
                <div class="md:absolute md:inset-0 flex flex-col justify-end items-center">
                    <div class="bg-white p-3 md:p-5 rounded-full md:w-96 md:m-auto md:mt-4">
                        <div class="flex flex-col md:flex-row md:space-x-4 justify-center">
                            <a href="reservation" class="bg-white-500 hover:bg-green-600 text-black hover:text-white font-semibold py-2 px-3 md:py-2 md:px-4 rounded-full transition duration-300 ease-in-out mt-2 md:mt-0">RESERVATION</a>
                            <button id="checkStatusBtn" class="bg-white-500 hover:bg-green-600 text-black hover:text-white font-semibold py-2 px-3 md:py-2 md:px-4 rounded-full transition duration-300 ease-in-out mt-2 md:mt-0">CHECK STATUS</button>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    
    <section class="m-10 -mb-5">
        <div class="flex flex-col items-center mt-9">
            <span class="text-xl md:text-2xl mt-3 text-green-600 font-bold">FACILITIES</span>
        </div>

        <div class="swiper-container mt-5">
            <div class="swiper-wrapper">
                @foreach ($facilities as $facility)
                    <div class="swiper-slide w-1/1 md:w-1/2 lg:w-1/3 xl:w-1/4 min-w-1/4 fixed">
                        <div class="image-container relative">
                            <img src="{{ asset('uploads/facilities/' . $facility->image) }}" alt="Facility Image" class="w-full rounded-2xl h-30 w-15">
                            <div class="overlay absolute top-0 left-0 w-full h-full flex justify-center items-center opacity-0 transition-opacity duration-300 hover:opacity-100">
                                <p class="text-2xl font-bold text-white">{{ $facility->facilityStatus }}</p>
                            </div>
                        </div>
                        <p class="text-2xl font-bold text-green-600 text-center">{{ $facility->facilityName }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- <section class = "-mt-1">
        <div class="flex flex-col items-center">
            <span class="text-xl md:text-2xl mt-3 text-green-600 font-bold">CALENDAR</span>
        </div>
    </section> -->

    <div class="hidden fixed inset-0 flex items-center justify-center overflow-auto z-50 w-90" id="statusModal">
        <div class="transition-opacity">
                <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
        </div>
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:align-middle sm:max-w-lg sm:w-full">
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
                            <p id="statusDisplay" class="text-2xl mt-5 font-bold text-green-700 uppercase "></p>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>            

    <footer class = "mt-10">
        <div class="border-t border-solid border-green-600" style="border-top: 30px solid green; display: flex; justify-content: center; align-items: center;">
            <img src="/images/polygon.png" class="-mt-12">
        </div>
        <div class="flex flex-col lg:flex-row ml-14 mr-14 mt-6" >
            <div class="w-full lg:w-1/3 pl-2 pr-2 ">
                dd
            </div>
            <div class="w-full lg:w-1/3 pl-2 pr-2 ">
                dd
            </div>
            <div class="w-full lg:w-1/3 pl-2 pr-2 ">
                dd
            </div>
        </div>
    </footer>

<script>
    // Your existing Swiper initialization code
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
