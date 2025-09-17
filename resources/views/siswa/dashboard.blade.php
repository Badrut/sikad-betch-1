<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMK Student Dashboard</title>
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

        .progress-ring {
            transition: stroke-dashoffset 0.5s ease;
        }

        .calendar-day:hover {
            background-color: #e5e7eb;
            cursor: pointer;
        }

        .calendar-day.today {
            background-color: #10b981;
            color: white;
        }

        .dropdown-animate {
            transition: opacity 0.3s ease-out, transform 0.3s ease-out;
            transform-origin: top;
            opacity: 0;
            transform: scaleY(0.95) translateY(-5px);
            display: none;
        }

        .dropdown-animate.active {
            opacity: 1;
            transform: scaleY(1) translateY(0);
            display: block;
        }
    </style>
</head>

<body class="bg-gray-100">

    <div class="min-h-screen">

        <nav class="flex items-center justify-between px-6 py-3 bg-white shadow-md">
            <div class="flex items-center space-x-6">
                <img src="images/logo.png" alt="Logo" width="50px" height="50px">

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
                <div class="relative">
                    <div id="profile-trigger"
                        class="flex items-center space-x-2 cursor-pointer border-2 border-gray-300 p-1 rounded-2xl">
                        <img src="https://api.dicebear.com/7.x/adventurer/svg?seed=Richardo" alt="Richardo"
                            class="rounded-2xl h-10 w-10">
                        <div>
                            <div class="text-sm font-semibold text-gray-800">Richardo</div>
                            <div class="text-xs text-gray-500">Student</div>
                        </div>
                    </div>
                    <div id="profile-dropdown"
                        class="absolute top-full right-0 mt-2 w-48 bg-white rounded-lg shadow-lg z-50 dropdown-animate">
                        <a href="profile" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-t-lg">
                            <i class="fas fa-user-circle mr-2"></i>Profile
                        </a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-b-lg">
                            <i class="fas fa-sign-out-alt mr-2"></i>Logout
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <div class="p-4 md:p-8 grid grid-cols-1 md:grid-cols-3 lg:grid-cols-12 gap-6 md:gap-8">
            <div class="md:col-span-2 lg:col-span-8 space-y-6 md:space-y-8">

                <div class="bg-white p-6 md:p-8 rounded-3xl shadow-sm card-hover">
                    <div class="flex flex-col md:flex-row items-center md:items-start gap-6">
                        <div class="relative">
                            <img src="https://api.dicebear.com/7.x/adventurer/svg?seed=Mia" alt="Mia Williams"
                                class="h-24 w-24 md:h-28 md:w-28 rounded-full border-4 border-gray-200 shadow-md">
                            <div
                                class="absolute -bottom-2 -right-2 bg-green-500 text-white text-xs font-bold py-1 px-2 rounded-lg">
                                Online
                            </div>
                        </div>
                        <div class="flex-1 text-center md:text-left">
                            <h2 class="text-2xl md:text-3xl font-bold text-gray-800">Welcome, Mia Williams! 👋</h2>
                            <p class="text-gray-600 mt-2">Hello Mia, have a great day at school!</p>
                            <div
                                class="mt-4 flex flex-wrap items-center justify-center md:justify-start gap-4 text-sm text-gray-500">
                                <span class="flex items-center space-x-2 bg-gray-100 py-1 px-3 rounded-full">
                                    <i class="fas fa-graduation-cap text-blue-500"></i>
                                    <span>Grade 12</span>
                                </span>
                                <span class="flex items-center space-x-2 bg-gray-100 py-1 px-3 rounded-full">
                                    <i class="fas fa-birthday-cake text-pink-500"></i>
                                    <span>Born: Nov 25, 2009</span>
                                </span>
                                <span class="flex items-center space-x-2 bg-gray-100 py-1 px-3 rounded-full">
                                    <i class="fas fa-book text-purple-500"></i>
                                    <span>Science Major</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 md:grid-cols-4 gap-5 mt-8">
                        <div class="bg-gradient-to-br from-green-50 to-green-100 p-4 rounded-2xl text-center">
                            <div class="text-xl md:text-2xl font-bold text-green-600">97%</div>
                            <p class="text-xs text-gray-600 mt-1">Attendance</p>
                            <div class="w-full bg-gray-200 rounded-full h-1.5 mt-2">
                                <div class="bg-green-500 h-1.5 rounded-full" style="width: 97%"></div>
                            </div>
                        </div>
                        <div class="bg-gradient-to-br from-purple-50 to-purple-100 p-4 rounded-2xl text-center">
                            <div class="text-xl md:text-2xl font-bold text-purple-600">258+</div>
                            <p class="text-xs text-gray-600 mt-1">Task Completed</p>
                            <div class="w-full bg-gray-200 rounded-full h-1.5 mt-2">
                                <div class="bg-purple-500 h-1.5 rounded-full" style="width: 85%"></div>
                            </div>
                        </div>
                        <div class="bg-gradient-to-br from-orange-50 to-orange-100 p-4 rounded-2xl text-center">
                            <div class="text-xl md:text-2xl font-bold text-orange-600">64%</div>
                            <p class="text-xs text-gray-600 mt-1">Task in Progress</p>
                            <div class="w-full bg-gray-200 rounded-full h-1.5 mt-2">
                                <div class="bg-orange-500 h-1.5 rounded-full" style="width: 64%"></div>
                            </div>
                        </div>
                        <div class="bg-gradient-to-br from-pink-50 to-pink-100 p-4 rounded-2xl text-center">
                            <div class="text-xl md:text-2xl font-bold text-pink-600">245</div>
                            <p class="text-xs text-gray-600 mt-1">Reward Points</p>
                            <div class="w-full bg-gray-200 rounded-full h-1.5 mt-2">
                                <div class="bg-pink-500 h-1.5 rounded-full" style="width: 70%"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 md:p-8 rounded-3xl shadow-sm card-hover">
                    <h3 class="text-lg md:text-xl font-semibold text-gray-800 mb-6 flex items-center gap-3">
                        <i class="fas fa-rocket text-blue-500"></i>
                        Shortcut to Apps
                    </h3>
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-5">
                        <a href="raport"
                            class="flex flex-col items-center justify-center p-5 rounded-2xl bg-gray-50 hover:bg-blue-50 transition-all duration-300 group">
                            <div
                                class="bg-blue-100 p-4 rounded-full text-blue-500 group-hover:bg-blue-200 transition-colors duration-300 mb-3">
                                <i class="fas fa-chart-bar text-xl"></i>
                            </div>
                            <span class="text-sm font-semibold text-gray-800 group-hover:text-blue-600">Raport</span>
                            <p class="text-xs text-gray-500 text-center mt-1">Check your grades</p>
                        </a>
                        <a href="attendance"
                            class="flex flex-col items-center justify-center p-5 rounded-2xl bg-gray-50 hover:bg-pink-50 transition-all duration-300 group">
                            <div
                                class="bg-pink-100 p-4 rounded-full text-pink-500 group-hover:bg-pink-200 transition-colors duration-300 mb-3">
                                <i class="fas fa-user text-xl"></i>
                            </div>
                            <span class="text-sm font-semibold text-gray-800 group-hover:text-pink-600">Attendance</span>
                            <p class="text-xs text-gray-500 text-center mt-1">Fill in attendance</p>
                        </a>
                        <a href="schedule"
                            class="flex flex-col items-center justify-center p-5 rounded-2xl bg-gray-50 hover:bg-purple-50 transition-all duration-300 group">
                            <div
                                class="bg-purple-100 p-4 rounded-full text-purple-500 group-hover:bg-purple-200 transition-colors duration-300 mb-3">
                                <i class="fas fa-calendar-alt text-xl"></i>
                            </div>
                            <span
                                class="text-sm font-semibold text-gray-800 group-hover:text-purple-600">Schedule</span>
                            <p class="text-xs text-gray-500 text-center mt-1">See class timetable</p>
                        </a>
                    </div>
                </div>

                <div class="bg-white p-6 md:p-8 rounded-3xl shadow-sm card-hover">
                    <div class="flex items-center justify-between mb-6">
                        <h3 class="text-lg md:text-xl font-semibold text-gray-800 flex items-center gap-3">
                            <i class="fas fa-book-open text-blue-500"></i>
                            List Buku yang Dipinjam
                        </h3>
                        <a href="#"
                            class="text-sm text-blue-500 hover:text-blue-700 font-medium flex items-center gap-1">
                            View All
                            <i class="fas fa-chevron-right text-xs"></i>
                        </a>
                    </div>
                    <div class="space-y-4">
                        <div
                            class="bg-gray-50 p-4 rounded-2xl flex items-center space-x-4 hover:bg-gray-100 transition-colors duration-300">
                            <div class="h-16 w-12 bg-cover bg-center rounded-md shadow-sm"
                                style="background-image: url('https://via.placeholder.com/60x80.png?text=Buku')"></div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-800">Pengantar Kecerdasan Buatan</p>
                                <p class="text-xs text-gray-500 mt-1 flex items-center gap-2">
                                    <i class="far fa-calendar-alt"></i>
                                    Due date: 20 Aug 2025
                                </p>
                            </div>
                            <div class="bg-red-100 text-red-600 text-xs font-medium py-1 px-2 rounded-full">
                                5 days left
                            </div>
                        </div>
                        <div
                            class="bg-gray-50 p-4 rounded-2xl flex items-center space-x-4 hover:bg-gray-100 transition-colors duration-300">
                            <div class="h-16 w-12 bg-cover bg-center rounded-md shadow-sm"
                                style="background-image: url('https://via.placeholder.com/60x80.png?text=Buku')"></div>
                            <div class="flex-1">
                                <p class="text-sm font-medium text-gray-800">Sejarah Indonesia: Jilid 2</p>
                                <p class="text-xs text-gray-500 mt-1 flex items-center gap-2">
                                    <i class="far fa-calendar-alt"></i>
                                    Due date: 25 Aug 2025
                                </p>
                            </div>
                            <div class="bg-yellow-100 text-yellow-600 text-xs font-medium py-1 px-2 rounded-full">
                                10 days left
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="md:col-span-1 lg:col-span-4 space-y-6 md:space-y-8">
                <div class="bg-white p-6 rounded-3xl shadow-sm card-hover">
                    <div class="flex justify-between items-center mb-5">
                        <button class="text-gray-400 hover:text-gray-600 p-2 rounded-full hover:bg-gray-100">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <h3 id="calendar-month-year" class="text-md font-semibold text-gray-800"></h3>
                        <button class="text-gray-400 hover:text-gray-600 p-2 rounded-full hover:bg-gray-100">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                    <div class="grid grid-cols-7 gap-2 text-center text-xs text-gray-500 font-medium mb-2">
                        <div>Sun</div>
                        <div>Mon</div>
                        <div>Tue</div>
                        <div>Wed</div>
                        <div>Thu</div>
                        <div>Fri</div>
                        <div>Sat</div>
                    </div>
                    <div id="calendar-days-grid" class="grid grid-cols-7 gap-2 text-center text-sm">
                    </div>
                </div>

                <div class="bg-white p-6 rounded-3xl shadow-sm card-hover">
                    <div class="flex justify-between items-center mb-5">
                        <h3 class="text-md font-semibold text-gray-800 flex items-center gap-2">
                            <i class="fas fa-calendar-day text-purple-500"></i>
                            My Schedule - Today
                        </h3>
                        <a href="#" class="text-xs text-blue-500 hover:text-blue-700 font-medium">View All</a>
                    </div>
                    <div class="space-y-4">
                        <div class="border-l-4 border-blue-500 pl-4 py-3">
                            <p class="text-xs text-gray-500 flex items-center gap-2">
                                <i class="far fa-clock"></i>
                                08:00 - 09:30 AM
                            </p>
                            <p class="text-sm font-semibold text-gray-800 mt-1">English Literature</p>
                            <p class="text-xs text-gray-500 mt-1 flex items-center gap-2">
                                <i class="fas fa-map-marker-alt"></i>
                                Room: A-102
                            </p>
                        </div>
                        <div class="border-l-4 border-green-500 pl-4 py-3">
                            <p class="text-xs text-gray-500 flex items-center gap-2">
                                <i class="far fa-clock"></i>
                                10:00 - 11:30 AM
                            </p>
                            <p class="text-sm font-semibold text-gray-800 mt-1">Web Programming II</p>
                            <p class="text-xs text-gray-500 mt-1 flex items-center gap-2">
                                <i class="fas fa-map-marker-alt"></i>
                                Room: B-205
                            </p>
                        </div>
                        <div class="border-l-4 border-yellow-500 pl-4 py-3">
                            <p class="text-xs text-gray-500 flex items-center gap-2">
                                <i class="far fa-clock"></i>
                                01:00 - 02:30 PM
                            </p>
                            <p class="text-sm font-semibold text-gray-800 mt-1">Mathematics</p>
                            <p class="text-xs text-gray-500 mt-1 flex items-center gap-2">
                                <i class="fas fa-map-marker-alt"></i>
                                Room: C-301
                            </p>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-6 rounded-3xl shadow-sm card-hover">
                    <div class="flex items-center justify-between mb-5">
                        <h3 class="text-md font-semibold text-gray-800 flex items-center gap-2">
                            <i class="fas fa-trophy text-green-500"></i>
                            Student Activity
                        </h3>
                        <a href="#" class="text-xs text-blue-500 hover:text-blue-700 font-medium">View All</a>
                    </div>
                    <div class="space-y-4">
                        <div class="bg-gray-50 p-4 rounded-2xl flex items-start space-x-4">
                            <div class="w-16 h-16 bg-cover bg-center rounded-lg flex-shrink-0"
                                style="background-image: url('https://via.placeholder.com/80.png?text=Lomba')"></div>
                            <div>
                                <p class="text-sm font-medium text-gray-800">Mia Williams wins Science Olympiad!</p>
                                <p class="text-xs text-gray-500 mt-2">Mia secured first place in the regional Science
                                    Olympiad. We are so proud!</p>
                                <div class="text-xs text-gray-400 mt-2 flex items-center gap-2">
                                    <i class="far fa-clock"></i>
                                    2 hours ago
                                </div>
                            </div>
                        </div>
                        <div class="bg-gray-50 p-4 rounded-2xl flex items-start space-x-4">
                            <div class="w-16 h-16 bg-cover bg-center rounded-lg flex-shrink-0"
                                style="background-image: url('https://via.placeholder.com/80.png?text=Tim+Basket')">
                            </div>
                            <div>
                                <p class="text-sm font-medium text-gray-800">Our school basketball team has won the
                                    city-wide tournament.</p>
                                <p class="text-xs text-gray-500 mt-2">Read more about their victory in the sports news
                                    section!</p>
                                <div class="text-xs text-gray-400 mt-2 flex items-center gap-2">
                                    <i class="far fa-clock"></i>
                                    1 day ago
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // --- Dropdown Profile Logic ---
            const profileTrigger = document.getElementById('profile-trigger');
            const profileDropdown = document.getElementById('profile-dropdown');

            profileTrigger.addEventListener('click', (event) => {
                event.stopPropagation(); // Prevents the document click listener from firing immediately
                profileDropdown.classList.toggle('active');
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', (event) => {
                if (!profileTrigger.contains(event.target) && !profileDropdown.contains(event.target)) {
                    profileDropdown.classList.remove('active');
                }
            });

            // --- Calendar Logic ---
            const calendarMonthYear = document.getElementById('calendar-month-year');
            const calendarDaysGrid = document.getElementById('calendar-days-grid');

            function renderCalendar() {
                const today = new Date();
                const currentMonth = today.getMonth();
                const currentYear = today.getFullYear();
                const currentDate = today.getDate();

                const monthNames = ["January", "February", "March", "April", "May", "June", "July", "August",
                    "September", "October", "November", "December"
                ];

                calendarMonthYear.textContent = `${monthNames[currentMonth]} ${currentYear}`;
                calendarDaysGrid.innerHTML = ''; // Clear previous days

                const firstDayOfMonth = new Date(currentYear, currentMonth, 1)
                    .getDay(); // 0 = Sunday, 1 = Monday...
                const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();

                // Add blank divs for days before the 1st
                for (let i = 0; i < firstDayOfMonth; i++) {
                    const blankDay = document.createElement('div');
                    blankDay.classList.add('py-2', 'text-gray-300');
                    calendarDaysGrid.appendChild(blankDay);
                }

                // Add divs for each day of the month
                for (let day = 1; day <= daysInMonth; day++) {
                    const dayDiv = document.createElement('div');
                    dayDiv.textContent = day;
                    dayDiv.classList.add('py-2', 'rounded-full', 'calendar-day');

                    // Highlight today's date
                    if (day === currentDate) {
                        dayDiv.classList.add('today', 'font-semibold');
                    }

                    calendarDaysGrid.appendChild(dayDiv);
                }
            }

            // --- Existing Navigation Bar Logic ---
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

            // Set initial active state for "Dashboard" button
            const initialActiveButton = document.getElementById('dashboard-btn');
            if (initialActiveButton && window.innerWidth >= 1024) {
                moveIndicator(initialActiveButton);
                setActive(initialActiveButton);
            }

            navLinks.forEach(link => {
                link.addEventListener('click', function (event) {
                    if (this.id === 'dashboard-btn') {
                        event.preventDefault();
                    }
                    if (window.innerWidth >= 1024) {
                        moveIndicator(this);
                        setActive(this);
                    }
                    navMenu.classList.add('hidden');
                    if (this.href && this.id !== 'dashboard-btn') {
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

            // Call the render function
            renderCalendar();
        });
    </script>
</body>

</html>