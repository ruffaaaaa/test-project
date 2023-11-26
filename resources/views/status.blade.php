<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="/css/styles.css">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
    <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>
    <link href="/css/custom.css" rel="stylesheet">
</head>
<body>
    <table>
        <div class="caption-container" id="calendar-caption"></div>
        <thead>
            <tr>
                <th>Sun</th>
                <th>Mon</th>
                <th>Tue</th>
                <th>Wed</th>
                <th>Thu</th>
                <th>Fri</th>
                <th>Sat</th>
            </tr>
        </thead>
        <tbody id="calendar-body">
        </tbody>
    </table>
    <script>
        const today = new Date();
        let currentMonth = today.getMonth();
        let currentYear = today.getFullYear();

        function generateCalendar(year, month) {
            const calendarCaption = document.getElementById("calendar-caption");
            calendarCaption.textContent = new Date(year, month, 1).toLocaleString('default', { month: 'long' }) + " " + year;

            const calendarBody = document.getElementById("calendar-body");
            calendarBody.innerHTML = "";

            const firstDay = new Date(year, month, 1);
            const lastDay = new Date(year, month + 1, 0);

            // Determine the day of the week for the first day of the month (0 = Sunday, 1 = Monday, etc.)
            const startDay = firstDay.getDay();

            let date = new Date(firstDay);
            
            // Fill in empty cells until the start day
            for (let i = 0; i < startDay; i++) {
                const emptyCell = document.createElement("td");
                emptyCell.className = "gray-bg";
                calendarBody.appendChild(emptyCell);
            }

            while (date <= lastDay) {
                const cell = document.createElement("td");
                cell.textContent = date.getDate();
                if (date.getMonth() !== month) {
                    cell.className = "gray-bg";
                }
                calendarBody.appendChild(cell);

                if (date.getDay() === 6) {
                    calendarBody.appendChild(document.createElement("tr"));
                }

                date.setDate(date.getDate() + 1);
            }
        }

        function prevMonth() {
            currentMonth -= 1;
            if (currentMonth < 0) {
                currentMonth = 11;
                currentYear -= 1;
            }
            generateCalendar(currentYear, currentMonth);
        }

        function nextMonth() {
            currentMonth += 1;
            if (currentMonth > 11) {
                currentMonth = 0;
                currentYear += 1;
            }
            generateCalendar(currentYear, currentMonth);
        }

        generateCalendar(currentYear, currentMonth);
        document.addEventListener('keydown', function(event) {
            if (event.key === 'ArrowLeft') {
                prevMonth();
            } else if (event.key === 'ArrowRight') {
                nextMonth();
            }
        });
    </script>
    <div class="button-container" id="calendar-buttons">
    <script src="/js/index.js"></script>
</body>
</html> <style>
        table {
            width: 100%;
            border: 1px solid #ccc;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ccc;
            padding: 40px;
            text-align: center;
        }
        th {
            background-color: #f0f0f0;
        }
        .gray-bg {
            background-color: #f0f0f0;
        }
        .caption-container {
            background-color: #4CAF50;
            border-radius: 5px 5px 0 0;
            padding: 5px;
            text-align: center;
            position: relative;
            font-size: 100px;
        }
        #calendar-caption {
            color: white;
            position: relative;
        }
        .button-container {
            background-color: #4CAF50;
            border-radius: 0 0 5px 5px;
            padding: 25px;
            text-align: center;
            position: relative;
        }#calendar-button {
            color: white;
            position: relative;
        }

    </style>
</head>
<body>
    <table>
        <div class="caption-container" id="calendar-caption"></div>
        <thead>
            <tr>
                <th>Sun</th>
                <th>Mon</th>
                <th>Tue</th>
                <th>Wed</th>
                <th>Thu</th>
                <th>Fri</th>
                <th>Sat</th>
            </tr>
        </thead>
        <tbody id="calendar-body">
        </tbody>
    </table>
    <script>
        const today = new Date();
        let currentMonth = today.getMonth();
        let currentYear = today.getFullYear();

        function generateCalendar(year, month) {
            const calendarCaption = document.getElementById("calendar-caption");
            calendarCaption.textContent = new Date(year, month, 1).toLocaleString('default', { month: 'long' }) + " " + year;

            const calendarBody = document.getElementById("calendar-body");
            calendarBody.innerHTML = "";

            const firstDay = new Date(year, month, 1);
            const lastDay = new Date(year, month + 1, 0);

            // Determine the day of the week for the first day of the month (0 = Sunday, 1 = Monday, etc.)
            const startDay = firstDay.getDay();

            let date = new Date(firstDay);
            
            // Fill in empty cells until the start day
            for (let i = 0; i < startDay; i++) {
                const emptyCell = document.createElement("td");
                emptyCell.className = "gray-bg";
                calendarBody.appendChild(emptyCell);
            }

            while (date <= lastDay) {
                const cell = document.createElement("td");
                cell.textContent = date.getDate();
                if (date.getMonth() !== month) {
                    cell.className = "gray-bg";
                }
                calendarBody.appendChild(cell);

                if (date.getDay() === 6) {
                    calendarBody.appendChild(document.createElement("tr"));
                }

                date.setDate(date.getDate() + 1);
            }
        }

        function prevMonth() {
            currentMonth -= 1;
            if (currentMonth < 0) {
                currentMonth = 11;
                currentYear -= 1;
            }
            generateCalendar(currentYear, currentMonth);
        }

        function nextMonth() {
            currentMonth += 1;
            if (currentMonth > 11) {
                currentMonth = 0;
                currentYear += 1;
            }
            generateCalendar(currentYear, currentMonth);
        }

        generateCalendar(currentYear, currentMonth);
        document.addEventListener('keydown', function(event) {
            if (event.key === 'ArrowLeft') {
                prevMonth();
            } else if (event.key === 'ArrowRight') {
                nextMonth();
            }
        });
    </script>
    <div class="button-container" id="calendar-buttons">
    <script src="/js/index.js"></script>
</body>
</html>
