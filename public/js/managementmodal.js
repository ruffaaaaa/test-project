 document.addEventListener("DOMContentLoaded", function() {
        var modal = document.getElementById('editModal');
        var editButtons = document.querySelectorAll('.editButton');
        var editForm = document.getElementById('editForm');

        var editFacilityIDField = document.getElementById('editID');
        var editStatusField = document.getElementById('editStatus');

        editButtons.forEach(function(button) {
            button.addEventListener('click', function() {
                var row = button.closest('tr');
                var id = row.querySelector('td:nth-child(1)').textContent;
                var role_id = row.querySelector('td:nth-child(5)').textContent;

                editFacilityIDField.value = id;
                
                editForm.action = '/admin-management/' + id;

                var options = editStatusField.options;
                for (var i = 0; i < options.length; i++) {
                    if (options[i].value === role_id) {
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

        document.getElementById('openModalBtn').addEventListener('click', function () {
            modal.classList.remove('hidden');
        });

        document.getElementById('closeModalBtn').addEventListener('click', function () {
            modal.classList.add('hidden');
        });
    });