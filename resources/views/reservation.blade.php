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
    <!-- <div class="reservation-code"></div>
    <div class="absolute top-0 right-0 mt-24 ml-5"> 
        <span class="text-3xl font-bold text-white">Reservation Code: </span>
    </div> -->
</div>

<div class="container-1 m-8">
    <div class="container-2 border-2 border-black">
        <div class="relative">
            <div class="Facilities-Container"></div>
            <div class="bg-green-500 p-4">
                <span class="text-2xl font-bold text-white">Facilities</span>
            </div>
            <div class="absolute inset-x-0 top-full bg-white p-4 border-2 border-black">
            <table class="w-full table-auto">
                    <thead>
                        <tr>
                            <th class="border border-black p-2">Header 1</th>
                            <th class="border border-black p-2">Header 2</th>
                            <th class="border border-black p-2">Header 3</th>
                            <th class="border border-black p-2">Header 4</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Rows -->
                        <tr>
                            <td class="border border-black p-2">Row 1, Cell 1</td>
                            <td class="border border-black p-2">Row 1, Cell 2</td>
                            <td class="border border-black p-2">Row 1, Cell 3</td>
                            <td class="border border-black p-2">Row 1, Cell 4</td>
                        </tr>
                        <tr>
                            <td class="border border-black p-2">Row 2, Cell 1</td>
                            <td class="border border-black p-2">Row 2, Cell 2</td>
                            <td class="border border-black p-2">Row 2, Cell 3</td>
                            <td class="border border-black p-2">Row 2, Cell 4</td>
                        </tr>
                        <tr>
                            <td class="border border-black p-2">Row 3, Cell 1</td>
                            <td class="border border-black p-2">Row 3, Cell 2</td>
                            <td class="border border-black p-2">Row 3, Cell 3</td>
                            <td class="border border-black p-2">Row 3, Cell 4</td>
                        </tr>
                        <tr>
                            <td class="border border-black p-2">Row 4, Cell 1</td>
                            <td class="border border-black p-2">Row 4, Cell 2</td>
                            <td class="border border-black p-2">Row 4, Cell 3</td>
                            <td class="border border-black p-2">Row 4, Cell 4</td>
                        </tr>
                        <tr>
                            <td class="border border-black p-2">Row 5, Cell 1</td>
                            <td class="border border-black p-2">Row 5, Cell 2</td>
                            <td class="border border-black p-2">Row 5, Cell 3</td>
                            <td class="border border-black p-2">Row 5, Cell 4</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</section>





</body>
</html>
