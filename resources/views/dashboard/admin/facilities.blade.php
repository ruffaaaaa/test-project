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
                        <a href="index1" class="flex items-center bg-white rounded-xl font-bold text-sm text-black py-3 px-4 hover:bg-green-50">
                            <span class="icon">
                                <!-- Replace the SVG code with your desired icon -->
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-6 h-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 16.875h3.375m0 0h3.375m-3.375 0V13.5m0 3.375v3.375M6 10.5h2.25a2.25 2.25 0 002.25-2.25V6a2.25 2.25 0 00-2.25-2.25H6A2.25 2.25 0 003.75 6v2.25A2.25 2.25 0 006 10.5zm0 9.75h2.25A2.25 2.25 0 0010.5 18v-2.25a2.25 2.25 0 00-2.25-2.25H6a2.25 2.25 0 00-2.25 2.25V18A2.25 2.25 0 006 20.25zm9.75-9.75H18a2.25 2.25 0 002.25-2.25V6A2.25 2.25 0 0018 3.75h-2.25A2.25 2.25 0 0013.5 6v2.25a2.25 2.25 0 002.25 2.25z" />
                                </svg>
                            </span>
                            <span class="text ml-3">Dashboard</span>
                        </a>
                    </li>
                    <li>
                        <a href="facilities" class="flex bg-green-600  rounded-xl font-bold text-sm text-white py-3 px-4 ">
                            <span class="icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" class="text-lg mr-4" viewBox="0 0 16 16">
                                    <path d="M12 0H4a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM5 4h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1zm-.5 2.5A.5.5 0 0 1 5 6h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1-.5-.5zM5 8h6a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1zm0 2h3a.5.5 0 0 1 0 1H5a.5.5 0 0 1 0-1z" />
                                </svg>
                            </span>
                            <span class="text">Facilities</span>
                        </a>
                    </li>
                    <!-- Add more sidebar items with hover effects as needed -->
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
    </aside>
 
  <main class="ml-60 p-8 max-h-screen w-auto">
        <button id="toggleSidebar" class=" -ml-12 absolute p-2 bg-green-600 rounded-full text-white">
            <svg xmlns="http://www.w3.org/2000/svg" width="1em" height="1em" fill="currentColor" viewBox="0 0 16 16">
                <path d="M3 0h10a1 1 0 0 1 1 1v14a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V1a1 1 0 0 1 1-1zm8 11a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
            </svg>
        </button>
        <div class="max-h-screen overflow-y-auto">
        <div class=" mx-auto">
            <div class="bg-white rounded-3xl p-8 mb-5">
                <div class="row">
                    <div class="col-md-12">
                        <div class=" mb-3 clearfix">
                            <a href="create" class="btn btn-success pull-right "></i> Add New Facility</a>
                        </div>
                    </div>
                </div>
            <div>
            <div class="mb-3">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">ID</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Facility Name</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Image</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                            <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @foreach ($facilities as $facility)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-center">{{ $facility->facilityID }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">{{ $facility->facilityName }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                    <img src="{{ asset('uploads/facilities/' . $facility->image) }}" alt="Facility Image"  class="h-8 w-15">
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">{{ $facility->status }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-center">
                                <button class="border border-red-500 text-blue-500 px-4 py-1 rounded hover:border-red-600 hover:bg-blue-500 hover:text-white ml-2 editButton">
                                    Edit
                                </button>
                                <form method="POST" action="{{ route('facilities.destroy', $facility->facilityID) }}" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="border border-red-500 text-red-500 px-3 py-1 rounded hover:bg-red-500 hover:text-white ml-2">
                                        Delete
                                    </button>
                                </form>                          
                                

                                </td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div id="editModal" class="fixed z-10 inset-0 overflow-y-auto hidden">
                    <div class="flex items-center justify-center min-h-screen">
                        <div class="transition-opacity">
                            <div class="absolute inset-0 bg-gray-500 opacity-75"></div>
                        </div>
                        <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>
                        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:align-middle sm:max-w-lg sm:w-full">
                            <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                                <div class="sm:flex sm:items-start">
                                    <div class="mt-3 text-center sm:mt-0 sm:ml-4 sm:text-left w-full">
                                        <a href="/" class="-mt-8">
                                            <img src="/images/lsu-logo 2.png"  class=" mx-auto w-10 h-30" />
                                        </a>
                                        <h3 class="text-lg leading-6 font-medium text-gray-900">Facility</h3>
                                        <form id="editForm" method="POST">
                                            @csrf
                                            @method('PUT')
                                            <input type="hidden" id="editFacilityID" name="facilityID">
                                            <div class="mt-2">
                                                <label for="editFacilityName" class="block text-gray-600 text-left font-bold ">Facility Name</label>
                                                <input type="text" id="editFacilityName" name="facilityName" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 h-10">
                                                <!-- Increase the height by adding the 'h-10' class -->
                                            </div>
                                            <div class="mt-2">
                                                <label for="editStatus" class="block text-gray-600 text-left font-bold">Status</label>
                                                <select id="editStatus" name="status" class="w-full border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500 h-10">
                                                    <!-- Increase the height by adding the 'h-10' class -->
                                                    <option value="Available">Available</option>
                                                    <option value="Unavailable">Unavailable</option>
                                                </select>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                                <button type="submit" form="editForm" class="inline-flex justify-center w-full  border rounded-md border-transparent px-4 py-2 bg-green-600 text-base font-medium text-white focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:ml-3 sm:w-auto sm:text-sm">Update</button>
                                <button id="closeModal" class=" inline-flex justify-center rounded-md border border-gray-300 px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:w-auto sm:text-sm">Cancel</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>    
    </main>
    <script src="/js/index.js"></script>
    

   
</body>
</html>
