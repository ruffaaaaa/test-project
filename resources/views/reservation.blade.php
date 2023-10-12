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
            <div class="container mx-auto flex items-center justify-between py-4 px-6">
                <a class="flex items-center" href="/">
                    <img src="/images/lsu-logo 2.png" alt="Logo" class="h-12 mr-4">
                    <span class="text-green-600 font-bold mr lg:block hidden">LA SALLE UNIVERSITY</span>
                </a>
            </div>
    </nav>
    <section class=" ml-10 mr-10">
    

    
<div class="relative">
    <div class="left-title"></div>
    <div class="absolute top-0 left-0 mt-24 ml-5">
        <span class="text-3xl font-bold text-white">FACILITIES RESERVATION FORM</span>
    </div>

</div>




</section>




</body>
</html>
