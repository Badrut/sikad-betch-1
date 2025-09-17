<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Raport - SMK Student Dashboard</title>
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

        .grade-chart-container {
            position: relative;
            height: 300px;
        }

        .dropdown-animate {
            transition: opacity 0.3s ease-out, transform 0.3s ease-out;
            transform-origin: top right;
            opacity: 0;
            transform: scale(0.95);
            display: none;
        }

        .dropdown-animate.active {
            opacity: 1;
            transform: scale(1);
            display: block;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-gray-100">

    <div class="min-h-screen">

        <nav class="flex items-center justify-between px-6 py-3 bg-white shadow-md">
            <div class="flex items-center space-x-6">
                <img src="https://placehold.co/50x50" alt="Logo" width="50px" height="50px">

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
                        class="absolute top-full right-0 mt-2 w-48 bg-white rounded-lg shadow-lg z-50 hidden dropdown-animate">
                        <a href="profile"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-t-lg">
                            <i class="fas fa-user-circle mr-2"></i>Profile
                        </a>
                        <a href="#" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100 rounded-b-lg">
                            <i class="fas fa-sign-out-alt mr-2"></i>Logout
                        </a>
                    </div>
                </div>
            </div>
        </nav>

        <div class="p-4 md:p-8">
            <div class="flex items-center justify-between mb-6">
                <h1 class="text-2xl md:text-3xl font-bold text-gray-800">Academic Report</h1>
                <div class="flex items-center space-x-3">
                    <div class="relative">
                        <select id="semester-select"
                            class="appearance-none bg-white border border-gray-300 rounded-2xl py-2 px-4 pr-8 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                            <option value="sem1">Semester 1</option>
                            <option value="sem2">Semester 2</option>
                            <option value="sem3" selected>Semester 3</option>
                            <option value="sem4">Semester 4</option>
                        </select>
                        <div
                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <i class="fas fa-chevron-down text-xs"></i>
                        </div>
                    </div>
                    <button
                        class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded-2xl text-sm font-semibold transition-colors duration-300 flex items-center space-x-2">
                        <i class="fas fa-download"></i>
                        <span>Export PDF</span>
                    </button>
                </div>
            </div>

            <div id="report-content">

                <div id="content-sem1" class="hidden">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <div class="lg:col-span-2 space-y-6">
                            <div class="bg-white p-6 rounded-3xl shadow-sm card-hover">
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-5 rounded-2xl text-center">
                                        <div class="text-3xl font-bold text-blue-600">80.2</div>
                                        <p class="text-sm text-gray-600 mt-2">Average Score</p>
                                        <div class="mt-3 flex items-center justify-center text-xs text-red-500 font-semibold">
                                            <i class="fas fa-arrow-down mr-1"></i>
                                            -1.8 from previous
                                        </div>
                                    </div>
                                    <div class="bg-gradient-to-br from-green-50 to-green-100 p-5 rounded-2xl text-center">
                                        <div class="text-3xl font-bold text-green-600">10</div>
                                        <p class="text-sm text-gray-600 mt-2">Class Rank</p>
                                        <div class="mt-3 flex items-center justify-center text-xs text-green-500 font-semibold">
                                            <i class="fas fa-arrow-up mr-1"></i>
                                            +5 from previous
                                        </div>
                                    </div>
                                    <div class="bg-gradient-to-br from-purple-50 to-purple-100 p-5 rounded-2xl text-center">
                                        <div class="text-3xl font-bold text-purple-600">88%</div>
                                        <p class="text-sm text-gray-600 mt-2">Completion</p>
                                        <div class="w-full bg-gray-200 rounded-full h-2 mt-3">
                                            <div class="bg-purple-500 h-2 rounded-full" style="width: 88%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-white p-6 rounded-3xl shadow-sm card-hover">
                                <div class="flex items-center justify-between mb-5">
                                    <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                                        <i class="fas fa-chart-line text-blue-500"></i>
                                        Academic Progress
                                    </h3>
                                    <div class="flex items-center space-x-2 text-sm">
                                        <span
                                            class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Current
                                            Semester</span>
                                        <span
                                            class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Previous</span>
                                    </div>
                                </div>
                                <div class="grade-chart-container">
                                    <canvas id="gradeChart1"></canvas>
                                </div>
                            </div>
                            <div class="bg-white p-6 rounded-3xl shadow-sm card-hover">
                                <div class="flex items-center justify-between mb-5">
                                    <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                                        <i class="fas fa-book-open text-green-500"></i>
                                        Subject Grades
                                    </h3>
                                    <div class="relative">
                                        <select
                                            class="appearance-none bg-gray-100 border-0 rounded-2xl py-2 px-4 pr-8 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                            <option>All Subjects</option>
                                            <option>Core Subjects</option>
                                            <option>Electives</option>
                                        </select>
                                        <div
                                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <i class="fas fa-chevron-down text-xs"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="space-y-4">
                                    <div
                                        class="flex items-center justify-between p-4 bg-gray-50 rounded-2xl hover:bg-gray-100 transition-colors duration-300">
                                        <div class="flex items-center space-x-4">
                                            <div class="bg-blue-100 p-3 rounded-full text-blue-600">
                                                <i class="fas fa-language text-lg"></i>
                                            </div>
                                            <div>
                                                <span class="font-medium text-gray-800">English Literature</span>
                                                <p class="text-xs text-gray-500 mt-1">Mr. Johnson</p>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-lg font-bold text-gray-800">82</p>
                                            <div class="flex items-center justify-end space-x-2 mt-1">
                                                <div class="w-16 bg-gray-200 rounded-full h-1.5">
                                                    <div class="bg-blue-500 h-1.5 rounded-full" style="width: 82%">
                                                    </div>
                                                </div>
                                                <span class="text-xs font-semibold text-blue-600">B</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="flex items-center justify-between p-4 bg-gray-50 rounded-2xl hover:bg-gray-100 transition-colors duration-300">
                                        <div class="flex items-center space-x-4">
                                            <div class="bg-green-100 p-3 rounded-full text-green-600">
                                                <i class="fas fa-calculator text-lg"></i>
                                            </div>
                                            <div>
                                                <span class="font-medium text-gray-800">Mathematics</span>
                                                <p class="text-xs text-gray-500 mt-1">Ms. Rodriguez</p>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-lg font-bold text-gray-800">79</p>
                                            <div class="flex items-center justify-end space-x-2 mt-1">
                                                <div class="w-16 bg-gray-200 rounded-full h-1.5">
                                                    <div class="bg-green-500 h-1.5 rounded-full" style="width: 79%">
                                                    </div>
                                                </div>
                                                <span class="text-xs font-semibold text-green-600">C+</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="flex items-center justify-between p-4 bg-gray-50 rounded-2xl hover:bg-gray-100 transition-colors duration-300">
                                        <div class="flex items-center space-x-4">
                                            <div class="bg-purple-100 p-3 rounded-full text-purple-600">
                                                <i class="fas fa-code text-lg"></i>
                                            </div>
                                            <div>
                                                <span class="font-medium text-gray-800">Web Programming I</span>
                                                <p class="text-xs text-gray-500 mt-1">Mr. Chen</p>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-lg font-bold text-gray-800">80</p>
                                            <div class="flex items-center justify-end space-x-2 mt-1">
                                                <div class="w-16 bg-gray-200 rounded-full h-1.5">
                                                    <div class="bg-purple-500 h-1.5 rounded-full" style="width: 80%">
                                                    </div>
                                                </div>
                                                <span class="text-xs font-semibold text-purple-600">B</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-6">
                            <div class="bg-white p-6 rounded-3xl shadow-sm card-hover">
                                <h3 class="text-lg font-semibold text-gray-800 mb-5 flex items-center gap-2">
                                    <i class="fas fa-clipboard-list text-orange-500"></i>
                                    Report Summary
                                </h3>
                                <div class="space-y-4">
                                    <div class="flex items-center justify-between p-3 bg-blue-50 rounded-xl">
                                        <div class="flex items-center space-x-3">
                                            <div class="bg-blue-100 p-2 rounded-full text-blue-600">
                                                <i class="fas fa-star"></i>
                                            </div>
                                            <span class="text-sm font-medium text-gray-800">Skill Grade</span>
                                        </div>
                                        <span class="text-lg font-bold text-blue-600">B</span>
                                    </div>
                                    <div class="flex items-center justify-between p-3 bg-green-50 rounded-xl">
                                        <div class="flex items-center space-x-3">
                                            <div class="bg-green-100 p-2 rounded-full text-green-600">
                                                <i class="fas fa-heart"></i>
                                            </div>
                                            <span class="text-sm font-medium text-gray-800">Attitude Grade</span>
                                        </div>
                                        <span class="text-lg font-bold text-green-600">A</span>
                                    </div>
                                    <div class="flex items-center justify-between p-3 bg-red-50 rounded-xl">
                                        <div class="flex items-center space-x-3">
                                            <div class="bg-red-100 p-2 rounded-full text-red-600">
                                                <i class="fas fa-user-clock"></i>
                                            </div>
                                            <span class="text-sm font-medium text-gray-800">Total Absence</span>
                                        </div>
                                        <span class="text-lg font-bold text-red-600">5 Days</span>
                                    </div>
                                    <div class="flex items-center justify-between p-3 bg-purple-50 rounded-xl">
                                        <div class="flex items-center space-x-3">
                                            <div class="bg-purple-100 p-2 rounded-full text-purple-600">
                                                <i class="fas fa-trophy"></i>
                                            </div>
                                            <span class="text-sm font-medium text-gray-800">Achievements</span>
                                        </div>
                                        <span class="text-lg font-bold text-purple-600">1</span>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-white p-6 rounded-3xl shadow-sm card-hover">
                                <h3 class="text-lg font-semibold text-gray-800 mb-5 flex items-center gap-2">
                                    <i class="fas fa-chalkboard-teacher text-indigo-500"></i>
                                    Teacher's Notes
                                </h3>
                                <div class="bg-indigo-50 p-5 rounded-2xl">
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0">
                                            <img src="https://api.dicebear.com/7.x/adventurer/svg?seed=Teacher"
                                                alt="Ms. Elina"
                                                class="h-12 w-12 rounded-full border-2 border-white shadow-sm">
                                        </div>
                                        <div class="ml-4">
                                            <p class="text-sm text-gray-700 leading-relaxed">
                                                Mia had a solid start to the semester. Her dedication is promising, though there is room for improvement in some core subjects.
                                            </p>
                                            <div class="mt-4">
                                                <p class="text-sm font-semibold text-gray-800">Ms. Elina</p>
                                                <p class="text-xs text-gray-500">Homeroom Teacher</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 bg-yellow-50 p-3 rounded-xl flex items-center">
                                    <div class="bg-yellow-100 p-2 rounded-full text-yellow-600 mr-3">
                                        <i class="fas fa-lightbulb"></i>
                                    </div>
                                    <p class="text-sm text-gray-700">
                                        <span class="font-semibold">Recommendation:</span> Focus on mathematics to strengthen foundational skills.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="content-sem2" class="hidden">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <div class="lg:col-span-2 space-y-6">
                            <div class="bg-white p-6 rounded-3xl shadow-sm card-hover">
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-5 rounded-2xl text-center">
                                        <div class="text-3xl font-bold text-blue-600">85.0</div>
                                        <p class="text-sm text-gray-600 mt-2">Average Score</p>
                                        <div class="mt-3 flex items-center justify-center text-xs text-green-500 font-semibold">
                                            <i class="fas fa-arrow-up mr-1"></i>
                                            +4.8 from previous
                                        </div>
                                    </div>
                                    <div class="bg-gradient-to-br from-green-50 to-green-100 p-5 rounded-2xl text-center">
                                        <div class="text-3xl font-bold text-green-600">6</div>
                                        <p class="text-sm text-gray-600 mt-2">Class Rank</p>
                                        <div class="mt-3 flex items-center justify-center text-xs text-green-500 font-semibold">
                                            <i class="fas fa-arrow-up mr-1"></i>
                                            +4 from previous
                                        </div>
                                    </div>
                                    <div class="bg-gradient-to-br from-purple-50 to-purple-100 p-5 rounded-2xl text-center">
                                        <div class="text-3xl font-bold text-purple-600">90%</div>
                                        <p class="text-sm text-gray-600 mt-2">Completion</p>
                                        <div class="w-full bg-gray-200 rounded-full h-2 mt-3">
                                            <div class="bg-purple-500 h-2 rounded-full" style="width: 90%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-white p-6 rounded-3xl shadow-sm card-hover">
                                <div class="flex items-center justify-between mb-5">
                                    <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                                        <i class="fas fa-chart-line text-blue-500"></i>
                                        Academic Progress
                                    </h3>
                                    <div class="flex items-center space-x-2 text-sm">
                                        <span
                                            class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Current
                                            Semester</span>
                                        <span
                                            class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Previous</span>
                                    </div>
                                </div>
                                <div class="grade-chart-container">
                                    <canvas id="gradeChart2"></canvas>
                                </div>
                            </div>
                            <div class="bg-white p-6 rounded-3xl shadow-sm card-hover">
                                <div class="flex items-center justify-between mb-5">
                                    <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                                        <i class="fas fa-book-open text-green-500"></i>
                                        Subject Grades
                                    </h3>
                                    <div class="relative">
                                        <select
                                            class="appearance-none bg-gray-100 border-0 rounded-2xl py-2 px-4 pr-8 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                            <option>All Subjects</option>
                                            <option>Core Subjects</option>
                                            <option>Electives</option>
                                        </select>
                                        <div
                                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <i class="fas fa-chevron-down text-xs"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="space-y-4">
                                    <div
                                        class="flex items-center justify-between p-4 bg-gray-50 rounded-2xl hover:bg-gray-100 transition-colors duration-300">
                                        <div class="flex items-center space-x-4">
                                            <div class="bg-blue-100 p-3 rounded-full text-blue-600">
                                                <i class="fas fa-language text-lg"></i>
                                            </div>
                                            <div>
                                                <span class="font-medium text-gray-800">English Literature</span>
                                                <p class="text-xs text-gray-500 mt-1">Mr. Johnson</p>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-lg font-bold text-gray-800">85</p>
                                            <div class="flex items-center justify-end space-x-2 mt-1">
                                                <div class="w-16 bg-gray-200 rounded-full h-1.5">
                                                    <div class="bg-blue-500 h-1.5 rounded-full" style="width: 85%">
                                                    </div>
                                                </div>
                                                <span class="text-xs font-semibold text-blue-600">B+</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="flex items-center justify-between p-4 bg-gray-50 rounded-2xl hover:bg-gray-100 transition-colors duration-300">
                                        <div class="flex items-center space-x-4">
                                            <div class="bg-green-100 p-3 rounded-full text-green-600">
                                                <i class="fas fa-calculator text-lg"></i>
                                            </div>
                                            <div>
                                                <span class="font-medium text-gray-800">Mathematics</span>
                                                <p class="text-xs text-gray-500 mt-1">Ms. Rodriguez</p>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-lg font-bold text-gray-800">90</p>
                                            <div class="flex items-center justify-end space-x-2 mt-1">
                                                <div class="w-16 bg-gray-200 rounded-full h-1.5">
                                                    <div class="bg-green-500 h-1.5 rounded-full" style="width: 90%">
                                                    </div>
                                                </div>
                                                <span class="text-xs font-semibold text-green-600">A</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="flex items-center justify-between p-4 bg-gray-50 rounded-2xl hover:bg-gray-100 transition-colors duration-300">
                                        <div class="flex items-center space-x-4">
                                            <div class="bg-purple-100 p-3 rounded-full text-purple-600">
                                                <i class="fas fa-code text-lg"></i>
                                            </div>
                                            <div>
                                                <span class="font-medium text-gray-800">Web Programming I</span>
                                                <p class="text-xs text-gray-500 mt-1">Mr. Chen</p>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-lg font-bold text-gray-800">88</p>
                                            <div class="flex items-center justify-end space-x-2 mt-1">
                                                <div class="w-16 bg-gray-200 rounded-full h-1.5">
                                                    <div class="bg-purple-500 h-1.5 rounded-full" style="width: 88%">
                                                    </div>
                                                </div>
                                                <span class="text-xs font-semibold text-purple-600">A</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="space-y-6">
                            <div class="bg-white p-6 rounded-3xl shadow-sm card-hover">
                                <h3 class="text-lg font-semibold text-gray-800 mb-5 flex items-center gap-2">
                                    <i class="fas fa-clipboard-list text-orange-500"></i>
                                    Report Summary
                                </h3>
                                <div class="space-y-4">
                                    <div class="flex items-center justify-between p-3 bg-blue-50 rounded-xl">
                                        <div class="flex items-center space-x-3">
                                            <div class="bg-blue-100 p-2 rounded-full text-blue-600">
                                                <i class="fas fa-star"></i>
                                            </div>
                                            <span class="text-sm font-medium text-gray-800">Skill Grade</span>
                                        </div>
                                        <span class="text-lg font-bold text-blue-600">A</span>
                                    </div>
                                    <div class="flex items-center justify-between p-3 bg-green-50 rounded-xl">
                                        <div class="flex items-center space-x-3">
                                            <div class="bg-green-100 p-2 rounded-full text-green-600">
                                                <i class="fas fa-heart"></i>
                                            </div>
                                            <span class="text-sm font-medium text-gray-800">Attitude Grade</span>
                                        </div>
                                        <span class="text-lg font-bold text-green-600">A</span>
                                    </div>
                                    <div class="flex items-center justify-between p-3 bg-red-50 rounded-xl">
                                        <div class="flex items-center space-x-3">
                                            <div class="bg-red-100 p-2 rounded-full text-red-600">
                                                <i class="fas fa-user-clock"></i>
                                            </div>
                                            <span class="text-sm font-medium text-gray-800">Total Absence</span>
                                        </div>
                                        <span class="text-lg font-bold text-red-600">2 Days</span>
                                    </div>
                                    <div class="flex items-center justify-between p-3 bg-purple-50 rounded-xl">
                                        <div class="flex items-center space-x-3">
                                            <div class="bg-purple-100 p-2 rounded-full text-purple-600">
                                                <i class="fas fa-trophy"></i>
                                            </div>
                                            <span class="text-sm font-medium text-gray-800">Achievements</span>
                                        </div>
                                        <span class="text-lg font-bold text-purple-600">3</span>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-white p-6 rounded-3xl shadow-sm card-hover">
                                <h3 class="text-lg font-semibold text-gray-800 mb-5 flex items-center gap-2">
                                    <i class="fas fa-chalkboard-teacher text-indigo-500"></i>
                                    Teacher's Notes
                                </h3>
                                <div class="bg-indigo-50 p-5 rounded-2xl">
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0">
                                            <img src="https://api.dicebear.com/7.x/adventurer/svg?seed=Teacher"
                                                alt="Ms. Elina"
                                                class="h-12 w-12 rounded-full border-2 border-white shadow-sm">
                                        </div>
                                        <div class="ml-4">
                                            <p class="text-sm text-gray-700 leading-relaxed">
                                                Mia has shown remarkable progress this semester. Her efforts have significantly improved her grades and class rank.
                                            </p>
                                            <div class="mt-4">
                                                <p class="text-sm font-semibold text-gray-800">Ms. Elina</p>
                                                <p class="text-xs text-gray-500">Homeroom Teacher</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 bg-yellow-50 p-3 rounded-xl flex items-center">
                                    <div class="bg-yellow-100 p-2 rounded-full text-yellow-600 mr-3">
                                        <i class="fas fa-lightbulb"></i>
                                    </div>
                                    <p class="text-sm text-gray-700">
                                        <span class="font-semibold">Recommendation:</span> Maintain this level of dedication and continue to challenge yourself.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="content-sem3">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <div class="lg:col-span-2 space-y-6">
                            <div class="bg-white p-6 rounded-3xl shadow-sm card-hover">
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-5 rounded-2xl text-center">
                                        <div class="text-3xl font-bold text-blue-600">87.5</div>
                                        <p class="text-sm text-gray-600 mt-2">Average Score</p>
                                        <div class="mt-3 flex items-center justify-center text-xs text-green-500 font-semibold">
                                            <i class="fas fa-arrow-up mr-1"></i>
                                            +2.5 from previous
                                        </div>
                                    </div>
                                    <div class="bg-gradient-to-br from-green-50 to-green-100 p-5 rounded-2xl text-center">
                                        <div class="text-3xl font-bold text-green-600">5</div>
                                        <p class="text-sm text-gray-600 mt-2">Class Rank</p>
                                        <div class="mt-3 flex items-center justify-center text-xs text-green-500 font-semibold">
                                            <i class="fas fa-arrow-up mr-1"></i>
                                            +1 from previous
                                        </div>
                                    </div>
                                    <div class="bg-gradient-to-br from-purple-50 to-purple-100 p-5 rounded-2xl text-center">
                                        <div class="text-3xl font-bold text-purple-600">92%</div>
                                        <p class="text-sm text-gray-600 mt-2">Completion</p>
                                        <div class="w-full bg-gray-200 rounded-full h-2 mt-3">
                                            <div class="bg-purple-500 h-2 rounded-full" style="width: 92%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-white p-6 rounded-3xl shadow-sm card-hover">
                                <div class="flex items-center justify-between mb-5">
                                    <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                                        <i class="fas fa-chart-line text-blue-500"></i>
                                        Academic Progress
                                    </h3>
                                    <div class="flex items-center space-x-2 text-sm">
                                        <span
                                            class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Current
                                            Semester</span>
                                        <span
                                            class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Previous</span>
                                    </div>
                                </div>
                                <div class="grade-chart-container">
                                    <canvas id="gradeChart3"></canvas>
                                </div>
                            </div>
                            <div class="bg-white p-6 rounded-3xl shadow-sm card-hover">
                                <div class="flex items-center justify-between mb-5">
                                    <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                                        <i class="fas fa-book-open text-green-500"></i>
                                        Subject Grades
                                    </h3>
                                    <div class="relative">
                                        <select
                                            class="appearance-none bg-gray-100 border-0 rounded-2xl py-2 px-4 pr-8 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                            <option>All Subjects</option>
                                            <option>Core Subjects</option>
                                            <option>Electives</option>
                                        </select>
                                        <div
                                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <i class="fas fa-chevron-down text-xs"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="space-y-4">
                                    <div
                                        class="flex items-center justify-between p-4 bg-gray-50 rounded-2xl hover:bg-gray-100 transition-colors duration-300">
                                        <div class="flex items-center space-x-4">
                                            <div class="bg-blue-100 p-3 rounded-full text-blue-600">
                                                <i class="fas fa-language text-lg"></i>
                                            </div>
                                            <div>
                                                <span class="font-medium text-gray-800">English Literature</span>
                                                <p class="text-xs text-gray-500 mt-1">Mr. Johnson</p>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-lg font-bold text-gray-800">89</p>
                                            <div class="flex items-center justify-end space-x-2 mt-1">
                                                <div class="w-16 bg-gray-200 rounded-full h-1.5">
                                                    <div class="bg-blue-500 h-1.5 rounded-full" style="width: 89%">
                                                    </div>
                                                </div>
                                                <span class="text-xs font-semibold text-blue-600">A</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="flex items-center justify-between p-4 bg-gray-50 rounded-2xl hover:bg-gray-100 transition-colors duration-300">
                                        <div class="flex items-center space-x-4">
                                            <div class="bg-green-100 p-3 rounded-full text-green-600">
                                                <i class="fas fa-calculator text-lg"></i>
                                            </div>
                                            <div>
                                                <span class="font-medium text-gray-800">Mathematics</span>
                                                <p class="text-xs text-gray-500 mt-1">Ms. Rodriguez</p>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-lg font-bold text-gray-800">92</p>
                                            <div class="flex items-center justify-end space-x-2 mt-1">
                                                <div class="w-16 bg-gray-200 rounded-full h-1.5">
                                                    <div class="bg-green-500 h-1.5 rounded-full" style="width: 92%">
                                                    </div>
                                                </div>
                                                <span class="text-xs font-semibold text-green-600">A+</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="flex items-center justify-between p-4 bg-gray-50 rounded-2xl hover:bg-gray-100 transition-colors duration-300">
                                        <div class="flex items-center space-x-4">
                                            <div class="bg-purple-100 p-3 rounded-full text-purple-600">
                                                <i class="fas fa-code text-lg"></i>
                                            </div>
                                            <div>
                                                <span class="font-medium text-gray-800">Web Programming II</span>
                                                <p class="text-xs text-gray-500 mt-1">Mr. Chen</p>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-lg font-bold text-gray-800">85</p>
                                            <div class="flex items-center justify-end space-x-2 mt-1">
                                                <div class="w-16 bg-gray-200 rounded-full h-1.5">
                                                    <div class="bg-purple-500 h-1.5 rounded-full" style="width: 85%">
                                                    </div>
                                                </div>
                                                <span class="text-xs font-semibold text-purple-600">B+</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="space-y-6">
                            <div class="bg-white p-6 rounded-3xl shadow-sm card-hover">
                                <h3 class="text-lg font-semibold text-gray-800 mb-5 flex items-center gap-2">
                                    <i class="fas fa-clipboard-list text-orange-500"></i>
                                    Report Summary
                                </h3>
                                <div class="space-y-4">
                                    <div class="flex items-center justify-between p-3 bg-blue-50 rounded-xl">
                                        <div class="flex items-center space-x-3">
                                            <div class="bg-blue-100 p-2 rounded-full text-blue-600">
                                                <i class="fas fa-star"></i>
                                            </div>
                                            <span class="text-sm font-medium text-gray-800">Skill Grade</span>
                                        </div>
                                        <span class="text-lg font-bold text-blue-600">A</span>
                                    </div>
                                    <div class="flex items-center justify-between p-3 bg-green-50 rounded-xl">
                                        <div class="flex items-center space-x-3">
                                            <div class="bg-green-100 p-2 rounded-full text-green-600">
                                                <i class="fas fa-heart"></i>
                                            </div>
                                            <span class="text-sm font-medium text-gray-800">Attitude Grade</span>
                                        </div>
                                        <span class="text-lg font-bold text-green-600">A</span>
                                    </div>
                                    <div class="flex items-center justify-between p-3 bg-red-50 rounded-xl">
                                        <div class="flex items-center space-x-3">
                                            <div class="bg-red-100 p-2 rounded-full text-red-600">
                                                <i class="fas fa-user-clock"></i>
                                            </div>
                                            <span class="text-sm font-medium text-gray-800">Total Absence</span>
                                        </div>
                                        <span class="text-lg font-bold text-red-600">3 Days</span>
                                    </div>
                                    <div class="flex items-center justify-between p-3 bg-purple-50 rounded-xl">
                                        <div class="flex items-center space-x-3">
                                            <div class="bg-purple-100 p-2 rounded-full text-purple-600">
                                                <i class="fas fa-trophy"></i>
                                            </div>
                                            <span class="text-sm font-medium text-gray-800">Achievements</span>
                                        </div>
                                        <span class="text-lg font-bold text-purple-600">5</span>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-white p-6 rounded-3xl shadow-sm card-hover">
                                <h3 class="text-lg font-semibold text-gray-800 mb-5 flex items-center gap-2">
                                    <i class="fas fa-chalkboard-teacher text-indigo-500"></i>
                                    Teacher's Notes
                                </h3>
                                <div class="bg-indigo-50 p-5 rounded-2xl">
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0">
                                            <img src="https://api.dicebear.com/7.x/adventurer/svg?seed=Teacher"
                                                alt="Ms. Elina"
                                                class="h-12 w-12 rounded-full border-2 border-white shadow-sm">
                                        </div>
                                        <div class="ml-4">
                                            <p class="text-sm text-gray-700 leading-relaxed">
                                                Mia shows excellent improvement this semester, especially in mathematics. Keep up the high learning spirit and don't hesitate to ask if you encounter any difficulties.
                                            </p>
                                            <div class="mt-4">
                                                <p class="text-sm font-semibold text-gray-800">Ms. Elina</p>
                                                <p class="text-xs text-gray-500">Homeroom Teacher</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 bg-yellow-50 p-3 rounded-xl flex items-center">
                                    <div class="bg-yellow-100 p-2 rounded-full text-yellow-600 mr-3">
                                        <i class="fas fa-lightbulb"></i>
                                    </div>
                                    <p class="text-sm text-gray-700">
                                        <span class="font-semibold">Recommendation:</span> Focus on advanced programming concepts for next semester.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="content-sem4" class="hidden">
                    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                        <div class="lg:col-span-2 space-y-6">
                            <div class="bg-white p-6 rounded-3xl shadow-sm card-hover">
                                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                                    <div class="bg-gradient-to-br from-blue-50 to-blue-100 p-5 rounded-2xl text-center">
                                        <div class="text-3xl font-bold text-blue-600">90.1</div>
                                        <p class="text-sm text-gray-600 mt-2">Average Score</p>
                                        <div class="mt-3 flex items-center justify-center text-xs text-green-500 font-semibold">
                                            <i class="fas fa-arrow-up mr-1"></i>
                                            +2.6 from previous
                                        </div>
                                    </div>
                                    <div class="bg-gradient-to-br from-green-50 to-green-100 p-5 rounded-2xl text-center">
                                        <div class="text-3xl font-bold text-green-600">3</div>
                                        <p class="text-sm text-gray-600 mt-2">Class Rank</p>
                                        <div class="mt-3 flex items-center justify-center text-xs text-green-500 font-semibold">
                                            <i class="fas fa-arrow-up mr-1"></i>
                                            +2 from previous
                                        </div>
                                    </div>
                                    <div class="bg-gradient-to-br from-purple-50 to-purple-100 p-5 rounded-2xl text-center">
                                        <div class="text-3xl font-bold text-purple-600">95%</div>
                                        <p class="text-sm text-gray-600 mt-2">Completion</p>
                                        <div class="w-full bg-gray-200 rounded-full h-2 mt-3">
                                            <div class="bg-purple-500 h-2 rounded-full" style="width: 95%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-white p-6 rounded-3xl shadow-sm card-hover">
                                <div class="flex items-center justify-between mb-5">
                                    <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                                        <i class="fas fa-chart-line text-blue-500"></i>
                                        Academic Progress
                                    </h3>
                                    <div class="flex items-center space-x-2 text-sm">
                                        <span
                                            class="bg-blue-100 text-blue-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Current
                                            Semester</span>
                                        <span
                                            class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded-full">Previous</span>
                                    </div>
                                </div>
                                <div class="grade-chart-container">
                                    <canvas id="gradeChart4"></canvas>
                                </div>
                            </div>
                            <div class="bg-white p-6 rounded-3xl shadow-sm card-hover">
                                <div class="flex items-center justify-between mb-5">
                                    <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                                        <i class="fas fa-book-open text-green-500"></i>
                                        Subject Grades
                                    </h3>
                                    <div class="relative">
                                        <select
                                            class="appearance-none bg-gray-100 border-0 rounded-2xl py-2 px-4 pr-8 text-sm focus:outline-none focus:ring-2 focus:ring-blue-500">
                                            <option>All Subjects</option>
                                            <option>Core Subjects</option>
                                            <option>Electives</option>
                                        </select>
                                        <div
                                            class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                                            <i class="fas fa-chevron-down text-xs"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="space-y-4">
                                    <div
                                        class="flex items-center justify-between p-4 bg-gray-50 rounded-2xl hover:bg-gray-100 transition-colors duration-300">
                                        <div class="flex items-center space-x-4">
                                            <div class="bg-blue-100 p-3 rounded-full text-blue-600">
                                                <i class="fas fa-language text-lg"></i>
                                            </div>
                                            <div>
                                                <span class="font-medium text-gray-800">English Literature</span>
                                                <p class="text-xs text-gray-500 mt-1">Mr. Johnson</p>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-lg font-bold text-gray-800">92</p>
                                            <div class="flex items-center justify-end space-x-2 mt-1">
                                                <div class="w-16 bg-gray-200 rounded-full h-1.5">
                                                    <div class="bg-blue-500 h-1.5 rounded-full" style="width: 92%">
                                                    </div>
                                                </div>
                                                <span class="text-xs font-semibold text-blue-600">A+</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="flex items-center justify-between p-4 bg-gray-50 rounded-2xl hover:bg-gray-100 transition-colors duration-300">
                                        <div class="flex items-center space-x-4">
                                            <div class="bg-green-100 p-3 rounded-full text-green-600">
                                                <i class="fas fa-calculator text-lg"></i>
                                            </div>
                                            <div>
                                                <span class="font-medium text-gray-800">Mathematics</span>
                                                <p class="text-xs text-gray-500 mt-1">Ms. Rodriguez</p>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-lg font-bold text-gray-800">95</p>
                                            <div class="flex items-center justify-end space-x-2 mt-1">
                                                <div class="w-16 bg-gray-200 rounded-full h-1.5">
                                                    <div class="bg-green-500 h-1.5 rounded-full" style="width: 95%">
                                                    </div>
                                                </div>
                                                <span class="text-xs font-semibold text-green-600">A+</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div
                                        class="flex items-center justify-between p-4 bg-gray-50 rounded-2xl hover:bg-gray-100 transition-colors duration-300">
                                        <div class="flex items-center space-x-4">
                                            <div class="bg-purple-100 p-3 rounded-full text-purple-600">
                                                <i class="fas fa-code text-lg"></i>
                                            </div>
                                            <div>
                                                <span class="font-medium text-gray-800">Web Programming II</span>
                                                <p class="text-xs text-gray-500 mt-1">Mr. Chen</p>
                                            </div>
                                        </div>
                                        <div class="text-right">
                                            <p class="text-lg font-bold text-gray-800">90</p>
                                            <div class="flex items-center justify-end space-x-2 mt-1">
                                                <div class="w-16 bg-gray-200 rounded-full h-1.5">
                                                    <div class="bg-purple-500 h-1.5 rounded-full" style="width: 90%">
                                                    </div>
                                                </div>
                                                <span class="text-xs font-semibold text-purple-600">A</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="space-y-6">
                            <div class="bg-white p-6 rounded-3xl shadow-sm card-hover">
                                <h3 class="text-lg font-semibold text-gray-800 mb-5 flex items-center gap-2">
                                    <i class="fas fa-clipboard-list text-orange-500"></i>
                                    Report Summary
                                </h3>
                                <div class="space-y-4">
                                    <div class="flex items-center justify-between p-3 bg-blue-50 rounded-xl">
                                        <div class="flex items-center space-x-3">
                                            <div class="bg-blue-100 p-2 rounded-full text-blue-600">
                                                <i class="fas fa-star"></i>
                                            </div>
                                            <span class="text-sm font-medium text-gray-800">Skill Grade</span>
                                        </div>
                                        <span class="text-lg font-bold text-blue-600">A+</span>
                                    </div>
                                    <div class="flex items-center justify-between p-3 bg-green-50 rounded-xl">
                                        <div class="flex items-center space-x-3">
                                            <div class="bg-green-100 p-2 rounded-full text-green-600">
                                                <i class="fas fa-heart"></i>
                                            </div>
                                            <span class="text-sm font-medium text-gray-800">Attitude Grade</span>
                                        </div>
                                        <span class="text-lg font-bold text-green-600">A</span>
                                    </div>
                                    <div class="flex items-center justify-between p-3 bg-red-50 rounded-xl">
                                        <div class="flex items-center space-x-3">
                                            <div class="bg-red-100 p-2 rounded-full text-red-600">
                                                <i class="fas fa-user-clock"></i>
                                            </div>
                                            <span class="text-sm font-medium text-gray-800">Total Absence</span>
                                        </div>
                                        <span class="text-lg font-bold text-red-600">1 Day</span>
                                    </div>
                                    <div class="flex items-center justify-between p-3 bg-purple-50 rounded-xl">
                                        <div class="flex items-center space-x-3">
                                            <div class="bg-purple-100 p-2 rounded-full text-purple-600">
                                                <i class="fas fa-trophy"></i>
                                            </div>
                                            <span class="text-sm font-medium text-gray-800">Achievements</span>
                                        </div>
                                        <span class="text-lg font-bold text-purple-600">8</span>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-white p-6 rounded-3xl shadow-sm card-hover">
                                <h3 class="text-lg font-semibold text-gray-800 mb-5 flex items-center gap-2">
                                    <i class="fas fa-chalkboard-teacher text-indigo-500"></i>
                                    Teacher's Notes
                                </h3>
                                <div class="bg-indigo-50 p-5 rounded-2xl">
                                    <div class="flex items-start">
                                        <div class="flex-shrink-0">
                                            <img src="https://api.dicebear.com/7.x/adventurer/svg?seed=Teacher"
                                                alt="Ms. Elina"
                                                class="h-12 w-12 rounded-full border-2 border-white shadow-sm">
                                        </div>
                                        <div class="ml-4">
                                            <p class="text-sm text-gray-700 leading-relaxed">
                                                Mia has achieved outstanding results this semester. Her strong work ethic and focus have paid off. She is a top student in her class.
                                            </p>
                                            <div class="mt-4">
                                                <p class="text-sm font-semibold text-gray-800">Ms. Elina</p>
                                                <p class="text-xs text-gray-500">Homeroom Teacher</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mt-4 bg-yellow-50 p-3 rounded-xl flex items-center">
                                    <div class="bg-yellow-100 p-2 rounded-full text-yellow-600 mr-3">
                                        <i class="fas fa-lightbulb"></i>
                                    </div>
                                    <p class="text-sm text-gray-700">
                                        <span class="font-semibold">Recommendation:</span> Explore leadership opportunities and prepare for internships.
                                    </p>
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
            // --- Navigasi Aktif Bar ---
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

            const initialActiveButton = document.getElementById('raport-btn');
            if (initialActiveButton && window.innerWidth >= 1024) {
                moveIndicator(initialActiveButton);
                setActive(initialActiveButton);
            }

            navLinks.forEach(link => {
                link.addEventListener('click', function (event) {
                    if (this.id === 'raport-btn') {
                        event.preventDefault();
                    }
                    if (window.innerWidth >= 1024) {
                        moveIndicator(this);
                        setActive(this);
                    }
                    navMenu.classList.add('hidden');
                    if (this.href && this.id !== 'raport-btn') {
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

            // --- Logika Konten Per Semester ---
            const semesterSelect = document.getElementById('semester-select');
            const reportContentDiv = document.getElementById('report-content');
            const chartInstances = {};

            function createChart(canvasId, data, labels) {
                const ctx = document.getElementById(canvasId);
                return new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: labels,
                        datasets: [{
                            label: 'Average Score',
                            data: data,
                            borderColor: '#3B82F6',
                            backgroundColor: 'rgba(59, 130, 246, 0.1)',
                            fill: true,
                            tension: 0.4,
                            pointBackgroundColor: '#3B82F6',
                            pointBorderColor: '#fff',
                            pointBorderWidth: 2,
                            pointRadius: 5,
                            pointHoverRadius: 7
                        }]
                    },
                    options: {
                        responsive: true,
                        maintainAspectRatio: false,
                        plugins: {
                            legend: { display: false }
                        },
                        scales: {
                            y: {
                                beginAtZero: false,
                                min: 70,
                                max: 100,
                                grid: { color: 'rgba(0, 0, 0, 0.05)' },
                                ticks: { font: { size: 12 } }
                            },
                            x: {
                                grid: { display: false },
                                ticks: { font: { size: 12, weight: '500' } }
                            }
                        }
                    }
                });
            }

            const semesterData = {
                'sem1': { data: [78, 80.2], labels: ['Previous', 'Sem 1'] },
                'sem2': { data: [80.2, 85.0], labels: ['Sem 1', 'Sem 2'] },
                'sem3': { data: [85.0, 87.5], labels: ['Sem 2', 'Sem 3'] },
                'sem4': { data: [87.5, 90.1], labels: ['Sem 3', 'Sem 4'] },
            };

            function updateReportContent(selectedSemester) {
                document.querySelectorAll('#report-content > div').forEach(div => {
                    div.classList.add('hidden');
                });
                document.getElementById(`content-${selectedSemester}`).classList.remove('hidden');

                const chartId = `gradeChart${selectedSemester.slice(-1)}`;
                if (!chartInstances[selectedSemester]) {
                    chartInstances[selectedSemester] = createChart(chartId, semesterData[selectedSemester].data, semesterData[selectedSemester].labels);
                } else {
                    chartInstances[selectedSemester].data.labels = semesterData[selectedSemester].labels;
                    chartInstances[selectedSemester].data.datasets[0].data = semesterData[selectedSemester].data;
                    chartInstances[selectedSemester].update();
                }
            }

            semesterSelect.addEventListener('change', (event) => {
                const selectedSemester = event.target.value;
                updateReportContent(selectedSemester);
            });

            // Inisialisasi konten saat halaman dimuat
            updateReportContent(semesterSelect.value);

            // --- Logika Dropdown Profil ---
            const profileTrigger = document.getElementById('profile-trigger');
            const profileDropdown = document.getElementById('profile-dropdown');

            profileTrigger.addEventListener('click', (event) => {
                event.stopPropagation();
                profileDropdown.classList.toggle('hidden');
                profileDropdown.classList.toggle('active');
            });

            document.addEventListener('click', (event) => {
                if (!profileTrigger.contains(event.target) && !profileDropdown.contains(event.target)) {
                    profileDropdown.classList.add('hidden');
                    profileDropdown.classList.remove('active');
                }
            });
        });
    </script>
</body>

</html>