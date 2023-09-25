const dropdownToggle = document.getElementById('dropdown-toggle');
    const dropdownMenu = document.getElementById('dropdown-menu');

    dropdownToggle.addEventListener('click', () => {
        if (dropdownMenu.classList.contains('hidden')) {
            dropdownMenu.classList.remove('hidden');
            dropdownMenu.classList.add('block');
            dropdownMenu.style.opacity = '1';
        } else {
            dropdownMenu.classList.remove('block');
            dropdownMenu.classList.add('hidden');
            dropdownMenu.style.opacity = '0';
        }
    });
