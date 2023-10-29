function openModal() {
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

function closeModal() {
    const modal = document.getElementById('modal');
    modal.classList.add('hidden');
}

