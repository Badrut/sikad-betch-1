<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Schedule - SMK Student Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f3f4f6;
        }

        .active-indicator {
            transition: left 300ms, width 300ms;
        }

        .calendar-grid {
            display: grid;
            grid-template-columns: repeat(7, 1fr);
            gap: 0.5rem;
        }

        .calendar-cell {
            padding: 0.75rem 0.5rem;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: flex-start;
            position: relative;
            cursor: pointer;
            min-height: 80px;
        }

        .day-number {
            font-size: 1.125rem;
            font-weight: 600;
            margin-bottom: 0.25rem;
        }

        .event {
            font-size: 0.625rem;
            padding: 0.125rem 0.5rem;
            border-radius: 9999px;
            margin-top: 0.25rem;
            text-align: center;
            line-height: 1;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .active-day {
            background-color: #e0f2fe;
            border-radius: 0.75rem;
            border: 1px solid #93c5fd;
        }

        .today-event {
            background-color: #3b82f6;
            color: white;
        }

        .main-schedule-grid {
            display: grid;
            grid-template-columns: 80px repeat(5, minmax(0, 1fr));
            gap: 0.5rem;
        }

        @media (max-width: 1024px) {
            .main-schedule-grid {
                grid-template-columns: 80px repeat(1, minmax(0, 1fr));
            }

            .schedule-cell[class*="col-span-"] {
                grid-column: span 1 / span 1;
            }
        }

        .schedule-header {
            text-align: center;
            font-weight: 600;
            color: #4b5563;
            padding: 0.5rem;
        }

        .time-slot {
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            font-size: 0.75rem;
            font-weight: 500;
            color: #6b7280;
        }

        .schedule-cell {
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
            padding: 1rem 0.5rem;
            font-size: 0.875rem;
            font-weight: 500;
        }

        .break-time {
            background-color: #e5e7eb;
            color: #4b5563;
        }
    </style>
</head>

<body class="bg-gray-100">

    <div class="min-h-screen">
        <nav class="flex items-center justify-between px-6 py-3 bg-white shadow-md">
            <div class="flex items-center space-x-6">
                <img src="https://via.placeholder.com/50" alt="Logo" width="50px" height="50px">
                <button id="hamburger-btn" class="lg:hidden text-gray-500 hover:text-gray-900 focus:outline-none">
                    <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                </button>
                <div id="nav-menu"
                    class="absolute lg:relative top-full left-0 right-0 lg:flex lg:items-center lg:space-x-6 bg-white lg:bg-transparent shadow-md lg:shadow-none p-4 lg:p-0 hidden flex-col lg:flex-row space-y-4 lg:space-y-0">
                    <span id="active-indicator"
                        class="hidden lg:block absolute h-full bg-green-500 rounded-2xl active-indicator z-10"></span>
                    <a href="dashboard" id="dashboard-btn"
                        class="relative flex items-center space-x-2 text-gray-500 hover:text-gray-900 transition-colors duration-300 rounded-2xl py-2 px-4 z-20">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6" />
                        </svg>
                        <span>Dashboard</span>
                    </a>
                    <a href="raport" id="raport-btn"
                        class="relative flex items-center space-x-2 text-gray-500 hover:text-gray-900 transition-colors duration-300 rounded-2xl py-2 px-4 z-20">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M17 14v6m-3-3h6M6 10h2m-2 4h2m-2 4h2m-2 4h2M12 4v16M4 4h16a2 2 0 012 2v12a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2z" />
                        </svg>
                        <span>Raport</span>
                    </a>
                    <a href="attendance" id="attendance-btn"
                        class="relative flex items-center space-x-2 text-gray-500 hover:text-gray-900 transition-colors duration-300 rounded-2xl py-2 px-4 z-20">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                        </svg>
                        <span>Attendance</span>
                    </a>
                    <a href="schedule" id="schedule-btn"
                        class="relative flex items-center space-x-2 text-gray-500 hover:text-gray-900 transition-colors duration-300 rounded-2xl py-2 px-4 z-20">
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        <span>Schedule</span>
                    </a>
                </div>
            </div>
            <div class="flex items-center space-x-6">
                <div class="relative">
                    <svg class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                    </svg>
                    <span class="absolute top-0 right-0 block h-2 w-2 rounded-2xl bg-red-500 ring-2 ring-white"></span>
                </div>
                <div id="profile-trigger"
                    class="relative flex items-center space-x-2 cursor-pointer border-2 border-gray-300 p-1 rounded-2xl">
                    <img src="https://api.dicebear.com/7.x/adventurer/svg?seed=Richardo" alt="Richardo"
                        class="rounded-2xl h-10 w-10">
                    <div>
                        <div class="text-sm font-semibold text-gray-800">Richardo</div>
                        <div class="text-xs text-gray-500">Student</div>
                    </div>
                    <div id="profile-dropdown"
                        class="absolute right-0 top-12 mt-2 w-48 bg-white rounded-md shadow-lg py-1 z-50 hidden">
                        <a href="profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100"><i
                                class="fas fa-user-circle mr-2"></i>Profile</a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-red-50"><i
                                class="fas fa-sign-out-alt mr-2"></i>Logout</a>
                    </div>
                </div>
            </div>
        </nav>

        <div class="p-4 md:p-8">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Jadwal Pelajaran</h1>
            <div class="flex flex-col lg:flex-row gap-8">
                <div class="flex-1 space-y-6">
                    <div class="bg-white p-6 md:p-8 rounded-2xl shadow-lg">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-lg md:text-xl font-bold text-gray-800">Jadwal Mingguan</h3>
                            <div class="flex space-x-2">
                                <button
                                    class="text-gray-400 hover:text-gray-600 transition-colors duration-200 focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M15 19l-7-7 7-7" />
                                    </svg>
                                </button>
                                <button
                                    class="text-gray-400 hover:text-gray-600 transition-colors duration-200 focus:outline-none">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none"
                                        viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                            d="M9 5l7 7-7 7" />
                                    </svg>
                                </button>
                            </div>
                        </div>

                        <div class="main-schedule-grid">
                            <span class="schedule-header text-transparent">Time</span>
                            <span class="schedule-header">Senin</span>
                            <span class="schedule-header">Selasa</span>
                            <span class="schedule-header">Rabu</span>
                            <span class="schedule-header">Kamis</span>
                            <span class="schedule-header">Jumat</span>

                            <div class="time-slot text-gray-500 text-xs font-semibold">07.00 - 07.45</div>
                            <div class="schedule-cell bg-blue-500 text-white rounded-xl col-span-1">Matematika</div>
                            <div class="schedule-cell bg-yellow-500 text-white rounded-xl col-span-1">B. Inggris</div>
                            <div class="schedule-cell bg-blue-500 text-white rounded-xl col-span-1">Matematika</div>
                            <div class="schedule-cell bg-green-500 text-white rounded-xl col-span-1">Fisika</div>
                            <div class="schedule-cell bg-purple-500 text-white rounded-xl col-span-1">Olahraga</div>

                            <div class="time-slot text-gray-500 text-xs font-semibold">07.45 - 08.30</div>
                            <div class="schedule-cell bg-blue-500 text-white rounded-xl col-span-1">Matematika</div>
                            <div class="schedule-cell bg-yellow-500 text-white rounded-xl col-span-1">B. Inggris</div>
                            <div class="schedule-cell bg-blue-500 text-white rounded-xl col-span-1">Matematika</div>
                            <div class="schedule-cell bg-green-500 text-white rounded-xl col-span-1">Fisika</div>
                            <div class="schedule-cell bg-purple-500 text-white rounded-xl col-span-1">Olahraga</div>

                            <div class="time-slot text-gray-500 text-xs font-semibold">08.30 - 09.15</div>
                            <div class="schedule-cell bg-red-500 text-white rounded-xl col-span-1">Kimia</div>
                            <div class="schedule-cell bg-green-500 text-white rounded-xl col-span-1">Fisika</div>
                            <div class="schedule-cell bg-red-500 text-white rounded-xl col-span-1">Kimia</div>
                            <div class="schedule-cell bg-yellow-500 text-white rounded-xl col-span-1">B. Inggris</div>
                            <div class="schedule-cell bg-red-500 text-white rounded-xl col-span-1">Kimia</div>

                            <div class="time-slot text-gray-500 text-xs font-semibold">09.15 - 10.00</div>
                            <div class="schedule-cell bg-red-500 text-white rounded-xl col-span-1">Kimia</div>
                            <div class="schedule-cell bg-green-500 text-white rounded-xl col-span-1">Fisika</div>
                            <div class="schedule-cell bg-red-500 text-white rounded-xl col-span-1">Kimia</div>
                            <div class="schedule-cell bg-yellow-500 text-white rounded-xl col-span-1">B. Inggris</div>
                            <div class="schedule-cell bg-red-500 text-white rounded-xl col-span-1">Kimia</div>

                            <div class="time-slot text-gray-500 text-xs font-semibold">10.00 - 10.15</div>
                            <div class="schedule-cell break-time rounded-xl col-span-5">Istirahat</div>

                            <div class="time-slot text-gray-500 text-xs font-semibold">10.15 - 11.00</div>
                            <div class="schedule-cell bg-indigo-500 text-white rounded-xl col-span-1">Praktek Webdev
                            </div>
                            <div class="schedule-cell bg-pink-500 text-white rounded-xl col-span-1">Pend. Agama</div>
                            <div class="schedule-cell bg-indigo-500 text-white rounded-xl col-span-1">Praktek Webdev
                            </div>
                            <div class="schedule-cell bg-red-500 text-white rounded-xl col-span-1">Kimia</div>
                            <div class="schedule-cell bg-indigo-500 text-white rounded-xl col-span-1">Praktek Webdev
                            </div>

                            <div class="time-slot text-gray-500 text-xs font-semibold">11.00 - 11.45</div>
                            <div class="schedule-cell bg-indigo-500 text-white rounded-xl col-span-1">Praktek Webdev
                            </div>
                            <div class="schedule-cell bg-pink-500 text-white rounded-xl col-span-1">Pend. Agama</div>
                            <div class="schedule-cell bg-indigo-500 text-white rounded-xl col-span-1">Praktek Webdev
                            </div>
                            <div class="schedule-cell bg-red-500 text-white rounded-xl col-span-1">Kimia</div>
                            <div class="schedule-cell bg-indigo-500 text-white rounded-xl col-span-1">Praktek Webdev
                            </div>

                            <div class="time-slot text-gray-500 text-xs font-semibold">11.45 - 12.15</div>
                            <div class="schedule-cell break-time rounded-xl col-span-5">Istirahat / Sholat</div>

                            <div class="time-slot text-gray-500 text-xs font-semibold">12.15 - 13.00</div>
                            <div class="schedule-cell bg-gray-500 text-white rounded-xl col-span-1">Pend. Pancasila
                            </div>
                            <div class="schedule-cell bg-indigo-500 text-white rounded-xl col-span-1">Praktek Webdev
                            </div>
                            <div class="schedule-cell bg-gray-500 text-white rounded-xl col-span-1">Pend. Pancasila
                            </div>
                            <div class="schedule-cell bg-indigo-500 text-white rounded-xl col-span-1">Praktek Webdev
                            </div>
                            <div class="schedule-cell bg-gray-500 text-white rounded-xl col-span-1">Pend. Pancasila
                            </div>
                        </div>
                    </div>
                </div>

                <div class="w-full lg:w-96 space-y-6">
                    <div class="bg-white p-6 md:p-8 rounded-2xl shadow-lg">
                        <div class="flex justify-between items-center mb-6">
                            <button id="prev-month"
                                class="text-gray-400 hover:text-gray-600 transition-colors duration-200 focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M15 19l-7-7 7-7" />
                                </svg>
                            </button>
                            <h3 id="current-month-year" class="text-lg md:text-xl font-bold text-gray-800"></h3>
                            <button id="next-month"
                                class="text-gray-400 hover:text-gray-600 transition-colors duration-200 focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M9 5l7 7-7 7" />
                                </svg>
                            </button>
                        </div>
                        <div class="calendar-grid text-gray-700 font-medium text-sm">
                            <span class="text-center text-gray-500 font-semibold">Min</span>
                            <span class="text-center text-gray-500 font-semibold">Sen</span>
                            <span class="text-center text-gray-500 font-semibold">Sel</span>
                            <span class="text-center text-gray-500 font-semibold">Rab</span>
                            <span class="text-center text-gray-500 font-semibold">Kam</span>
                            <span class="text-center text-gray-500 font-semibold">Jum</span>
                            <span class="text-center text-gray-500 font-semibold">Sab</span>
                            <div id="calendar-body" class="contents"></div>
                        </div>
                    </div>

                    <div class="bg-white p-6 md:p-8 rounded-2xl shadow-lg">
                        <div class="flex justify-between items-center mb-6">
                            <h3 class="text-lg md:text-xl font-bold text-gray-800">Agenda</h3>
                            <button
                                class="text-gray-400 hover:text-gray-600 transition-colors duration-200 focus:outline-none">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20"
                                    fill="currentColor">
                                    <path
                                        d="M10 6a2 2 0 110-4 2 2 0 010 4zM10 12a2 2 0 110-4 2 2 0 010 4zM10 18a2 2 0 110-4 2 2 0 010 4z" />
                                </svg>
                            </button>
                        </div>
                        <div id="daily-agenda-list" class="space-y-4">
                            <p class="text-gray-500 text-center">Pilih tanggal untuk melihat agenda.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        const monthNames = ["Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember"];
        let currentDate = new Date();

        const events = {
            "2025-8-14": [{ name: "Balikin Buku Fisika", type: "task" }],
            "2025-8-16": [{ name: "Presentasi Webdev", type: "event" }],
            "2025-8-19": [{ name: "Ujian Matematika", type: "exam" }]
        };

        function renderCalendar() {
            const year = currentDate.getFullYear();
            const month = currentDate.getMonth();
            const today = new Date();
            const firstDay = (new Date(year, month, 1)).getDay();
            const daysInMonth = 32 - new Date(year, month, 32).getDate();

            const calendarBody = document.getElementById("calendar-body");
            const currentMonthYear = document.getElementById("current-month-year");

            calendarBody.innerHTML = "";
            currentMonthYear.innerHTML = `${monthNames[month]} ${year}`;

            let date = 1;
            for (let i = 0; i < 6; i++) {
                for (let j = 0; j < 7; j++) {
                    if (i === 0 && j < firstDay) {
                        const cell = document.createElement("div");
                        calendarBody.appendChild(cell);
                    } else if (date > daysInMonth) {
                        break;
                    } else {
                        const cell = document.createElement("div");
                        cell.classList.add("calendar-cell", "hover:bg-gray-50", "transition-colors", "duration-200", "rounded-xl");
                        cell.setAttribute("data-date", `${year}-${month + 1}-${date}`);

                        const dayNumber = document.createElement("span");
                        dayNumber.classList.add("day-number");
                        dayNumber.textContent = date;
                        cell.appendChild(dayNumber);

                        const eventDateKey = `${year}-${month + 1}-${date}`;
                        if (events[eventDateKey]) {
                            events[eventDateKey].forEach(event => {
                                const eventSpan = document.createElement("span");
                                eventSpan.classList.add("event");
                                if (event.type === "task") {
                                    eventSpan.classList.add("bg-indigo-100", "text-indigo-700");
                                } else if (event.type === "exam") {
                                    eventSpan.classList.add("bg-red-100", "text-red-700");
                                } else {
                                    eventSpan.classList.add("bg-blue-100", "text-blue-700");
                                }
                                eventSpan.textContent = event.name;
                                cell.appendChild(eventSpan);
                            });
                        }

                        if (date === today.getDate() && year === today.getFullYear() && month === today.getMonth()) {
                            cell.classList.add("active-day");
                        }

                        calendarBody.appendChild(cell);
                        date++;
                    }
                }
            }

            document.querySelectorAll('.calendar-cell[data-date]').forEach(cell => {
                cell.addEventListener('click', function () {
                    document.querySelectorAll('.calendar-cell').forEach(c => c.classList.remove('active-day'));
                    this.classList.add('active-day');
                    showDailyAgenda(this.getAttribute('data-date'));
                });
            });
        }

        function showDailyAgenda(dateString) {
            const agendaList = document.getElementById("daily-agenda-list");
            agendaList.innerHTML = "";
            const [year, month, day] = dateString.split('-').map(Number);
            const dateKey = `${year}-${month}-${day}`;

            const selectedEvents = events[dateKey] || [];
            if (selectedEvents.length > 0) {
                selectedEvents.forEach(event => {
                    const agendaItem = document.createElement("div");
                    let borderColorClass;
                    if (event.type === "task") {
                        borderColorClass = "border-indigo-500";
                    } else if (event.type === "exam") {
                        borderColorClass = "border-red-500";
                    } else {
                        borderColorClass = "border-blue-500";
                    }
                    agendaItem.className = `relative bg-gray-50 p-4 rounded-xl border-l-4 ${borderColorClass} hover:shadow-md transition-shadow duration-200`;
                    agendaItem.innerHTML = `<p class="font-semibold text-gray-800">${event.name}</p>`;
                    agendaList.appendChild(agendaItem);
                });
            } else {
                agendaList.innerHTML = '<p class="text-gray-500 text-center">Tidak ada agenda pada tanggal ini.</p>';
            }
        }

        document.getElementById("prev-month").addEventListener("click", () => {
            currentDate.setMonth(currentDate.getMonth() - 1);
            renderCalendar();
        });

        document.getElementById("next-month").addEventListener("click", () => {
            currentDate.setMonth(currentDate.getMonth() + 1);
            renderCalendar();
        });

        // Dropdown Profile
        const profileTrigger = document.getElementById('profile-trigger');
        const profileDropdown = document.getElementById('profile-dropdown');

        profileTrigger.addEventListener('click', () => {
            profileDropdown.classList.toggle('hidden');
        });

        document.addEventListener('click', (event) => {
            if (!profileTrigger.contains(event.target) && !profileDropdown.contains(event.target)) {
                profileDropdown.classList.add('hidden');
            }
        });

        // Navbar Active State Management
        document.addEventListener('DOMContentLoaded', function () {
            const navLinks = document.querySelectorAll('#nav-menu a');
            const activeIndicator = document.getElementById('active-indicator');
            const navMenu = document.getElementById('nav-menu');
            const hamburgerBtn = document.getElementById('hamburger-btn');

            function moveIndicator(targetElement) {
                if (!targetElement) return;
                const menuRect = navMenu.getBoundingClientRect();
                const targetRect = targetElement.getBoundingClientRect();

                const newLeft = targetRect.left - menuRect.left;
                const newWidth = targetRect.width;

                activeIndicator.style.left = newLeft + 'px';
                activeIndicator.style.width = newWidth + 'px';
            }

            function setActive(targetElement) {
                navLinks.forEach(link => {
                    link.classList.remove('text-white', 'font-semibold');
                    link.classList.add('text-gray-500', 'hover:text-gray-900');
                });

                if (targetElement) {
                    targetElement.classList.add('text-white', 'font-semibold');
                    targetElement.classList.remove('text-gray-500', 'hover:text-gray-900');
                }
            }

            // Set initial active state for "Schedule" button
            const initialActiveButton = document.getElementById('schedule-btn');
            if (initialActiveButton && window.innerWidth >= 1024) {
                moveIndicator(initialActiveButton);
                setActive(initialActiveButton);
            }

            navLinks.forEach(link => {
                link.addEventListener('click', function (event) {
                    // Cek apakah link adalah 'schedule', jika ya, cegah perilaku default agar tidak langsung pindah halaman
                    if (this.id === 'schedule-btn') {
                        event.preventDefault();
                    }
                    if (window.innerWidth >= 1024) {
                        moveIndicator(this);
                        setActive(this);
                    }
                    navMenu.classList.add('hidden');
                    // Jika bukan link "schedule", biarkan navigasi berjalan
                    if (this.href && this.id !== 'schedule-btn') {
                        window.location.href = this.href;
                    }
                });
            });

            hamburgerBtn.addEventListener('click', function () {
                navMenu.classList.toggle('hidden');
            });

            window.addEventListener('resize', function () {
                if (window.innerWidth >= 1024) {
                    navMenu.classList.remove('hidden');
                    const currentActiveButton = document.querySelector('#nav-menu a.text-white');
                    if (currentActiveButton) {
                        moveIndicator(currentActiveButton);
                        setActive(currentActiveButton);
                    }
                } else {
                    navMenu.classList.add('hidden');
                }
            });
        });

        // Initial render
        renderCalendar();
    </script>
</body>

</html>