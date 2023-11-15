<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="cache-control" content="no-cache, no-store, must-revalidate">
    <meta http-equiv="pragma" content="no-cache">
    <meta http-equiv="expires" content="0">
    <title>Laravel</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-[#E5EFE8]">

    <div class="container mx-auto m-10 max-w-md">
        <a href="/" class="-mt-8">
            <img src="/images/lsu-logo 2.png"  class=" mx-auto w-10 h-30" />
        </a>
        <h1 class="text-xl font-bold text-green-600 text-black m-2">ADD NEW EQUIPMENT</h1>
        <div class="mx-auto p-4 bg-white rounded-3xl max-w-md"> <!-- Added max-w-md -->
            <form action="{{ route('equipment_save') }}" method="POST" enctype="multipart/form-data">

                @csrf
            @if(session('success'))
                <div class="bg-green-200 text-green-800 rounded-md p-2 mb-4">
                    {{ session('success') }}
                </div>
            @endif
                <div class="mb-4">
                    <label for="equipmentName" class="block text-gray-700 font-bold mb-2 ">Equipment Name</label>
                    <input type="text" class="form-input w-full border border-solid border-gray-300" id="equipmentName" name="equipmentName" required>
                </div>

                <button type="submit" class="bg-green-600 text-white font-bold py-2 px-4 rounded">Submit</a></button>
            </form>
        </div>
    </div>
</body>

</html>
