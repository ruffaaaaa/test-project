// Display current month and year
function displayCurrentMonthAndYear(year, month) {
    const monthNames = [
        'January', 'February', 'March', 'April', 'May', 'June',
        'July', 'August', 'September', 'October', 'November', 'December'
    ];

    const formattedMonth = `${year} ${monthNames[month]}`;
    const currentMonthElement = document.getElementById('currentMonth');
    currentMonthElement.textContent = formattedMonth;
}

// Fetch events and preparation dates from the database
async function fetchEventsAndPreparationsFromDatabase() {
    try {
        const response = await fetch('/api/schedule'); // Adjust the endpoint as per your backend setup
        if (!response.ok) {
            throw new Error('Network response was not ok.');
        }
        const data = await response.json();
        return {
            events: data.events,
            preparations: data.preparations,
            cleanups: data.cleanups
        };
    } catch (error) {
        console.error('Error fetching data:', error);
        return {
            events: [],
            preparations: [],
            cleanups: []
        };
    }
}

// Generate calendar based on fetched data
async function displayCalendarForYearMonth(year, month) {
    const { events, preparations, cleanups } = await fetchEventsAndPreparationsFromDatabase();
    generateCalendar(year, month, events, preparations, cleanups);
    displayCurrentMonthAndYear(year, month);
}

// ... (previous code remains unchanged)

function generateCalendar(year, month, events, preparations, cleanups) {
    const calendarElement = document.getElementById('calendar');
    const daysInMonth = new Date(year, month + 1, 0).getDate();
    const firstDayOfMonth = new Date(year, month, 1).getDay();

    let date = 1;
    let calendarHTML = '';

    for (let i = 0; i < 6; i++) {
        for (let j = 0; j < 7; j++) {
            if (i === 0 && j < firstDayOfMonth) {
                calendarHTML += '<div></div>';
            } else if (date > daysInMonth) {
                break;
            } else {
                const currentDate = new Date(year, month, date);
                const currentDateStr = currentDate.toISOString().split('T')[0];

                let classes = 'text-left';
                let dateText = date.toString();
                let containerHTML = '';

                const eventsForDate = events.filter(event => {
                    const start = new Date(event.event_start_date).toISOString().split('T')[0];
                    const end = new Date(event.event_end_date).toISOString().split('T')[0];
                    return currentDateStr >= start && currentDateStr <= end;
                });

                const prepsForDate = preparations.filter(prep => {
                    const start = new Date(prep.preparation_start_date).toISOString().split('T')[0];
                    const end = new Date(prep.preparation_end_date_time).toISOString().split('T')[0];
                    return currentDateStr === start || currentDateStr === end || (currentDateStr > start && currentDateStr < end);
                });
                
                const cleanupsForDate = cleanups.filter(clean => {
                    const start = new Date(clean.cleanup_start_date_time).toISOString().split('T')[0];
                    const end = new Date(clean.cleanup_end_date_time).toISOString().split('T')[0];
                    return currentDateStr === start || currentDateStr === end || (currentDateStr > start && currentDateStr < end);
                });

                containerHTML += '<div class="p-1 rounded mb-1">';

                eventsForDate.forEach(event => {
                    containerHTML += `<p style="background-color: #43C6DB; font-size: 10px;  margin-top: 5px"><b>${event.event_name}</b><br> ${new Date(event.event_start_date).toLocaleTimeString('en-US', {
                        hour: 'numeric',
                        minute: 'numeric',
                        hour12: true
                    })} to ${new Date(event.event_end_date).toLocaleTimeString('en-US', {
                        hour: 'numeric',
                        minute: 'numeric',
                        hour12: true
                    })}</p>`;
                });

                prepsForDate.forEach(prep => {
                    containerHTML += `<p style="background-color: #7FFFD4; font-size: 10px;  margin-top: 5px"><b>${prep.event_name}</b> <br>${new Date(prep.preparation_start_date).toLocaleTimeString('en-US', {
                        hour: 'numeric',
                        minute: 'numeric',
                        hour12: true
                    })} to ${new Date(prep.preparation_end_date_time).toLocaleTimeString('en-US', {
                        hour: 'numeric',
                        minute: 'numeric',
                        hour12: true
                    })}</p>`;
                });

                cleanupsForDate.forEach(clean => {
                    containerHTML += `<p style="background-color: pink;font-size: 10px; margin-top: 5px"><b>${clean.event_name}</b> <br> ${new Date(clean.cleanup_start_date_time).toLocaleTimeString('en-US', {
                        hour: 'numeric',
                        minute: 'numeric',
                        hour12: true
                    })} to ${new Date(clean.cleanup_end_date_time).toLocaleTimeString('en-US', {
                        hour: 'numeric',
                        minute: 'numeric',
                        hour12: true
                    })}</p>`;
                });

                containerHTML += `</div>`;
                date++;
                calendarHTML += `<div class="${classes} border border-gray-400 p-1 rounded">${dateText}${containerHTML}</div>`;
            }
        }
    }

    calendarElement.innerHTML = calendarHTML;
}


// ... (rest of the code remains unchanged)

// Initialization code
document.getElementById('prevMonth').addEventListener('click', function () {
    if (month === 0) {
        year--;
        month = 11;
    } else {
        month--;
    }
    displayCalendarForYearMonth(year, month);
});

document.getElementById('nextMonth').addEventListener('click', function () {
    if (month === 11) {
        year++;
        month = 0;
    } else {
        month++;
    }
    displayCalendarForYearMonth(year, month);
});

const currentDate = new Date();
let [year, month] = [currentDate.getFullYear(), currentDate.getMonth()]; // Month is zero-based (0-January, 1-February, etc.)
displayCalendarForYearMonth(year, month);
