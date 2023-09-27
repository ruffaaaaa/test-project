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
</head>

<body class="bg-[#E5EFE8]">
    <nav class>
            <div class="container mx-auto flex items-center justify-between py-4 px-6">
                <a class="flex items-center" href="#">
                    <img src="/images/lsu-logo 2.png" alt="Logo" class="h-12 mr-4">
                    <span class="text-green-600 font-bold mr">LA SALLE UNIVERSITY</span>
                </a>

                <div class="lg:hidden">
    
                        <a href="login" class="text-black hover:text-blue-300 focus:outline-none">
                            <span><img src="/images/usericon.png"  class="h-10 mr-2"></span>
                        </a>

                </div>
                <div class="hidden lg:inline-block text-black hover:text-blue-300 relative group">
                    <a href="login" class="text-black hover:text-blue-300 focus:outline-none">
                        <span class = "text-green-600 font-bold">Admin</span>
                    </a>
                </div>
            </div>
        </nav>
    
    <section>
    <!-- Mobile Background -->
    <div class="md:hidden max-w-xs mx-auto h-screen flex items-center justify-center bg-center rounded-2xl relative bg-no-repeat bg-cover" style="background-image: url('/images/mobile-view.png'); width: 500px; height: 400px;">
        <div class=" bottom-0 left-0 right-0 p-4 flex flex-col items-center mt-40">
            <a href="#" class="bg-green-600 text-white font-semibold py-2 px-4 rounded-full hover:bg-white-600 hover:text-black transition duration-300 ease-in-out w-full mb-2">RESERVATION</a>
            <a href="#" class="bg-green-600 text-white font-semibold py-2 px-4 rounded-full hover:bg-white-600 hover:text-black transition duration-300 ease-in-out w-full">CHECK STATUS</a>
        </div>
    </div>

    
    <!-- Large Screen -->
    <div class="hidden lg:block bg-center h-96 rounded-2xl relative bg-no-repeat bg-cover relative md:ml-12 md:mr-12" style="background-image: url('/images/bg.png')"></div>

        <div class="container mx-auto h-full md:relative md:mt-10">
            <div class="md:absolute md:inset-0 flex flex-col justify-end items-center">
                <div class=" hidden lg:block bg-white p-5 rounded-full md:w-96 md:m-auto md:mt-4">
                    <div class="flex flex-col md:flex-row md:space-x-4 justify-center">
                        <a href="#" class="bg-white-500 hover:bg-green-600 text-black hover:text-white font-semibold py-2 px-4 rounded-full transition duration-300 ease-in-out mt-2 md:mt-0 md:underline">RESERVATION</a>
                        <a href="#" class="bg-white-500 hover:bg-green-600 text-black hover:text-white font-semibold py-2 px-4 rounded-full transition duration-300 ease-in-out mt-2 md:mt-0 md:underline">CHECK STATUS</a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>


    
</body>
</html>
