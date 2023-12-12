function openModal() {
    const eventName = document.getElementById('nameofevent').value.trim();
    const eventStartDate = document.getElementById('event-start-date').value.trim();
    const eventEndDate = document.getElementById('event-end-date').value.trim();
    const preparationStartDate = document.getElementById('preparation-start-date').value.trim();
    const preparationEndDate = document.getElementById('preparation-end-date').value.trim();
    const cleanupStartDate = document.getElementById('cleanup-start-date').value.trim();
    const cleanupEndDate = document.getElementById('cleanup-end-date').value.trim();
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
const eventStartDate = document.getElementById('event-start-date');
const eventEndDate = document.getElementById('event-end-date');
const preparationStartDate = document.getElementById('preparation-start-date');
const preparationEndDate = document.getElementById('preparation-end-date');
const cleanupStartDate = document.getElementById('cleanup-start-date');
const cleanupEndDate = document.getElementById('cleanup-end-date');

eventEndDate.addEventListener('change', function() {
    const selectedStartDate = new Date(eventStartDate.value);
    const selectedEndDate = new Date(eventEndDate.value);

    preparationStartDate.max = selectedStartDate.toISOString().slice(0, 16);
    preparationEndDate.max = selectedStartDate.toISOString().slice(0, 16);

    cleanupStartDate.min = selectedEndDate.toISOString().slice(0, 16);
    cleanupEndDate.min = selectedEndDate.toISOString().slice(0, 16);
});

cleanupStartDate.addEventListener('change', function() {
    const selectedCleanupStartDate = new Date(cleanupStartDate.value);
    const selectedEndDate = new Date(eventEndDate.value);

    if (selectedCleanupStartDate <= selectedEndDate) {
        cleanupStartDate.value = selectedEndDate.toISOString().slice(0, 16);
        cleanupEndDate.min = selectedEndDate.toISOString().slice(0, 16);
    } else {
        cleanupEndDate.min = cleanupStartDate.value;
    }
});

cleanupEndDate.addEventListener('change', function() {
    cleanupStartDate.max = cleanupEndDate.value;
});


function displayFiles() {
    const fileList = document.getElementById('attachments').files;
    const fileListContainer = document.getElementById('fileList');
    
    fileListContainer.innerHTML = '';

    for (let i = 0; i < fileList.length; i++) {
        const fileName = fileList[i].name;
        const listItem = document.createElement('div');
        listItem.textContent = fileName;
        fileListContainer.appendChild(listItem);
    }
}

