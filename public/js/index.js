const sidebar = document.getElementById('sidebar');
const toggleButton = document.getElementById('toggleSidebar');
const mainContent = document.querySelector('main');

// Function to toggle the sidebar collapsed state
function toggleSidebar() {
    sidebar.classList.toggle('collapsed');
    mainContent.classList.toggle('collapsed');

    // Store the current sidebar state in sessionStorage
    const isCollapsed = sidebar.classList.contains('collapsed');
    sessionStorage.setItem('sidebarCollapsed', isCollapsed);
}

toggleButton.addEventListener('click', toggleSidebar);

// Check if the sidebar state is stored in sessionStorage
const storedSidebarState = sessionStorage.getItem('sidebarCollapsed');

// Apply the stored state to the sidebar and main content
if (storedSidebarState === 'true') {
    sidebar.classList.add('collapsed');
    mainContent.classList.add('collapsed');
} else {
    sidebar.classList.remove('collapsed');
    mainContent.classList.remove('collapsed');
}

// Get modal element and Edit buttons
var modal = document.getElementById('editModal');
var editButtons = document.querySelectorAll('.editButton');
var editForm = document.getElementById('editForm'); // Get the edit form

// Get form elements to populate
var editFacilityIDField = document.getElementById('editFacilityID');
var editFacilityNameField = document.getElementById('editFacilityName');
var editStatusField = document.getElementById('editStatus')

// Loop through each Edit button
// Loop through each Edit button
editButtons.forEach(function(button) {
    button.addEventListener('click', function() {
        // Extract data from the row (you may need to adjust this based on your actual HTML structure)
        var row = button.closest('tr');
        var facilityID = row.querySelector('td:nth-child(1)').textContent;
        var facilityName = row.querySelector('td:nth-child(2)').textContent;
        var status = row.querySelector('td:nth-child(4)').textContent;

        // Populate the form fields
        editFacilityIDField.value = facilityID;
        editFacilityNameField.value = facilityName;

        // Set the form action dynamically
        editForm.action = '/facilities/' + facilityID; // Use the correct URL pattern

        // Set the selected option in the select input based on the status value
        var options = editStatusField.options;
        for (var i = 0; i < options.length; i++) {
            if (options[i].value === status) {
                options[i].selected = true;
            } else {
                options[i].selected = false;
            }
        }

        // Remove the 'hidden' class to show the modal
        modal.classList.remove('hidden');
    });
});
// Close the modal when the cancel button is clicked
var closeModalButton = document.getElementById('closeModal');
closeModalButton.addEventListener('click', function() {
// Add the 'hidden' class to hide the modal
modal.classList.add('hidden');
});