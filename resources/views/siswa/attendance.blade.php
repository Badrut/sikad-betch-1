<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Attendance - SMK Student Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .active-indicator {
            transition: left 300ms, width 300ms;
        }

        .card-hover {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .attendance-day {
            transition: all 0.2s ease;
        }

        .attendance-day:hover {
            transform: scale(1.05);
        }

        .progress-ring {
            transition: stroke-dashoffset 0.5s ease;
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
                    class="absolute lg:relative top-full left-0 right-0 lg:flex lg:items-center lg:space-x-6 bg-white lg:bg-transparent shadow-md lg:shadow-none p-4 lg:p-0 hidden flex-col lg:flex-row space-y-4 lg:space-y-0 z-50">
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
                        <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="CurrentColor" stroke-width="2">
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
            <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-6">
                <h1 class="text-2xl md:text-3xl font-bold text-gray-800 mb-4 md:mb-0">Attendance Record</h1>
                <div class="flex items-center space-x-3">
                    <div class="relative">
                        <select id="month-select-top"
                            class="appearance-none bg-white border border-gray-300 rounded-2xl py-2 px-4 pr-8 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option value="august">August 2025</option>
                            <option value="july">July 2025</option>
                            <option value="june">June 2025</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <i class="fas fa-chevron-down text-xs"></i>
                        </div>
                    </div>
                    <button
                        class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-2xl text-sm font-semibold transition-colors duration-300 flex items-center space-x-2">
                        <i class="fas fa-download"></i>
                        <span>Export</span>
                    </button>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

                <div class="lg:col-span-2 space-y-6">
                    <div class="bg-white p-6 rounded-3xl shadow-sm card-hover">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                            <div class="bg-gradient-to-br from-green-50 to-green-100 p-5 rounded-2xl text-center">
                                <div class="text-3xl font-bold text-green-600" id="attendance-rate">97%</div>
                                <p class="text-sm text-gray-600 mt-2">Attendance Rate</p>
                                <div class="mt-3 flex items-center justify-center text-xs text-green-500 font-semibold"
                                    id="rate-change">
                                    <i class="fas fa-arrow-up mr-1"></i>
                                    +2% from last month
                                </div>
                            </div>
                            <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-5 rounded-2xl text-center">
                                <div class="text-3xl font-bold text-blue-600" id="days-present">194</div>
                                <p class="text-sm text-gray-600 mt-2">Days Present</p>
                                <p class="text-xs text-gray-500 mt-1">Out of 200 school days</p>
                            </div>
                            <div class="bg-gradient-to-br from-red-50 to-red-100 p-5 rounded-2xl text-center">
                                <div class="text-3xl font-bold text-red-600" id="days-absent">6</div>
                                <p class="text-sm text-gray-600 mt-2">Days Absent</p>
                                <p class="text-xs text-gray-500 mt-1" id="absent-details">3 sick, 2 permission, 1
                                    unexcused</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-3xl shadow-sm card-hover">
                        <div
                            class="flex flex-col sm:flex-row justify-between items-center pb-4 mb-6 space-y-4 sm:space-y-0">
                            <h2 class="text-xl font-bold text-gray-800 flex items-center gap-2" id="monthly-title">
                                <i class="fas fa-calendar-alt text-blue-500"></i>
                                August 2025 Attendance
                            </h2>
                            <div class="flex items-center space-x-2">
                                <select id="month-select-calendar"
                                    class="appearance-none bg-gray-100 border-0 rounded-2xl py-2 px-4 pr-8 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                    <option value="august">August 2025</option>
                                    <option value="july">July 2025</option>
                                    <option value="june">June 2025</option>
                                </select>
                            </div>
                        </div>

                        <div class="bg-gray-50 p-5 rounded-2xl mb-6 grid grid-cols-2 md:grid-cols-4 gap-4 text-center">
                            <div>
                                <p class="text-2xl font-bold text-green-600" id="stat-present">20</p>
                                <p class="text-sm text-gray-600">Present</p>
                            </div>
                            <div>
                                <p class="text-2xl font-bold text-yellow-600" id="stat-permission">2</p>
                                <p class="text-sm text-gray-600">Permission</p>
                            </div>
                            <div>
                                <p class="text-2xl font-bold text-blue-600" id="stat-sick">1</p>
                                <p class="text-sm text-gray-600">Sick</p>
                            </div>
                            <div>
                                <p class="text-2xl font-bold text-red-600" id="stat-absent">3</p>
                                <p class="text-sm text-gray-600">Absent</p>
                            </div>
                        </div>

                        <div class="grid grid-cols-7 gap-2 text-center text-sm font-semibold text-gray-700 mb-3">
                            <div class="p-2 text-red-500">Sun</div>
                            <div class="p-2">Mon</div>
                            <div class="p-2">Tue</div>
                            <div class="p-2">Wed</div>
                            <div class="p-2">Thu</div>
                            <div class="p-2">Fri</div>
                            <div class="p-2">Sat</div>
                        </div>
                        <div id="calendar-grid" class="grid grid-cols-7 gap-2 text-center text-sm">
                            </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <div class="bg-white p-6 rounded-3xl shadow-sm card-hover">
                        <h3 class="text-lg font-semibold text-gray-800 mb-5 flex items-center gap-2">
                            <i class="fas fa-info-circle text-blue-500"></i>
                            Attendance Legend
                        </h3>
                        <div class="space-y-4">
                            <div class="flex items-center space-x-3 p-3 bg-green-50 rounded-xl">
                                <div class="w-5 h-5 rounded-full bg-green-500"></div>
                                <div>
                                    <p class="text-sm font-medium text-gray-800">Present</p>
                                    <p class="text-xs text-gray-500">Student attended classes</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-3 p-3 bg-blue-50 rounded-xl">
                                <div class="w-5 h-5 rounded-full bg-blue-500"></div>
                                <div>
                                    <p class="text-sm font-medium text-gray-800">Sick Leave</p>
                                    <p class="text-xs text-gray-500">Absent with medical reason</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-3 p-3 bg-yellow-50 rounded-xl">
                                <div class="w-5 h-5 rounded-full bg-yellow-500"></div>
                                <div>
                                    <p class="text-sm font-medium text-gray-800">Permission</p>
                                    <p class="text-xs text-gray-500">Absent with prior permission</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-3 p-3 bg-red-50 rounded-xl">
                                <div class="w-5 h-5 rounded-full bg-red-500"></div>
                                <div>
                                    <p class="text-sm font-medium text-gray-800">Absent</p>
                                    <p class="text-xs text-gray-500">Unexcused absence</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-3 p-3 bg-gray-50 rounded-xl">
                                <div class="w-5 h-5 rounded-full bg-gray-300"></div>
                                <div>
                                    <p class="text-sm font-medium text-gray-800">Weekend/Holiday</p>
                                    <p class="text-xs text-gray-500">No school activities</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-3xl shadow-sm card-hover">
                        <h3 class="text-lg font-semibold text-gray-800 mb-5 flex items-center gap-2">
                            <i class="fas fa-history text-purple-500"></i>
                            Recent Attendance
                        </h3>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-3 bg-green-50 rounded-xl">
                                <div>
                                    <p class="text-sm font-medium text-gray-800">Today</p>
                                    <p class="text-xs text-gray-500" id="recent-date">August 31, 2025</p>
                                </div>
                                <span
                                    class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Present</span>
                            </div>
                            <div class="flex items-center justify-between p-3 bg-blue-50 rounded-xl">
                                <div>
                                    <p class="text-sm font-medium text-gray-800">Yesterday</p>
                                    <p class="text-xs text-gray-500">August 30, 2025</p>
                                </div>
                                <span
                                    class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Sick</span>
                            </div>
                            <div class="flex items-center justify-between p-3 bg-green-50 rounded-xl">
                                <div>
                                    <p class="text-sm font-medium text-gray-800">August 29</p>
                                    <p class="text-xs text-gray-500">Monday</p>
                                </div>
                                <span
                                    class="bg-green-100 text-green-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Present</span>
                            </div>
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-xl">
                                <div>
                                    <p class="text-sm font-medium text-gray-800">August 28</p>
                                    <p class="text-xs text-gray-500">Sunday</p>
                                </div>
                                <span
                                    class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Weekend</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-6 rounded-3xl shadow-sm card-hover">
                        <h3 class="text-lg font-semibold text-gray-800 mb-4 flex items-center gap-2">
                            <i class="fas fa-lightbulb text-yellow-500"></i>
                            Tips for Good Attendance
                        </h3>
                        <ul class="space-y-3 text-sm text-gray-600">
                            <li class="flex items-start space-x-2">
                                <i class="fas fa-check-circle text-green-500 mt-1"></i>
                                <span>Maintain a consistent sleep schedule</span>
                            </li>
                            <li class="flex items-start space-x-2">
                                <i class="fas fa-check-circle text-green-500 mt-1"></i>
                                <span>Notify school in advance if you'll be absent</span>
                            </li>
                            <li class="flex items-start space-x-2">
                                <i class="fas fa-check-circle text-green-500 mt-1"></i>
                                <span>Keep track of important school dates</span>
                            </li>
                            <li class="flex items-start space-x-2">
                                <i class="fas fa-check-circle text-green-500 mt-1"></i>
                                <span>Stay healthy with proper nutrition and exercise</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const navLinks = document.querySelectorAll('#nav-menu a');
            const activeIndicator = document.getElementById('active-indicator');
            const navMenu = document.getElementById('nav-menu');
            const hamburgerBtn = document.getElementById('hamburger-btn');
            const profileTrigger = document.getElementById('profile-trigger');
            const profileDropdown = document.getElementById('profile-dropdown');

            const monthSelectTop = document.getElementById('month-select-top');
            const monthSelectCalendar = document.getElementById('month-select-calendar');
            const calendarGrid = document.getElementById('calendar-grid');
            const monthlyTitle = document.getElementById('monthly-title');

            const statPresent = document.getElementById('stat-present');
            const statPermission = document.getElementById('stat-permission');
            const statSick = document.getElementById('stat-sick');
            const statAbsent = document.getElementById('stat-absent');

            // Sample attendance data for each month
            const attendanceData = {
                'june': {
                    'present': 20,
                    'permission': 1,
                    'sick': 2,
                    'absent': 1,
                    'days': 30,
                    'weekends': [0, 6],
                    'absentDays': [11],
                    'sickDays': [18, 25],
                    'permissionDays': [2],
                },
                'july': {
                    'present': 22,
                    'permission': 0,
                    'sick': 1,
                    'absent': 0,
                    'days': 31,
                    'weekends': [0, 6],
                    'absentDays': [],
                    'sickDays': [17],
                    'permissionDays': [],
                },
                'august': {
                    'present': 20,
                    'permission': 2,
                    'sick': 1,
                    'absent': 3,
                    'days': 31,
                    'weekends': [0, 6],
                    'absentDays': [11, 24, 28],
                    'sickDays': [17],
                    'permissionDays': [5, 12],
                }
            };

            const today = new Date();
            const currentMonth = today.toLocaleString('default', {
                month: 'long'
            }).toLowerCase();
            const currentDay = today.getDate();

            function renderCalendar(month) {
                const data = attendanceData[month];
                const daysInMonth = data.days;
                const firstDay = new Date(2025, new Date(month + ' 1, 2025').getMonth(), 1).getDay(); // 0 for Sunday, 1 for Monday

                calendarGrid.innerHTML = '';

                // Add empty divs for preceding days of the week
                for (let i = 0; i < firstDay; i++) {
                    const emptyDay = document.createElement('div');
                    emptyDay.classList.add('p-4', 'text-gray-400', 'attendance-day');
                    calendarGrid.appendChild(emptyDay);
                }

                for (let i = 1; i <= daysInMonth; i++) {
                    const dayElement = document.createElement('div');
                    dayElement.classList.add('p-4', 'font-semibold', 'rounded-lg', 'attendance-day');
                    dayElement.textContent = i;

                    const date = new Date(2025, new Date(month + ' 1, 2025').getMonth(), i);
                    const isWeekend = data.weekends.includes(date.getDay());

                    if (isWeekend) {
                        dayElement.classList.add('bg-gray-100', 'text-gray-400');
                    } else if (data.sickDays.includes(i)) {
                        dayElement.classList.add('bg-blue-100', 'text-blue-800');
                    } else if (data.permissionDays.includes(i)) {
                        dayElement.classList.add('bg-yellow-100', 'text-yellow-800');
                    } else if (data.absentDays.includes(i)) {
                        dayElement.classList.add('bg-red-100', 'text-red-800');
                    } else {
                        dayElement.classList.add('bg-green-100', 'text-green-800');
                    }
                    
                    // Highlight today's date if it's in the current month
                    if (month === currentMonth && i === currentDay) {
                         dayElement.classList.add('ring-2', 'ring-green-500', 'ring-offset-2', 'relative');
                         dayElement.innerHTML = `${i} <div class="absolute top-1 right-1 h-2 w-2 bg-green-500 rounded-full"></div>`;
                    }

                    calendarGrid.appendChild(dayElement);
                }
            }

            function updateSummary(month) {
                const data = attendanceData[month];
                statPresent.textContent = data.present;
                statPermission.textContent = data.permission;
                statSick.textContent = data.sick;
                statAbsent.textContent = data.absent;
            }

            function handleMonthChange(event) {
                const selectedMonth = event.target.value;
                const monthName = selectedMonth.charAt(0).toUpperCase() + selectedMonth.slice(1);
                monthlyTitle.innerHTML = `<i class="fas fa-calendar-alt text-blue-500"></i> ${monthName} 2025 Attendance`;
                renderCalendar(selectedMonth);
                updateSummary(selectedMonth);
                monthSelectTop.value = selectedMonth;
                monthSelectCalendar.value = selectedMonth;
            }

            monthSelectTop.addEventListener('change', handleMonthChange);
            monthSelectCalendar.addEventListener('change', handleMonthChange);

            // Initial render for August
            monthSelectTop.value = 'august';
            monthSelectCalendar.value = 'august';
            renderCalendar('august');
            updateSummary('august');

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

            // Set initial active state for "Attendance" button
            const initialActiveButton = document.getElementById('attendance-btn');
            if (initialActiveButton && window.innerWidth >= 1024) {
                moveIndicator(initialActiveButton);
                setActive(initialActiveButton);
            }

            navLinks.forEach(link => {
                link.addEventListener('click', function (event) {
                    if (this.id === 'attendance-btn') {
                        event.preventDefault();
                    }
                    if (window.innerWidth >= 1024) {
                        moveIndicator(this);
                        setActive(this);
                    }
                    navMenu.classList.add('hidden');
                    if (this.href && this.id !== 'attendance-btn') {
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

            // Profile dropdown logic
            profileTrigger.addEventListener('click', (event) => {
                event.stopPropagation(); // Prevents the document click listener from firing
                profileDropdown.classList.toggle('hidden');
            });

            document.addEventListener('click', (event) => {
                if (!profileTrigger.contains(event.target) && !profileDropdown.contains(event.target)) {
                    profileDropdown.classList.add('hidden');
                }
            });

        });
    </script>
</body>

</html>