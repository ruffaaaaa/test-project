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
    <link href="/css/custom.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="relative bg-green-50 overflow-hidden max-h-screen">
    <aside class="fixed inset-y-0 left-0 bg-white shadow-md max-h-screen w-60" id="sidebar">
        <div class="flex flex-col justify-between h-full">
            <div class="flex-grow">
                <div class="px-4 py-6 text-center border-b">
                    <img src="/images/lsu-logo 2.png" alt="Logo" class="mx-auto h-12 mb-1">
                    <h1 class="text-xl font-bold leading-none text-green-600 text">
                        <!-- Display this text when not collapsed -->
                        <span class="collapsed:hidden">FACILITIES RESERVATION SYSTEM</span>
                    </h1>
                </div>
                <div class="p-4">
                    <ul class="space-y-1">
                    <li>
                      <a href="index1" class="flex items-center bg-green-600 rounded-xl font-bold text-sm text-white py-3 px-4">
                          <span class="icon">
                              <!-- Replace the SVG code with your desired icon -->
                              <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 16.875h3.375m0 0h3.375m-3.375 0V13.5m0 3.375v3.375M6 10.5h2.25a2.25 2.25 0 002.25-2.25V6a2.25 2.25 0 00-2.25-2.25H6A2.25 2.25 0 003.75 6v2.25A2.25 2.25 0 006 10.5zm0 9.75h2.25A2.25 2.25 0 0010.5 18v-2.25a2.25 2.25 0 00-2.25-2.25H6a2.25 2.25 0 00-2.25 2.25V18A2.25 2.25 0 006 20.25zm9.75-9.75H18a2.25 2.25 0 002.25-2.25V6A2.25 2.25 0 0018 3.75h-2.25A2.25 2.25 0 0013.5 6v2.25a2.25 2.25 0 002.25 2.25z" />
                              </svg>
                          <span class="text ml-3">Dashboard</span>
                      </a>
                  </li>

                        <li>
                            <a href="facilities" class="flex bg-white hover:bg-yellow-50 rounded-xl font-bold text-sm text-gray-900 py-3 px-4">
                                <span class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="text-lg mr-4" viewBox="0 0 16 16">
                                    <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM5 4h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1zm0 2h3a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1z"/>
                                    </svg>
                                </span>
                                <span class="text">Facilities</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="p-4">
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <button type="sumbit" class="inline-flex items-center justify-center h-9 py-2 px-3  rounded-xl bg-green-600 text-gray-300 hover:text-white text-sm font-semibold transition">
                        <span class="icon">
                            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="ml-2" viewBox="0 0 16 16">
                                <path d="M12 1a1 1 0 0 1 1 1v13h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V2a1 1 0 0 1 1-1h8zm-2 9a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                            </svg>
                        </span>
                    </button> <span class="text font-bold text-sm ml-2">Logout</span>
                </form>
            </div>  
        </div>
    </aside>
    <main class="ml-60 p-8">
        <button id="toggleSidebar" class=" -ml-12 absolute p-2 bg-green-600 rounded-full text-white">
            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
                <path d="M3 0h10a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V1a1 1 0 0 1 1-1zm8 11a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
            </svg>
        </button>
        <h2 class="text-2xl font-semibold mb-4">Dashboard</h2>
        <div class="bg-white rounded-lg shadow-lg p-6">
            <p>Welcome to the Facilities Reservation System Dashboard. You can customize and add your content here.</p>
        </div>
    </main>
    <script src="/js/index.js"></script>
</body>
</html>
