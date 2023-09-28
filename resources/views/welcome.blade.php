<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="/css/styles.css">

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <!-- Add these lines to your HTML file's <head> section -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
</head>

<body class="bg-[#E5EFE8]">
    <nav class>
        <div class="container mx-auto flex items-center justify-between py-4 px-6">
            <a class="flex items-center" href="#">
                <img src="/images/lsu-logo 2.png" alt="Logo" class="h-12 mr-4">
                <span class="text-green-600 font-bold mr lg:block hidden">LA SALLE UNIVERSITY</span>
            </a>

            <div class="lg:hidden">
                <a href="login" class="text-black hover:text-blue-300 focus:outline-none">
                    <span><img src="/images/usericon.png" class="h-10"></span>
                </a>
            </div>
            <div class="hidden lg:inline-block text-black hover:text-blue-300 relative group">
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
                        <span class="text-xl md:text-2xl mt-3" style="font-family: 'Times New Roman', Times, serif; color: green;">Reshaping Futures.</span>
                    </div>
                </div>

            </div>

            <div class=" lg:hidden md:hidden bg-center h-96 rounded-2xl relative bg-no-repeat bg-cover relative" style="background-image: url('/images/bg-default.png');margin-left: 20px;margin-right:20px;">
                <div class="md:absolute md:inset-0 flex flex-col items-center ">
                    <img src="images/lsu-logo 2.png" style="height: 90px;" class="mt-7">
                    <span class="text-4xl md:text-7xl text-green mt-5" style="font-family: 'Times New Roman', Times, serif; color: green;">La Salle University</span>
                    <span class="text-xl md:text-2xl mt-3" style="font-family: 'Times New Roman', Times, serif; color: green;">This is where your LSU experience begins.</span>
                    <div>
                        <div class=" bottom-0 left-0 right-0 p-4 flex flex-col items-center mt-6">
                        <a href="#" class="bg-green-600 text-white font-semibold py-2 px-4 rounded-full hover:bg-white hover:text-black transition duration-300 ease-in-out w-full mb-2 sm:block">RESERVATION</a>
                        <a href="#" class="bg-green-600 text-white font-semibold py-2 px-4 rounded-full hover:bg-white hover:text-black transition duration-300 ease-in-out w-full">CHECK STATUS</a>
                        </div>
                    </div>
                </div>   

            </div>
        
            <div class="hidden md:block container mx-auto h-full md:relative md:mt-10">
                <div class="md:absolute md:inset-0 flex flex-col justify-end items-center">
                    <div class="bg-white p-3 md:p-5 rounded-full md:w-96 md:m-auto md:mt-4">
                        <div class="flex flex-col md:flex-row md:space-x-4 justify-center">
                            <a href="#" class="bg-white-500 hover:bg-green-600 text-black hover:text-white font-semibold py-2 px-3 md:py-2 md:px-4 rounded-full transition duration-300 ease-in-out mt-2 md:mt-0">RESERVATION</a>
                            <a href="#" class="bg-white-500 hover:bg-green-600 text-black hover:text-white font-semibold py-2 px-3 md:py-2 md:px-4 rounded-full transition duration-300 ease-in-out mt-2 md:mt-0">CHECK STATUS</a>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    
    <section class="m-10">
    <div class="flex flex-col items-center mt-9">
        <span class="text-xl md:text-2xl mt-3 text-green-600 font-bold">FACILITIES</span>
    </div>

    <div class="swiper-container mt-5">
        <div class="swiper-wrapper">
            @foreach ($facilities as $facility)
                <div class="swiper-slide w-1/1 md:w-1/2 lg:w-1/3 xl:w-1/4 min-w-1/4">
                    <img src="{{ asset('uploads/facilities/' . $facility->image) }}" alt="Facility Image" class="w-full rounded-2xl">
                    <p class="text-2xl font-bold text-green-600">{{ $facility->facilityName }}</p>
                </div>
            @endforeach
        </div>
    </div>
</section>

<style>
    .swiper-container {
        overflow-x: hidden;
    }
</style>

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
</script>



    
</body>
</html>
