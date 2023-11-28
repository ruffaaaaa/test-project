function openModal(reserveeID, reserveeName, person_in_charge_event, contact_details, unit_department_company, date_of_filing, endorsed_by, status, facilityNames, event_start_date, event_end_date,
    preparation_start_date, preparation_end_date_time, cleanup_start_date_time, cleanup_end_date_time) {
    // Get the modal element
    const modal = document.getElementById('myModal');

    // Set the modal content with the received data
    document.getElementById('reserveeID').innerText = reserveeID;
    document.getElementById('reserveeName').innerText = reserveeName;
    document.getElementById('person').innerText = person_in_charge_event;
    document.getElementById('contact').innerText = contact_details;
    document.getElementById('unit').innerText = unit_department_company;
    document.getElementById('date').innerText = date_of_filing;
    document.getElementById('endorsed').innerText = endorsed_by;
    document.getElementById('status').innerText = status;

    document.getElementById('facilityNames').innerText = facilityNames;

    // Format the event start date and time
    const formattedStartDate = new Date(event_start_date);
    const startDateString = formattedStartDate.toLocaleDateString('en-US');
    const startTimeString = formattedStartDate.toLocaleTimeString('en-US');

    // Format the event end date and time
    const formattedEndDate = new Date(event_end_date);
    const endDateString = formattedEndDate.toLocaleDateString('en-US');
    const endTimeString = formattedEndDate.toLocaleTimeString('en-US');

    // Set the modal content for start and end dates
    document.getElementById('eventDate').innerText = `${startDateString} - ${endDateString}`;
    document.getElementById('eventTime').innerText = `${startTimeString} - ${endTimeString}`;
    
    const pformattedStartDate = new Date(preparation_start_date);
    const pstartDateString = pformattedStartDate.toLocaleDateString('en-US');
    const pstartTimeString = pformattedStartDate.toLocaleTimeString('en-US');

    // Format the event end date and time
    const pformattedEndDate = new Date(preparation_end_date_time);
    const pendDateString = pformattedEndDate.toLocaleDateString('en-US');
    const pendTimeString = pformattedEndDate.toLocaleTimeString('en-US');

    // Set the modal content for start and end dates
    document.getElementById('preparationDate').innerText = `${pstartDateString} - ${pendDateString}`;
    document.getElementById('preparationTime').innerText = `${pstartTimeString} - ${pendTimeString}`;

    const cformattedStartDate = new Date(cleanup_start_date_time);
    const cstartDateString = cformattedStartDate.toLocaleDateString('en-US');
    const cstartTimeString = cformattedStartDate.toLocaleTimeString('en-US');

    // Format the event end date and time
    const cformattedEndDate = new Date(cleanup_end_date_time);
    const cendDateString = cformattedEndDate.toLocaleDateString('en-US');
    const cendTimeString = cformattedEndDate.toLocaleTimeString('en-US');

    // Set the modal content for start and end dates
    document.getElementById('cleanupDate').innerText = `${cstartDateString} - ${cendDateString}`;
    document.getElementById('cleanupTime').innerText = `${cstartTimeString} - ${cendTimeString}`;

    modal.style.display = 'block';
}

function closeModal() {
    const modal = document.getElementById('myModal');

    modal.style.display = 'none';
}


document.addEventListener("DOMContentLoaded", function() {
    var modal = document.getElementById('editModal');
    var editButtons = document.querySelectorAll('.editButton');
    var editForm = document.getElementById('editForm'); // Get the edit form

    var editReserveeIDField = document.getElementById('editReserveeID');
    var editStatusField = document.getElementById('editStatus');

    editButtons.forEach(function(button) {
        button.addEventListener('click', function() {
            var row = button.closest('tr');
            var reserveeID = row.querySelector('td:nth-child(1)').textContent.trim();
            var status = row.querySelector('td:nth-child(4)').textContent.trim();

            editReserveeIDField.value = reserveeID;
            editReserveeIDField.disabled = true; // Disable the input field


            editForm.setAttribute('action', '/admin-reservation/' + reserveeID);
            
            var options = editStatusField.options;
            for (var i = 0; i < options.length; i++) {
                if (options[i].value === status) {
                    options[i].selected = true;
                } else {
                    options[i].selected = false;
                }
            }

            modal.classList.remove('hidden');
        });
    });

    editForm.addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent default form submission

        var formData = new FormData(editForm);
        var url = editForm.getAttribute('action');

        fetch(url, {
            method: 'POST', // Change this to 'PUT' if you're submitting data to a route that handles PUT requests
            body: formData
        })
        .then(response => {
            // Handle the response as needed (e.g., show success message, close modal, etc.)
            modal.classList.add('hidden'); // Close the modal after successful submission
            location.reload(); // Refresh the page (optional)
        })
        .catch(error => {
            console.error('Error:', error);
            // Handle errors if any
        });
    });

    var closeModalButton = document.getElementById('closeModal');
    closeModalButton.addEventListener('click', function() {
        modal.classList.add('hidden');
    });
});

