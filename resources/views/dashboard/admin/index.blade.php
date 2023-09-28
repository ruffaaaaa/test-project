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
        <link href="/css/app.css" rel="stylesheet">
        <style>
            ::-webkit-scrollbar {
                width: .5rem;
                height: .5rem;
            }
            ::-webkit-scrollbar-thumb {
                background: rgba(0,0,0,.15);
            }
            ::-webkit-scrollbar-thumb:hover {
                background: rgba(0,0,0,.3);
            }
            </style>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <!DOCTYPE html>
<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title></title>
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.15/tailwind.min.css'><link rel="stylesheet" href="./style.css">

</head>
<body class="relative bg-green-50 overflow-hidden max-h-screen">

  <aside class="fixed inset-y-0 left-0 bg-white shadow-md max-h-screen w-60">
    <div class="flex flex-col justify-between h-full">
      <div class="flex-grow">
        <div class="px-4 py-6 text-center border-b">
        <img src="/images/lsu-logo 2.png" alt="Logo" class="mx-auto h-12 mb-1">          
        <h1 class="text-xl font-bold leading-none"><span class="text-green-600">FACILITIES RESERVATION SYSTEM</h1>
        </div>
        <div class="p-4">
          <ul class="space-y-1">
            <li>
              <a href="index1" class="flex items-center bg-green-600 rounded-xl font-bold text-sm text-white py-3 px-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="text-lg mr-4" viewBox="0 0 16 16">
                  <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-3.5-7h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5v-1a.5.5 0 0 1 .5-.5z"/>
                </svg>Dashboard
              </a>
            </li>
            <li>
              <a href="facilities" class="flex bg-white hover:bg-yellow-50 rounded-xl font-bold text-sm text-gray-900 py-3 px-4">
                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="text-lg mr-4" viewBox="0 0 16 16">
                  <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM5 4h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1zm0 2h3a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1z"/>
                </svg>Facilities
              </a>
            </li>   
          </ul>
        </div>
      </div>
      <div class="p-4">
      <form method="POST" action="{{ route('logout') }}">
        @csrf <!-- Include the CSRF token -->
        <button type="submit" class="inline-flex items-center mx-auto justify-center h-9 px-4 rounded-xl bg-green-600 text-white hover:text-white text-sm font-semibold transition">
            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
                <path d="M12 1a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2a1 1 0 0 1 1-1h8zm-2 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
            </svg>
        </button>
      </form>

    </div>
  </aside>

  
</body>
<!-- partial -->
</html>
