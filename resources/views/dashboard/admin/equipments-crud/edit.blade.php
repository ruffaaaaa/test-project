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
    <div id="editModal" class="fixed inset-0 flex items-center justify-center hidden">
        <div class="modal-container bg-white w-1/2 md:max-w-md mx-auto rounded shadow-lg z-50 overflow-y-auto">
            <div class="modal-content py-4 text-left px-6">
                <h2 class="text-2xl font-semibold">Edit Facility</h2>
                <!-- Your edit form goes here -->
                <form action="{{ route('facility.edit', ['facility' => $facility->id]) }}" method="POST">
                    @csrf
                    <!-- Edit form fields go here -->
                    <div class="mt-4">
                        <!-- Edit form input fields go here -->
                        <label for="facilityName" class="block font-medium text-gray-700">Facility Name</label>
                        <input type="text" id="facilityName" name="facilityName" class="mt-1 px-4 py-2 block w-full border rounded-md">
                    </div>
                    <div class="mt-4">
                        <label for="facilityImage" class="block font-medium text-gray-700">Image URL</label>
                        <input type="text" id="facilityImage" name="facilityImage" class="mt-1 px-4 py-2 block w-full border rounded-md">
                    </div>
                    <div class="mt-4">
                        <label for="facilityStatus" class="block font-medium text-gray-700">Status</label>
                        <input type="text" id="facilityStatus" name="facilityStatus" class="mt-1 px-4 py-2 block w-full border rounded-md">
                    </div>
                    <div class="mt-6 flex justify-end">
                        <button type="button" class="px-4 py-2 mr-2 text-gray-600 bg-gray-200 rounded hover:bg-gray-300" id="closeModal">Cancel</button>
                        <button type="submit" class="px-4 py-2 bg-green-600 text-white rounded hover:bg-green-700">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    </div>
</body>
<script>
        const editButton = document.querySelectorAll('.edit-button');
        const closeModalButton = document.getElementById('closeModal');
        const editModal = document.getElementById('editModal');
        const facilityNameInput = document.getElementById('facilityName');
        const facilityImageInput = document.getElementById('facilityImage');
        const facilityStatusInput = document.getElementById('facilityStatus');

        // Function to open the modal
        function openModal(event) {
            const facilityId = event.target.getAttribute('data-facility-id');
            // Use AJAX or other methods to fetch facility data based on the ID and populate the form fields
            // For simplicity, I'll assume you have the data in JavaScript

            // Example data
            const facilityData = {
                facilityName: "Facility Name",
                facilityImage: "Image URL",
                facilityStatus: "Status",
            };

            facilityNameInput.value = facilityData.facilityName;
            facilityImageInput.value = facilityData.facilityImage;
            facilityStatusInput.value = facilityData.facilityStatus;

            editModal.classList.remove('hidden');
        }

        // Function to close the modal
        function closeModal() {
            editModal.classList.add('hidden');
        }

        // Attach click event listeners to the Edit buttons
        editButton.forEach((button) => {
            button.addEventListener('click', openModal);
        });

        // Attach click event listener to the Cancel button
        closeModalButton.addEventListener('click', closeModal);
    </script>
</html>
