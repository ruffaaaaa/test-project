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

<body>
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
</body>
</html>