const sidebar = document.getElementById('sidebar');
const toggleButton = document.getElementById('toggleSidebar');
const mainContent = document.querySelector('main');

function toggleSidebar() {
    sidebar.classList.toggle('collapsed');
    mainContent.classList.toggle('collapsed');

    const isCollapsed = sidebar.classList.contains('collapsed');
    sessionStorage.setItem('sidebarCollapsed', isCollapsed);
}

toggleButton.addEventListener('click', toggleSidebar);

const storedSidebarState = sessionStorage.getItem('sidebarCollapsed');

if (storedSidebarState === 'true') {
    sidebar.classList.add('collapsed');
    mainContent.classList.add('collapsed');
} else {
    sidebar.classList.remove('collapsed');
    mainContent.classList.remove('collapsed');
}

var modal = document.getElementById('editModal');
var editButtons = document.querySelectorAll('.editButton');
var editForm = document.getElementById('editForm'); // Get the edit form

var editFacilityIDField = document.getElementById('editFacilityID');
var editFacilityNameField = document.getElementById('editFacilityName');
var editStatusField = document.getElementById('editStatus')

editButtons.forEach(function(button) {
    button.addEventListener('click', function() {
        var row = button.closest('tr');
        var facilityID = row.querySelector('td:nth-child(1)').textContent;
        var facilityName = row.querySelector('td:nth-child(2)').textContent;
        var status = row.querySelector('td:nth-child(4)').textContent;

        editFacilityIDField.value = facilityID;
        editFacilityNameField.value = facilityName;

        editForm.action = '/facilities/' + facilityID; 

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
var closeModalButton = document.getElementById('closeModal');
closeModalButton.addEventListener('click', function() {
modal.classList.add('hidden');
});


//Carousel
var swiper = new Swiper('.swiper-container', {
    slidesPerView: 'auto', 
    spaceBetween: 10,
    pagination: {
        el: '.swiper-pagination',
        clickable: true,
    },
    breakpoints: {

        640: {
            slidesPerView: 1,
        },
    
        768: {
            slidesPerView: 2,
        },
        1024: {
            slidesPerView: 3,
        },
    },
});