   
    const sidebar = document.getElementById('sidebar');
    const toggleButton = document.getElementById('toggleSidebar');
    const mainContent = document.querySelector('main');
    const iconPath = toggleButton.querySelector('path');

    function toggleSidebar() {
        sidebar.classList.toggle('collapsed');
        mainContent.classList.toggle('collapsed');

        const isCollapsed = sidebar.classList.contains('collapsed');
        sessionStorage.setItem('sidebarCollapsed', isCollapsed);

        // Toggle the icon based on the sidebar state
        if (isCollapsed) {
            iconPath.setAttribute('d', 'M3.25 10a.75.75 0 01.75-.75H14.388l-4.158-3.96a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08L14.388 10H4.75A.75.75 0 013.25 10z');
        } else {
            iconPath.setAttribute('d', 'M17 10a.75.75 0 01-.75.75H5.612l4.158 3.96a.75.75 0 11-1.04 1.08l-5.5-5.25a.75.75 0 010-1.08l5.5-5.25a.75.75 0 111.04 1.08L5.612 9.25H16.25A.75.75 0 0117 10z');
        }
    }

    toggleButton.addEventListener('click', toggleSidebar);

    // Check the initial sidebar state from sessionStorage
    const storedSidebarState = sessionStorage.getItem('sidebarCollapsed');

    if (storedSidebarState === 'true') {
        sidebar.classList.add('collapsed');
        mainContent.classList.add('collapsed');
        iconPath.setAttribute('d', 'M3.25 10a.75.75 0 01.75-.75H14.388l-4.158-3.96a.75.75 0 111.04-1.08l5.5 5.25a.75.75 0 010 1.08l-5.5 5.25a.75.75 0 11-1.04-1.08L14.388 10H4.75A.75.75 0 013.25 10z');
    } else {
        sidebar.classList.remove('collapsed');
        mainContent.classList.remove('collapsed');
        iconPath.setAttribute('d', 'M17 10a.75.75 0 01-.75.75H5.612l4.158 3.96a.75.75 0 11-1.04 1.08l-5.5-5.25a.75.75 0 010-1.08l5.5-5.25a.75.75 0 111.04 1.08L5.612 9.25H16.25A.75.75 0 0117 10z');
    }

    // Get the sidebar content element
    const sidebarContent = document.getElementById("sidebar-content");

    // Set the height dynamically based on the available viewport height
    const windowHeight = window.innerHeight;
    const headerHeight = 100; // Adjust as needed
    const minHeight = 300; // Minimum height
    const maxHeight = windowHeight - headerHeight;

    sidebarContent.style.height = Math.max(minHeight, maxHeight) + "px";
document.addEventListener("DOMContentLoaded", function() {

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
});