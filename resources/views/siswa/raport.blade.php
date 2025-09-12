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
    <style>
        body {
            font-family: 'Inter', sans-serif;
        }

        .active-indicator {
            transition: left 300ms, width 300ms;
        }
    </style>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
                    <a href="#" id="attendance-btn"
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
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Raport Academic Summary</h1>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 md:gap-8">

                <div class="lg:col-span-2 space-y-4 md:space-y-8">
                    <div class="bg-white p-4 md:p-6 rounded-3xl shadow-sm flex justify-between items-center">
                        <div>
                            <p class="text-xs text-gray-500">Rata-rata Semester</p>
                            <h2 class="text-3xl font-bold text-gray-800 mt-1">87.5</h2>
                            <p class="text-xs text-green-500 font-semibold mt-1">↗️ +2.5 from previous semester</p>
                        </div>
                        <div class="text-right">
                            <p class="text-xs text-gray-500">Peringkat Kelas</p>
                            <h2 class="text-3xl font-bold text-gray-800 mt-1">5 / 30</h2>
                            <p class="text-xs text-green-500 font-semibold mt-1">↗️ +1 from previous semester</p>
                        </div>
                    </div>

                    <div class="bg-white p-4 md:p-6 rounded-3xl shadow-sm relative">
                        <h3 class="text-md md:text-lg font-semibold text-gray-800 mb-4">Perkembangan Nilai Semester</h3>
                        <div class="relative h-64 md:h-80">
                            <canvas id="gradeChart"></canvas>
                        </div>
                    </div>

                    <div class="bg-white p-4 md:p-6 rounded-3xl shadow-sm">
                        <h3 class="text-md md:text-lg font-semibold text-gray-800 mb-4">Detail Nilai per Mata Pelajaran
                        </h3>
                        <div class="space-y-2">
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-2xl">
                                <div class="flex items-center space-x-2">
                                    <div class="bg-blue-100 p-2 rounded-full">
                                        <svg class="h-6 w-6 text-blue-500" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M9.75 17L9.75 12C9.75 11.2044 10.0528 10.4414 10.6033 9.88887C11.1538 9.33633 11.9169 9.03357 12.75 9.03357C13.5831 9.03357 14.3462 9.33633 14.8967 9.88887C15.4472 10.4414 15.75 11.2044 15.75 12V17M12.75 17V21M12 3C8.68629 3 6 5.68629 6 9V12C6 15.3137 8.68629 18 12 18H18C21.3137 18 24 15.3137 24 12V9C24 5.68629 21.3137 3 18 3H12Z" />
                                        </svg>
                                    </div>
                                    <span class="font-medium text-gray-800">English Literature</span>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm font-semibold text-gray-800">89</p>
                                    <p class="text-xs text-gray-500">Nilai Akhir</p>
                                </div>
                            </div>
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-2xl">
                                <div class="flex items-center space-x-2">
                                    <div class="bg-green-100 p-2 rounded-full">
                                        <svg class="h-6 w-6 text-green-500" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M12 6.253v13m0-13C10.832 5.483 9.22 5 7.5 5A4.5 4.5 0 003 9.5a4.5 4.5 0 004.5 4.5c1.72 0 3.332-.483 4.5-1.253m0-13C13.168 5.483 14.78 5 16.5 5A4.5 4.5 0 0121 9.5a4.5 4.5 0 01-4.5 4.5c-1.72 0-3.332-.483-4.5-1.253" />
                                        </svg>
                                    </div>
                                    <span class="font-medium text-gray-800">Mathematics</span>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm font-semibold text-gray-800">92</p>
                                    <p class="text-xs text-gray-500">Nilai Akhir</p>
                                </div>
                            </div>
                            <div class="flex items-center justify-between p-3 bg-gray-50 rounded-2xl">
                                <div class="flex items-center space-x-2">
                                    <div class="bg-yellow-100 p-2 rounded-full">
                                        <svg class="h-6 w-6 text-yellow-500" fill="none" viewBox="0 0 24 24"
                                            stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M17 14v6m-3-3h6M6 10h2m-2 4h2m-2 4h2m-2 4h2M12 4v16M4 4h16a2 2 0 012 2v12a2 2 0 01-2 2H4a2 2 0 01-2-2V6a2 2 0 012-2z" />
                                        </svg>
                                    </div>
                                    <span class="font-medium text-gray-800">Web Programming II</span>
                                </div>
                                <div class="text-right">
                                    <p class="text-sm font-semibold text-gray-800">85</p>
                                    <p class="text-xs text-gray-500">Nilai Akhir</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-y-4 md:space-y-8">
                    <div class="bg-white p-4 md:p-6 rounded-3xl shadow-sm">
                        <h3 class="text-md md:text-lg font-semibold text-gray-800 mb-4">Summary Raport</h3>
                        <div class="space-y-2 text-sm text-gray-600">
                            <div class="flex justify-between">
                                <span>Nilai Keterampilan</span>
                                <span class="font-semibold text-gray-800">A</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Nilai Sikap</span>
                                <span class="font-semibold text-gray-800">A</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Total Absensi</span>
                                <span class="font-semibold text-gray-800">3 Hari</span>
                            </div>
                        </div>
                        <a href="#"
                            class="mt-4 inline-block w-full text-center bg-blue-500 text-white py-2 px-4 rounded-2xl text-sm font-semibold hover:bg-blue-600 transition-colors duration-300">Download
                            Raport (PDF)</a>
                    </div>
                    <div class="bg-white p-4 md:p-6 rounded-3xl shadow-sm">
                        <h3 class="text-md md:text-lg font-semibold text-gray-800 mb-4">Catatan Guru Wali Kelas</h3>
                        <div class="bg-gray-50 p-4 rounded-2xl">
                            <p class="text-sm text-gray-700 leading-relaxed">
                                Mia menunjukkan peningkatan yang sangat baik di semester ini, terutama dalam mata
                                pelajaran matematika. Pertahankan semangat belajar yang tinggi dan jangan ragu untuk
                                bertanya jika ada kesulitan.
                            </p>
                            <div class="flex items-center space-x-2 mt-4 text-xs text-gray-500">
                                <img src="https://api.dicebear.com/7.x/adventurer/svg?seed=Teacher" alt="Ms. Elina"
                                    class="h-8 w-8 rounded-full">
                                <div>
                                    <p class="font-semibold text-gray-800">Ms. Elina</p>
                                    <p>Wali Kelas</p>
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

            // Set initial active state for "Raport" button
            const initialActiveButton = document.getElementById('raport-btn');
            if (initialActiveButton && window.innerWidth >= 1024) {
                moveIndicator(initialActiveButton);
                setActive(initialActiveButton);
            }

            navLinks.forEach(link => {
                link.addEventListener('click', function (event) {
                    // Cek apakah link adalah 'raport', jika ya, cegah perilaku default agar tidak langsung pindah halaman
                    if (this.id === 'raport-btn') {
                        event.preventDefault();
                    }
                    if (window.innerWidth >= 1024) {
                        moveIndicator(this);
                        setActive(this);
                    }
                    navMenu.classList.add('hidden');
                    // Jika bukan link "raport", biarkan navigasi berjalan
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

            // Chart.js initialization
            const ctx = document.getElementById('gradeChart');
            new Chart(ctx, {
                type: 'line',
                data: {
                    labels: ['Sem 1', 'Sem 2', 'Sem 3', 'Sem 4', 'Sem 5', 'Sem 6'],
                    datasets: [{
                        label: 'Nilai Rata-rata',
                        data: [78, 80, 82, 85, 87.5, 90],
                        borderColor: '#3B82F6',
                        backgroundColor: 'rgba(59, 130, 246, 0.2)',
                        fill: true,
                        tension: 0.4
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false, // Menjaga agar tidak merusak tata letak
                    plugins: {
                        legend: {
                            display: false
                        },
                        tooltip: {
                            mode: 'index',
                            intersect: false,
                        }
                    },
                    scales: {
                        y: {
                            beginAtZero: true,
                            max: 100
                        }
                    }
                }
            });
        });
    </script>
</body>

</html>