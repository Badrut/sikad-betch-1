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
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .active-indicator {
            transition: left 300ms, width 300ms;
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
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
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
                            <a href="#" id="task-btn"
                                class="relative flex items-center space-x-2 text-gray-500 hover:text-gray-900 transition-colors duration-300 rounded-2xl py-2 px-4 z-20">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                </svg>
                                <span>Task</span>
                            </a>
                            <a href="#" id="profile-btn"
                                class="relative flex items-center space-x-2 text-gray-500 hover:text-gray-900 transition-colors duration-300 rounded-2xl py-2 px-4 z-20">
                                <svg class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                                <span>Profile</span>
                            </a>
                        </div>
                    </div>
                
                    <div class="flex items-center space-x-6">
                        <div class="relative">
                            <svg class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9" />
                            </svg>
                            <span class="absolute top-0 right-0 block h-2 w-2 rounded-2xl bg-red-500 ring-2 ring-white"></span>
                        </div>
                        <div id="profile-trigger"
                            class="flex items-center space-x-2 cursor-pointer border-2 border-gray-300 p-1 rounded-2xl">
                            <img src="https://api.dicebear.com/7.x/adventurer/svg?seed=Richardo" alt="Richardo"
                                class="rounded-2xl h-10 w-10">
                            <div>
                                <div class="text-sm font-semibold text-gray-800">Richardo</div>
                                <div class="text-xs text-gray-500">Student</div>
                            </div>
                        </div>
                    </div>
                </nav>

        <div class="p-4 md:p-8 grid grid-cols-1 md:grid-cols-3 lg:grid-cols-12 gap-4 md:gap-8">
            <div class="md:col-span-2 lg:col-span-8 space-y-4 md:space-y-8">

                <div class="bg-white p-4 md:p-6 rounded-3xl shadow-sm grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div class="flex items-center space-x-4">
                        <img src="https://api.dicebear.com/7.x/adventurer/svg?seed=Mia" alt="Mia Williams"
                            class="h-20 w-20 md:h-24 md:w-24 rounded-full border-4 border-gray-200">
                        <div>
                            <h2 class="text-xl md:text-2xl font-bold text-gray-800">Welcome, Mia Williams 👋</h2>
                            <p class="text-sm text-gray-600 mt-1">Hello Mia, have a great day at school!</p>
                            <div class="mt-2 flex items-center space-x-2 text-xs text-gray-500">
                                <span class="flex items-center space-x-1">
                                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 21a9 9 0 100-18 9 9 0 000 18z" />
                                        <path d="M15 10a3 3 0 11-6 0 3 3 0 016 0z" />
                                    </svg>
                                    <span>Grade 12</span>
                                </span>
                                <span class="flex items-center space-x-1">
                                    <svg class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                    </svg>
                                    <span>Born: Nov 25, 2009</span>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="grid grid-cols-2 gap-4">
                        <div class="flex flex-col items-center justify-center text-center">
                            <span class="text-lg md:text-xl font-bold text-green-500">97%</span>
                            <p class="text-xs md:text-sm text-gray-500">Attendance</p>
                        </div>
                        <div class="flex flex-col items-center justify-center text-center">
                            <span class="text-lg md:text-xl font-bold text-purple-500">258+</span>
                            <p class="text-xs md:text-sm text-gray-500">Task Completed</p>
                        </div>
                        <div class="flex flex-col items-center justify-center text-center">
                            <span class="text-lg md:text-xl font-bold text-orange-500">64%</span>
                            <p class="text-xs md:text-sm text-gray-500">Task in Progress</p>
                        </div>
                        <div class="flex flex-col items-center justify-center text-center">
                            <span class="text-lg md:text-xl font-bold text-pink-500">245</span>
                            <p class="text-xs md:text-sm text-gray-500">Reward Points</p>
                        </div>
                    </div>
                </div>

                <div class="bg-white p-4 md:p-6 rounded-3xl shadow-sm">
                    <h3 class="text-md md:text-lg font-semibold text-gray-800 mb-4">Shortcut to Apps</h3>
                    <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-4 gap-4 md:gap-6">
                        <a href="#"
                            class="flex flex-col items-center justify-center p-4 rounded-2xl bg-gray-50 hover:bg-gray-100 transition-colors duration-300">
                            <div class="bg-gray-100 p-4 rounded-full mb-2">
                                <svg class="h-10 w-10 text-blue-500" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M17 14v6m-3-3h6M6 10h2m-2 4h2m-2 4h2m-2 4h2M12 4v16M4 4h16a2 2 0 012 2v12a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2z" />
                                </svg>
                            </div>
                            <span class="text-sm font-semibold text-gray-800 text-center">Raport</span>
                            <p class="text-xs text-gray-500 text-center">Check your grades</p>
                        </a>
                        <a href="#"
                            class="flex flex-col items-center justify-center p-4 rounded-2xl bg-gray-50 hover:bg-gray-100 transition-colors duration-300">
                            <div class="bg-gray-100 p-4 rounded-full mb-2">
                                <svg class="h-10 w-10 text-green-500" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                                </svg>
                            </div>
                            <span class="text-sm font-semibold text-gray-800 text-center">Task</span>
                            <p class="text-xs text-gray-500 text-center">Submit your homework</p>
                        </a>
                        <a href="#"
                            class="flex flex-col items-center justify-center p-4 rounded-2xl bg-gray-50 hover:bg-gray-100 transition-colors duration-300">
                            <div class="bg-gray-100 p-4 rounded-full mb-2">
                                <svg class="h-10 w-10 text-purple-500" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                            <span class="text-sm font-semibold text-gray-800 text-center">Schedule</span>
                            <p class="text-xs text-gray-500 text-center">See class timetable</p>
                        </a>
                        <a href="#"
                            class="flex flex-col items-center justify-center p-4 rounded-2xl bg-gray-50 hover:bg-gray-100 transition-colors duration-300">
                            <div class="bg-gray-100 p-4 rounded-full mb-2">
                                <svg class="h-10 w-10 text-pink-500" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                                </svg>
                            </div>
                            <span class="text-sm font-semibold text-gray-800 text-center">Profile</span>
                            <p class="text-xs text-gray-500 text-center">Update personal data</p>
                        </a>
                    </div>
                </div>

                <div class="bg-white p-4 md:p-6 rounded-3xl shadow-sm">
                    <div class="flex items-center space-x-2 mb-4">
                        <svg class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M12 6.253v13m0-13C10.832 5.483 9.22 5 7.5 5A4.5 4.5 0 003 9.5a4.5 4.5 0 004.5 4.5c1.72 0 3.332-.483 4.5-1.253m0-13C13.168 5.483 14.78 5 16.5 5A4.5 4.5 0 0121 9.5a4.5 4.5 0 01-4.5 4.5c-1.72 0-3.332-.483-4.5-1.253" />
                        </svg>
                        <h3 class="text-md md:text-lg font-semibold text-gray-800">List Buku yang Dipinjam</h3>
                    </div>
                    <div class="space-y-4">
                        <div class="bg-gray-50 p-3 rounded-2xl flex items-center space-x-4">
                            <img src="https://via.placeholder.com/60x80.png?text=Buku"
                                alt="Cover Buku Pengantar Kecerdasan Buatan" class="w-12 h-16 rounded-md object-cover">
                            <div>
                                <p class="text-sm font-medium text-gray-800">Pengantar Kecerdasan Buatan</p>
                                <p class="text-xs text-gray-500 mt-1">Due date: 20 Aug 2025</p>
                            </div>
                        </div>
                        <div class="bg-gray-50 p-3 rounded-2xl flex items-center space-x-4">
                            <img src="https://via.placeholder.com/60x80.png?text=Buku"
                                alt="Cover Buku Sejarah Indonesia: Jilid 2" class="w-12 h-16 rounded-md object-cover">
                            <div>
                                <p class="text-sm font-medium text-gray-800">Sejarah Indonesia: Jilid 2</p>
                                <p class="text-xs text-gray-500 mt-1">Due date: 25 Aug 2025</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="md:col-span-1 lg:col-span-4 space-y-4 md:space-y-8">
                <div class="bg-white p-4 md:p-6 rounded-3xl shadow-sm">
                    <div class="flex justify-between items-center mb-4">
                        <button class="text-gray-400">&lt;</button>
                        <h3 class="text-md md:text-lg font-semibold text-gray-800">August 2025</h3>
                        <button class="text-gray-400">&gt;</button>
                    </div>
                    <div class="grid grid-cols-7 gap-1 text-center text-xs md:text-sm text-gray-500">
                        <span>Sun</span><span>Mon</span><span>Tue</span><span>Wed</span><span>Thu</span><span>Fri</span><span>Sat</span>
                        <span class="text-gray-400">27</span><span class="text-gray-400">28</span><span
                            class="text-gray-400">29</span><span class="text-gray-400">30</span><span
                            class="text-gray-400">31</span>
                        <span class="p-2">01</span><span class="p-2">02</span>
                        <span class="p-2">03</span><span class="p-2">04</span><span class="p-2">05</span><span
                            class="p-2">06</span><span class="p-2">07</span><span
                            class="p-2 bg-green-500 text-white rounded-full font-semibold">08</span><span
                            class="p-2">09</span>
                        <span class="p-2">10</span><span class="p-2">11</span><span class="p-2">12</span><span
                            class="p-2">13</span><span class="p-2">14</span><span class="p-2">15</span><span
                            class="p-2">16</span>
                    </div>
                </div>
                <div class="bg-white p-4 md:p-6 rounded-3xl shadow-sm">
                    <div class="flex justify-between items-center mb-4">
                        <h3 class="text-md md:text-lg font-semibold text-gray-800">My Schedule - Today</h3>
                        <a href="#" class="text-xs text-blue-500 hover:text-blue-700">View All</a>
                    </div>
                    <div class="space-y-4">
                        <div class="border-l-4 border-blue-500 pl-4 py-2">
                            <p class="text-xs text-gray-500">08:00 - 09:30 AM</p>
                            <p class="text-sm font-semibold text-gray-800">English Literature</p>
                            <p class="text-xs text-gray-500">Room: A-102</p>
                        </div>
                        <div class="border-l-4 border-green-500 pl-4 py-2">
                            <p class="text-xs text-gray-500">10:00 - 11:30 AM</p>
                            <p class="text-sm font-semibold text-gray-800">Web Programming II</p>
                            <p class="text-xs text-gray-500">Room: B-205</p>
                        </div>
                        <div class="border-l-4 border-yellow-500 pl-4 py-2">
                            <p class="text-xs text-gray-500">01:00 - 02:30 PM</p>
                            <p class="text-sm font-semibold text-gray-800">Mathematics</p>
                            <p class="text-xs text-gray-500">Room: C-301</p>
                        </div>
                    </div>
                </div>
                <div class="bg-white p-4 md:p-6 rounded-3xl shadow-sm">
                    <div class="flex items-center space-x-2 mb-4">
                        <svg class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                            stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01" />
                        </svg>
                        <h3 class="text-md md:text-lg font-semibold text-gray-800">Student Activity</h3>
                    </div>
                    <div class="space-y-4">
                        <div class="bg-gray-50 p-3 rounded-2xl flex items-center space-x-4">
                            <img src="https://via.placeholder.com/80.png?text=Lomba" alt="Foto Lomba Sains"
                                class="w-20 h-20 rounded-lg object-cover">
                            <div>
                                <p class="text-sm font-medium text-gray-800">Mia Williams wins Science Olympiad!</p>
                                <p class="text-xs text-gray-500 mt-1">Mia secured first place in the regional Science
                                    Olympiad. We are so proud!</p>
                            </div>
                        </div>
                        <div class="bg-gray-50 p-3 rounded-2xl flex items-center space-x-4">
                            <img src="https://via.placeholder.com/80.png?text=Tim+Basket" alt="Foto Tim Basket"
                                class="w-20 h-20 rounded-lg object-cover">
                            <div>
                                <p class="text-sm font-medium text-gray-800">Our school basketball team has won the
                                    city-wide tournament. Congratulations!</p>
                                <p class="text-xs text-gray-500 mt-1">Read more about their victory in the sports news
                                    section!</p>
                            </div>
                        </div>
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
            const initialActiveButton = document.getElementById('dashboard-btn');
            if (initialActiveButton && window.innerWidth >= 1024) {
                moveIndicator(initialActiveButton);
                setActive(initialActiveButton);
            }

            navLinks.forEach(link => {
                link.addEventListener('click', function (event) {
                    // Cek apakah link adalah 'schedule', jika ya, cegah perilaku default agar tidak langsung pindah halaman
                    if (this.id === 'dashboard-btn') {
                        event.preventDefault();
                    }
                    if (window.innerWidth >= 1024) {
                        moveIndicator(this);
                        setActive(this);
                    }
                    navMenu.classList.add('hidden');
                    // Jika bukan link "schedule", biarkan navigasi berjalan
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
        });
    </script>
</body>

</html>