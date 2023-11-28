document.addEventListener('DOMContentLoaded', function () {
    const currentMonthElement = document.getElementById('currentMonth');
    const prevMonthButton = document.getElementById('prevMonth');
    const nextMonthButton = document.getElementById('nextMonth');
    const calendarElement = document.getElementById('calendar');
    const statusFilter = document.getElementById('statusFilter');
    const facilityFilter = document.getElementById('facilityFilter');

    let currentYear = parseInt(currentMonthElement.getAttribute('data-year'));
    let currentMonth = parseInt(currentMonthElement.getAttribute('data-month'));
    let selectedFacilityID = '';

    function getStartingDayOfWeek(year, month) {
        return new Date(year, month - 1, 1).getDay();
    }

    function getRandomLightColor() {
        const letters = '89ABCDEF';
        let color = '#';
        for (let i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 8)];
        }
        return color;
    }

    function formatTimeTo12Hour(time) {
        const timeParts = time.split(':');
        const hours = parseInt(timeParts[0]);
        const minutes = parseInt(timeParts[1]);
        const ampm = hours >= 12 ? 'PM' : 'AM';
        const formattedHours = hours % 12 || 12;
        const formattedMinutes = minutes < 10 ? `0${minutes}` : minutes;
        return `${formattedHours}:${formattedMinutes} ${ampm}`;
    }

    function getBackgroundColorForEvent(event) {
        return '#43C6DB'; // Set the color for events to green
    }

    function updateCalendar() {
        currentMonthElement.textContent = new Date(currentYear, currentMonth - 1, 1).toLocaleString('en-US', {
            month: 'long',
            year: 'numeric',
        });

        const url = `/events/${currentYear}/${currentMonth}/${selectedFacilityID}`;
        fetch(url)
            .then((response) => response.json())
            .then((data) => {
                calendarElement.innerHTML = '';

                const startingDayOfWeek = getStartingDayOfWeek(currentYear, currentMonth);

                for (let i = 0; i < startingDayOfWeek; i++) {
                    const emptyDay = document.createElement('div');
                    emptyDay.className = 'border border-gray-300 p-2 rounded-xl';
                    calendarElement.appendChild(emptyDay);
                }

                const lastDay = new Date(currentYear, currentMonth, 0).getDate();

                for (let day = 1; day <= lastDay; day++) {
                    const dayElement = document.createElement('div');
                    dayElement.className = 'border border-gray-300 p-2 rounded-xl cursor-pointer';
                    dayElement.textContent = day;

                    const eventsForDay = data.filter((event) => {
                        const eventStartDate = new Date(event.event_start_date);
                        const eventEndDate = new Date(event.event_end_date); // Assuming event_end_date is a datetime attribut
                        return eventStartDate.getDate() <= day && day <= eventEndDate.getDate();
                    });

                    const preparationsForDay = data.filter((event) => {
                        const preparationStart = new Date(event.preparation_start_date);
                        const preparationEnd = new Date(event.preparation_end_date); // Assuming preparation_end_date is a datetime attribute
                        return preparationStart.getDate() <= day && day <= preparationEnd.getDate();
                    });

                    // Apply status filter
                    const selectedStatus = statusFilter.value;
                    const filteredEventsForDay = eventsForDay.filter((event) => {
                        return selectedStatus === '' || event.status === selectedStatus;
                    });

                    if (filteredEventsForDay.length > 0) {
                        filteredEventsForDay.forEach((event) => {
                            const eventDiv = createEventDiv(event);
                            dayElement.appendChild(eventDiv);
                        });
                    }

                    if (preparationsForDay.length > 0) {
                        preparationsForDay.forEach((event) => {
                            const preparationDiv = createPreparationDiv(event);
                            dayElement.appendChild(preparationDiv);
                        });
                    }

                    calendarElement.appendChild(dayElement);
                }
            })
            .catch((error) => {
                console.error('Error fetching event data:', error);
            });
    }


    function createEventDiv(event) {
        const eventDiv = document.createElement('div');
        eventDiv.className = 'event';
        eventDiv.style.backgroundColor = getBackgroundColorForEvent(event.event_name);
    
        const eventText = document.createElement('div');
        eventText.textContent = event.event_name;
        eventText.style.marginTop = '5px';
        eventText.style.fontSize = '13px';
        eventText.style.fontWeight = 'bold';
        eventDiv.appendChild(eventText);
    
        const eventStartDate = new Date(event.event_start_date); // Assuming event_start_date is a datetime attribute
        const eventEndDate = new Date(event.event_end_date); // Assuming event_end_date is a datetime attribute
    
        const eventTimeDiv = document.createElement('div');
        eventTimeDiv.textContent = `${formatTimeTo12Hour(eventStartDate.toLocaleTimeString())} - ${formatTimeTo12Hour(eventEndDate.toLocaleTimeString())}`;
        eventTimeDiv.style.fontSize = '10px';
        eventDiv.appendChild(eventTimeDiv);
    
        return eventDiv;
    }
    
    function createPreparationDiv(event) {
        const preparationDiv = document.createElement('div');
        preparationDiv.className = 'preparation';
        preparationDiv.style.backgroundColor = '#7FFFD4'; // Set the background color for preparations to pink
        preparationDiv.style.marginBottom = '5px'; // Add margin-bottom for creating a gap

        const preparationStart = new Date(event.preparation_start_date);

        const eventNameDiv = document.createElement('div');
        eventNameDiv.textContent = event.event_name;
        eventNameDiv.style.fontSize = '10px';
        eventNameDiv.style.fontWeight = 'bold';
        preparationDiv.appendChild(eventNameDiv);

        const preparationTimeDiv = document.createElement('div');
        preparationTimeDiv.textContent = `${formatTimeTo12Hour(preparationStart.toLocaleTimeString())}`;
        preparationTimeDiv.style.fontSize = '10px';
        preparationDiv.appendChild(preparationTimeDiv);

        return preparationDiv;
    }

    nextMonthButton.addEventListener('click', function () {
        currentMonth++;
        if (currentMonth > 12) {
            currentMonth = 1;
            currentYear++;
        }
        updateCalendar();
    });

    prevMonthButton.addEventListener('click', function () {
        currentMonth--;
        if (currentMonth < 1) {
            currentMonth = 12;
            currentYear--;
        }
        updateCalendar();
    });

    statusFilter.addEventListener('change', function () {
        updateCalendar();
    });

    facilityFilter.addEventListener('change', function () {
        selectedFacilityID = facilityFilter.value;
        updateCalendar();
    });

    updateCalendar();
});


