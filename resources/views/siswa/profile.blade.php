<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile - SMK Student Dashboard</title>
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
            <h1 class="text-2xl font-bold text-gray-800 mb-6">Student Profile</h1>

            <div class="grid grid-cols-1 lg:grid-cols-3 gap-4 md:gap-8">

                <div class="lg:col-span-2 space-y-4 md:space-y-8">
                    <div class="bg-white p-4 md:p-6 rounded-3xl shadow-sm">
                        <div class="flex items-center space-x-6 mb-4">
                            <img src="https://api.dicebear.com/7.x/adventurer/svg?seed=Richardo" alt="Richardo"
                                class="rounded-full h-24 w-24 md:h-32 md:w-32 object-cover border-4 border-gray-200">
                            <div>
                                <h2 class="text-xl md:text-3xl font-bold text-gray-800">Richardo Adiwijaya</h2>
                                <p class="text-sm text-gray-500">Student | Grade 12 | RPL</p>
                            </div>
                        </div>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mt-6">
                            <div>
                                <p class="text-xs text-gray-500">Nomor Induk Siswa</p>
                                <p class="font-semibold text-gray-800">123456789</p>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500">Tanggal Lahir</p>
                                <p class="font-semibold text-gray-800">20 November 2005</p>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500">Alamat</p>
                                <p class="font-semibold text-gray-800">Jl. Bunga Melati No. 10, Jakarta</p>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500">Email</p>
                                <p class="font-semibold text-blue-600">richardo.a@smk.id</p>
                            </div>
                            <div>
                                <p class="text-xs text-gray-500">Nomor Telepon</p>
                                <p class="font-semibold text-gray-800">+62 812-3456-7890</p>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-4 md:p-6 rounded-3xl shadow-sm">
                        <h3 class="text-md md:text-lg font-semibold text-gray-800 mb-4">Prestasi & Penghargaan</h3>
                        <div class="space-y-4">
                            <div class="flex items-center space-x-4 p-3 bg-gray-50 rounded-2xl">
                                <div class="bg-yellow-200 p-2 rounded-full">
                                    <svg class="h-6 w-6 text-yellow-600" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M11.08 17.5l-2.4 1.2a1 1 0 01-1.4-1.1l.4-2.7L4.5 12.9a1 1 0 01.5-1.7l2.8-.4 1.3-2.5a1 1 0 011.8 0l1.3 2.5 2.8.4a1 1 0 01.5 1.7l-2 2.1.4 2.7a1 1 0 01-1.4 1.1l-2.4-1.2z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800">Juara 1 Lomba Coding Nasional</p>
                                    <p class="text-xs text-gray-500">Tahun 2024</p>
                                </div>
                            </div>
                            <div class="flex items-center space-x-4 p-3 bg-gray-50 rounded-2xl">
                                <div class="bg-blue-200 p-2 rounded-full">
                                    <svg class="h-6 w-6 text-blue-600" fill="none" viewBox="0 0 24 24"
                                        stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                            d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                                    </svg>
                                </div>
                                <div>
                                    <p class="font-semibold text-gray-800">Siswa Teladan Semester Genap</p>
                                    <p class="text-xs text-gray-500">Tahun 2023</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-y-4 md:space-y-8">
                    <div class="bg-white p-4 md:p-6 rounded-3xl shadow-sm">
                        <h3 class="text-md md:text-lg font-semibold text-gray-800 mb-4">Ringkasan Akademik</h3>
                        <div class="space-y-2 text-sm text-gray-600">
                            <div class="flex justify-between">
                                <span>Nilai Rata-rata</span>
                                <span class="font-semibold text-gray-800">87.5</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Peringkat Kelas</span>
                                <span class="font-semibold text-gray-800">5 / 30</span>
                            </div>
                            <div class="flex justify-between">
                                <span>Kehadiran</span>
                                <span class="font-semibold text-gray-800">97%</span>
                            </div>
                        </div>
                    </div>

                    <div class="bg-white p-4 md:p-6 rounded-3xl shadow-sm">
                        <h3 class="text-md md:text-lg font-semibold text-gray-800 mb-4">Ekstrakurikuler</h3>
                        <div class="space-y-2">
                            <div class="flex items-center space-x-2">
                                <div class="w-2 h-2 rounded-full bg-green-500"></div>
                                <span class="text-sm font-semibold text-gray-800">Tim Robotik</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <div class="w-2 h-2 rounded-full bg-blue-500"></div>
                                <span class="text-sm font-semibold text-gray-800">Klub Desain Grafis</span>
                            </div>
                            <div class="flex items-center space-x-2">
                                <div class="w-2 h-2 rounded-full bg-purple-500"></div>
                                <span class="text-sm font-semibold text-gray-800">Pramuka</span>
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

            // Set initial active state for "Profile" button
            const initialActiveButton = document.getElementById('profile-btn');
            if (initialActiveButton && window.innerWidth >= 1024) {
                moveIndicator(initialActiveButton);
                setActive(initialActiveButton);
            }

            navLinks.forEach(link => {
                link.addEventListener('click', function (event) {
                    // Cek apakah link adalah 'profile', jika ya, cegah perilaku default agar tidak langsung pindah halaman
                    if (this.id === 'profile-btn') {
                        event.preventDefault();
                    }
                    if (window.innerWidth >= 1024) {
                        moveIndicator(this);
                        setActive(this);
                    }
                    navMenu.classList.add('hidden');
                    // Jika bukan link "profile", biarkan navigasi berjalan
                    if (this.href && this.id !== 'profile-btn') {
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