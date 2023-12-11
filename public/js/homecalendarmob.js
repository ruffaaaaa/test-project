document.addEventListener('DOMContentLoaded', function () {
    const currentMonthElement = document.getElementById('currentMonth');
    const prevMonthButton = document.getElementById('prevMonth');
    const nextMonthButton = document.getElementById('nextMonth');
    const calendarElement = document.getElementById('calendar');
    const statusFilter = document.getElementById('statusFilter');
    const facilityFilter = document.getElementById('facilityFilter');
    const scheduleFilter = document.getElementById('scheduleFilter');
    let currentYear = parseInt(currentMonthElement.getAttribute('data-year'));
    let currentMonth = parseInt(currentMonthElement.getAttribute('data-month'));
    let selectedFacilityID = '';
    let selectedSchedule = '';
    let selectedStatus = '';  
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
        return '#43C6DB';
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
                        const eventStart = new Date(event.event_start_date);
                        const eventEnd = new Date(event.event_end_date);
                        return eventStart.getDate() <= day && day <= eventEnd.getDate();
                    });
    
                    const preparationsForDay = data.filter((event) => {
                        const preparationStart = new Date(event.preparation_start_date);
                        const preparationEnd = new Date(event.preparation_end_date_time);
                        return preparationStart.getDate() <= day && day <= preparationEnd.getDate();
                    });
    
                    const cleanupForDay = data.filter((event) => {
                        const cleanupStart = new Date(event.cleanup_start_date_time);
                        const cleanupEnd = new Date(event.cleanup_end_date_time);
                        return cleanupStart.getDate() <= day && day <= cleanupEnd.getDate();
                    });
    
                    selectedStatus = statusFilter.value;
                    const filteredEventsForDay = eventsForDay.filter((event) => {
                        return selectedStatus === '' || event.status === selectedStatus;
                    });
    
                    const filteredPreparationsForDay = preparationsForDay.filter((event) => {
                        return selectedStatus === '' || event.status === selectedStatus;
                    });
    
                    const filteredCleanupForDay = cleanupForDay.filter((event) => {
                        return selectedStatus === '' || event.status === selectedStatus;
                    });
    
                    switch (selectedSchedule) {
                        case 'Event':
                            if (filteredEventsForDay.length > 0) {
                                filteredEventsForDay.forEach((event) => {
                                    const eventDiv = createEventDiv(event);
                                    dayElement.appendChild(eventDiv);
                                });
                            }
                            break;
                        case 'Preparation':
                            if (filteredPreparationsForDay.length > 0) {
                                filteredPreparationsForDay.forEach((event) => {
                                    const preparationDiv = createPreparationDiv(event);
                                    dayElement.appendChild(preparationDiv);
                                });
                            }
                            break;
                        case 'Cleanup':
                            if (filteredCleanupForDay.length > 0) {
                                filteredCleanupForDay.forEach((event) => {
                                    const cleanupDiv = createCleanUpDiv(event);
                                    dayElement.appendChild(cleanupDiv);
                                });
                            }
                            break;
                            
                        default:
                            const filteredEvents = (selectedStatus === '')
                                ? eventsForDay
                                : filteredEventsForDay;
    
                            if (filteredEvents.length > 0) {
                                filteredEvents.forEach((event) => {
                                    const eventDiv = createEventDiv(event);
                                    dayElement.appendChild(eventDiv);
                                });
                            }
    
                            const filteredPreparations = (selectedStatus === '')
                                ? preparationsForDay
                                : filteredPreparationsForDay;
    
                            if (filteredPreparations.length > 0) {
                                filteredPreparations.forEach((event) => {
                                    const preparationDiv = createPreparationDiv(event);
                                    dayElement.appendChild(preparationDiv);
                                });
                            }
    
                            const filteredCleanup = (selectedStatus === '')
                                ? cleanupForDay
                                : filteredCleanupForDay;
    
                            if (filteredCleanup.length > 0) {
                                filteredCleanup.forEach((event) => {
                                    const cleanupDiv = createCleanUpDiv(event);
                                    dayElement.appendChild(cleanupDiv);
                                });
                            }
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
        eventText.style.fontSize = '10px';
        eventText.style.fontWeight = 'bold';
        eventDiv.appendChild(eventText);
    
        const facilities = document.createElement('div');
        facilities.textContent = event.facilityName; // Include facilityName here
        eventDiv.appendChild(facilities);
    
        const eventStartDate = new Date(event.event_start_date);
        const eventEndDate = new Date(event.event_end_date);
    
        const eventTimeDiv = document.createElement('div');
        eventTimeDiv.textContent = `${formatTimeTo12Hour(eventStartDate.toLocaleTimeString())} - ${formatTimeTo12Hour(eventEndDate.toLocaleTimeString())}`;
        eventTimeDiv.style.fontSize = '10px';
        eventDiv.appendChild(eventTimeDiv);
    
        return eventDiv;
    }    

    function createCleanUpDiv(event) {
        const cleanupDiv = document.createElement('div');
        cleanupDiv.className = 'cleanup';
        cleanupDiv.style.backgroundColor = 'pink';
        cleanupDiv.style.marginBottom = '5px';

        const cleanupStart = new Date(event.cleanup_start_date_time);
        const cleanupEnd = new Date(event.cleanup_end_date_time);

        const eventNameDiv = document.createElement('div');
        eventNameDiv.textContent = event.event_name;
        eventNameDiv.style.fontSize = '10px';
        eventNameDiv.style.fontWeight = 'bold';
        cleanupDiv.appendChild(eventNameDiv);

        const cleanupTimeDiv = document.createElement('div');
        cleanupTimeDiv.textContent = `${formatTimeTo12Hour(cleanupStart.toLocaleTimeString())} - ${formatTimeTo12Hour(cleanupEnd.toLocaleTimeString())}`;
        cleanupTimeDiv.style.fontSize = '10px';
        cleanupDiv.appendChild(cleanupTimeDiv);

        return cleanupDiv;
    }

    function createPreparationDiv(event) {
        const preparationDiv = document.createElement('div');
        preparationDiv.className = 'preparation';
        preparationDiv.style.backgroundColor = '#7FFFD4';
        preparationDiv.style.marginBottom = '5px';

        const preparationStart = new Date(event.preparation_start_date);
        const preparationEnd = new Date(event.preparation_end_date_time);

        const eventNameDiv = document.createElement('div');
        eventNameDiv.textContent = event.event_name;
        eventNameDiv.style.fontSize = '10px';
        eventNameDiv.style.fontWeight = 'bold';
        preparationDiv.appendChild(eventNameDiv);

        const preparationTimeDiv = document.createElement('div');
        preparationTimeDiv.textContent = `${formatTimeTo12Hour(preparationStart.toLocaleTimeString())} - ${formatTimeTo12Hour(preparationEnd.toLocaleTimeString())}`;
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

    scheduleFilter.addEventListener('change', function () {
        selectedSchedule = scheduleFilter.value;
        updateCalendar();
    });

    updateCalendar();
});


function openModalMob() {
    document.getElementById('calendarModalMob').classList.remove('hidden');
  }

  function closeModalMob() {
    document.getElementById('calendarModalMob').classList.add('hidden');
  }

  document.getElementById('calendarButtonMob').addEventListener('click', openModalMob);


  document.getElementById('closeModalMob').addEventListener('click', closeModalMob);