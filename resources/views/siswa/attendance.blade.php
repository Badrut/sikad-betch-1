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
                    <a href="#" id="schedule-btn"
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
                    <svg class="h-6 w-6 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"
                        stroke-width="2">
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

        <div class="p-4 md:p-8">
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Attendance Record</h1>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 md:gap-8">

                <div class="lg:col-span-2 space-y-4 md:space-y-8">
                    <div class="bg-white p-4 md:p-6 rounded-3xl shadow-sm flex items-center justify-between">
                        <div>
                            <p class="text-xs text-gray-500">Kehadiran Semester Ini</p>
                            <h2 class="text-3xl font-bold text-green-500 mt-1">97%</h2>
                            <p class="text-xs text-gray-600 mt-1">Total kehadiran dari 200 hari efektif</p>
                        </div>
                        <div class="flex flex-col items-center">
                            <div
                                class="w-16 h-16 rounded-full flex items-center justify-center border-4 border-green-200">
                                <span class="text-lg font-bold text-green-500">97%</span>
                            </div>
                        </div>
                    </div>
                    <div class="bg-white p-6 rounded-3xl shadow-sm">
                    
                        <div
                            class="flex flex-col sm:flex-row justify-between items-center pb-4 border-b border-gray-200 mb-6 space-y-4 sm:space-y-0">
                            <h1 class="text-2xl font-bold text-gray-800">Rekap Absensi Siswa</h1>
                            <div class="flex items-center space-x-2">
                                <select id="month-select"
                                    class="block w-full bg-white border border-gray-300 text-gray-700 py-2 px-4 rounded-xl leading-tight focus:outline-none focus:border-blue-500 shadow-sm transition-colors">
                                    <option value="08">Agustus</option>
                                    <option value="09">September</option>
                                    <option value="10">Oktober</option>
                                </select>
                                <select id="year-select"
                                    class="block w-full bg-white border border-gray-300 text-gray-700 py-2 px-4 rounded-xl leading-tight focus:outline-none focus:border-blue-500 shadow-sm transition-colors">
                                    <option>2025</option>
                                    <option>2026</option>
                                </select>
                            </div>
                        </div>
                    
                        <div id="attendance-content">
                    
                            <div class="bg-gray-50 p-6 rounded-2xl shadow-sm mb-6 flex justify-around text-center">
                                <div>
                                    <p class="text-3xl font-bold text-green-600">20</p>
                                    <p class="text-sm text-gray-600">Hadir</p>
                                </div>
                                <div>
                                    <p class="text-3xl font-bold text-yellow-600">2</p>
                                    <p class="text-sm text-gray-600">Izin</p>
                                </div>
                                <div>
                                    <p class="text-3xl font-bold text-blue-600">1</p>
                                    <p class="text-sm text-gray-600">Sakit</p>
                                </div>
                                <div>
                                    <p class="text-3xl font-bold text-red-600">3</p>
                                    <p class="text-sm text-gray-600">Alpha</p>
                                </div>
                            </div>
                    
                            <div class="grid grid-cols-7 gap-2 text-center text-sm font-semibold text-gray-700">
                                <div class="p-2">Sen</div>
                                <div class="p-2">Sel</div>
                                <div class="p-2">Rab</div>
                                <div class="p-2">Kam</div>
                                <div class="p-2">Jum</div>
                                <div class="p-2">Sab</div>
                                <div class="p-2">Min</div>
                            </div>
                            <div class="grid grid-cols-7 gap-2 text-center text-sm">
                                <div class="p-4 text-gray-400"></div>
                                <div class="p-4 text-gray-400"></div>
                    
                                <div class="p-4 bg-green-200 text-green-800 font-semibold rounded-lg">1</div>
                                <div class="p-4 bg-green-200 text-green-800 font-semibold rounded-lg">2</div>
                                <div class="p-4 bg-green-200 text-green-800 font-semibold rounded-lg">3</div>
                                <div class="p-4 bg-green-200 text-green-800 font-semibold rounded-lg">4</div>
                                <div class="p-4 bg-yellow-200 text-yellow-800 font-semibold rounded-lg">5</div>
                                <div class="p-4 bg-gray-200 text-gray-500 rounded-lg">6</div>
                                <div class="p-4 bg-green-200 text-green-800 font-semibold rounded-lg">7</div>
                                <div class="p-4 bg-green-200 text-green-800 font-semibold rounded-lg">8</div>
                                <div class="p-4 bg-green-200 text-green-800 font-semibold rounded-lg">9</div>
                                <div class="p-4 bg-green-200 text-green-800 font-semibold rounded-lg">10</div>
                                <div class="p-4 bg-red-200 text-red-800 font-semibold rounded-lg">11</div>
                                <div class="p-4 bg-gray-200 text-gray-500 rounded-lg">12</div>
                                <div class="p-4 bg-green-200 text-green-800 font-semibold rounded-lg">13</div>
                                <div class="p-4 bg-green-200 text-green-800 font-semibold rounded-lg">14</div>
                                <div class="p-4 bg-green-200 text-green-800 font-semibold rounded-lg">15</div>
                                <div class="p-4 bg-green-200 text-green-800 font-semibold rounded-lg">16</div>
                                <div class="p-4 bg-blue-200 text-blue-800 font-semibold rounded-lg">17</div>
                                <div class="p-4 bg-gray-200 text-gray-500 rounded-lg">18</div>
                                <div class="p-4 bg-green-200 text-green-800 font-semibold rounded-lg">19</div>
                                <div class="p-4 bg-green-200 text-green-800 font-semibold rounded-lg">20</div>
                                <div class="p-4 bg-green-200 text-green-800 font-semibold rounded-lg">21</div>
                                <div class="p-4 bg-green-200 text-green-800 font-semibold rounded-lg">22</div>
                                <div class="p-4 bg-green-200 text-green-800 font-semibold rounded-lg">23</div>
                                <div class="p-4 bg-gray-200 text-gray-500 rounded-lg">24</div>
                                <div class="p-4 bg-green-200 text-green-800 font-semibold rounded-lg">25</div>
                                <div class="p-4 bg-green-200 text-green-800 font-semibold rounded-lg">26</div>
                                <div class="p-4 bg-green-200 text-green-800 font-semibold rounded-lg">27</div>
                                <div class="p-4 bg-green-200 text-green-800 font-semibold rounded-lg">28</div>
                                <div class="p-4 bg-green-200 text-green-800 font-semibold rounded-lg">29</div>
                                <div class="p-4 bg-gray-200 text-gray-500 rounded-lg">30</div>
                                <div class="p-4 bg-green-200 text-green-800 font-semibold rounded-lg">31</div>
                            </div>
                        </div>
                    
                    </div>
                </div>

                

                <div class="space-y-4 md:space-y-8">
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
                                class="p-2">06</span><span class="p-2">07</span>
                            <span class="p-2 bg-green-500 text-white rounded-full font-semibold">08</span>
                            <span class="p-2 bg-red-500 text-white rounded-full font-semibold">09</span>
                            <span class="p-2">10</span><span class="p-2">11</span>
                            <span class="p-2 bg-yellow-500 text-white rounded-full font-semibold">12</span>
                            <span class="p-2">13</span><span class="p-2">14</span><span class="p-2">15</span><span
                                class="p-2">16</span>
                        </div>
                    </div>

                    <div class="bg-white p-4 md:p-6 rounded-3xl shadow-sm">
                        <h3 class="text-md md:text-lg font-semibold text-gray-800 mb-4">Keterangan</h3>
                        <div class="space-y-2 text-sm">
                            <div class="flex items-center space-x-2">
                                <div class="w-4 h-4 rounded-full bg-green-500"></div>
                                <span>Hadir (Today)</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <div class="w-4 h-4 rounded-full bg-red-500"></div>
                                <span>Sakit / Izin</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <div class="w-4 h-4 rounded-full bg-yellow-500"></div>
                                <span>Libur</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <div class="w-4 h-4 rounded-full bg-gray-200"></div>
                                <span>Tidak Hadir</span>
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

            // Set initial active state for "Attendance" button
            const initialActiveButton = document.getElementById('attendance-btn');
            if (initialActiveButton && window.innerWidth >= 1024) {
                moveIndicator(initialActiveButton);
                setActive(initialActiveButton);
            }

            navLinks.forEach(link => {
                link.addEventListener('click', function (event) {
                    // Cek apakah link adalah 'attendance', jika ya, cegah perilaku default agar tidak langsung pindah halaman
                    if (this.id === 'attendance-btn') {
                        event.preventDefault();
                    }
                    if (window.innerWidth >= 1024) {
                        moveIndicator(this);
                        setActive(this);
                    }
                    navMenu.classList.add('hidden');
                    // Jika bukan link "attendance", biarkan navigasi berjalan
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
        });
    </script>
</body>

</html>