function openModal() {
    // Get the values of all the input fields and trim them to remove leading/trailing spaces
    const eventName = document.getElementById('nameofevent').value.trim();
    const eventStartDate = document.getElementById('event-start-date').value.trim();
    const eventEndDate = document.getElementById('event-end-date').value.trim();
    const preparationStartDate = document.getElementById('preparation-start-date').value.trim();
    const preparationEndDate = document.getElementById('preparation-end-date').value.trim();
    const cleanupStartDate = document.getElementById('cleanup-start-date').value.trim();
    const cleanupEndDate = document.getElementById('cleanup-end-date').value.trim();
    // Check if any of the required fields are empty
    if (
        eventName === "" || 
        eventStartDate === "" || 
        eventEndDate === "" || 
        preparationStartDate === "" || 
        preparationEndDate === "" || 
        cleanupStartDate === "" || 
        cleanupEndDate === ""
    ) {
        alert("Please fill in all required fields.");
        return;
    }

    const modal = document.getElementById('modal');
    modal.classList.remove('hidden');

    event.preventDefault();
    const form = document.querySelector('form');
    const formData = new FormData(form);

    fetch(form.action, {
        method: form.method,
        body: formData,
    })
    .then(response => response.json()) 
    .then(data => {
        if (data.success) {
            document.getElementById('reservation-code').textContent = 'Reservation Code: ' + data.reservationCode;
        } else {
        }
    })
    .catch(error => {
        console.error(error);
    });
}

const equipmentCheckboxes = document.querySelectorAll('.equipment-checkbox');
equipmentCheckboxes.forEach(checkbox => {
    checkbox.addEventListener('change', function () {
        const equipmentInput = this.parentElement.querySelector('.equipment-input');

        if (this.checked) {
            equipmentInput.style.display = 'block';
        } else {
            equipmentInput.style.display = 'none';
            equipmentInput.value = '';
        }
    });
});

const personnelCheckboxes = document.querySelectorAll('.personnel-checkbox');
personnelCheckboxes.forEach(checkbox => {
    checkbox.addEventListener('change', function () {
        const personnelInput = this.parentElement.querySelector('.personnel-input');

        if (this.checked) {
            personnelInput.style.display = 'block';
        } else {
            personnelInput.style.display = 'none';
            personnelInput.value = '';
        }
    });
});

const fileInput = document.getElementById("attachments");
const fileList = document.getElementById("fileList");

fileInput.addEventListener("change", function() {
    const fileNames = Array.from(fileInput.files).map(file => file.name);
    fileList.textContent = fileNames.join(", ");
});

