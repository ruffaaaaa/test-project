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

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        @media (max-width: 640px) {
            .hidden-sm {
                display: block !important;
            }
            .hidden-md {
                display: none !important;
            }
            .hidden-lg {
                display: none !important;
            }
        }
    </style>

</head>

<body class="bg-[#E5EFE8]">
    <nav class>
        <div class="container mx-auto flex items-center justify-between py-4 px-6">
            <a class="flex items-center" href="#">
                <img src="/images/lsu-logo 2.png" alt="Logo" class="h-12 mr-4">
                <span class="text-green-600 font-bold mr">LA SALLE UNIVERSITY</span>
            </a>

            <div class="lg:hidden">
            
                @auth
                    <a href="login" class="text-black hover:text-blue-300 focus:outline-none">
                        <span><img src="/images/usericon.png"  class="h-10 mr-2"></span>
                    </a>
                @else
                    <a href="/admin" class="text-black hover:text-blue-300 focus:outline-none">
                        <span class = "text-green-600 font-bold">Admin</span>
                    </a>
                @endauth
            </div>
            <div class="hidden lg:inline-block text-black hover:text-blue-300 relative group">
                <a href="login" class="text-black hover:text-blue-300 focus:outline-none">
                    <span class = "text-green-600 font-bold">Admin</span>
                </a>
            </div>
        </div>
    </nav>
    
        <section class="bg-no-repeat bg-cover relative ml-12 mr-12 ">
        <!-- <div class="hidden sm:block md:hidden bg-cover bg-center h-96" style="background-image: url('/images/mobile-view.png');">
            <div class="container mx-auto h-full relative">
                <div class="background-desktop-content text-center absolute inset-0 flex flex-col justify-end items-center">
                    <a href="#" role="button" id="reservation-btn"
                        class="bg-green-700 text-white font-bold py-2 px-4 rounded-lg
                                w-48 text-center hover:bg-green-800 focus:outline-none">
                        RESERVATION
                    </a>
                    <br>
                    <a href="#" role="button" id="check-status-btn"
                        class="bg-white text-green-700 font-bold py-2 px-4 rounded-lg
                                w-48 text-center hover:text-white hover:bg-green-700 focus:outline-none mb-8">
                        CHECK STATUS
                    </a>
                </div>
            </div>
        </div> -->

  
    <div class="hidden lg:block bg-center h-96 rounded-2xl " style="background-image: url('/images/bg.png')">
        <div class="container mx-auto h-full relative">
            <div class="background-desktop-content text-center absolute inset-0 flex flex-col justify-end items-center">
                <a href="#" role="button" id="reservation-btn"
                    class="bg-green-700 text-white font-bold py-2 px-4 rounded-lg
                            w-48 text-center hover:bg-green-800 focus:outline-none">
                    RESERVATION
                </a>
                <br>
                <a href="#" role="button" id="check-status-btn"
                    class="bg-white text-green-700 font-bold py-2 px-4 rounded-lg
                            w-48 text-center hover:text-white hover:bg-green-700 focus:outline-none mb-12">
                    CHECK STATUS
                </a>
            </div>
        </div>
    </div>
</section>
    
    <section >
        
    </section>







</div>
</body>
</html>
