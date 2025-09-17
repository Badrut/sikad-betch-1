<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pendaftaran Sekolah</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
        }

        .form-step {
            display: none;
            animation: fadeIn 0.5s ease-in-out;
        }

        .form-step.active {
            display: block;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }

            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    </style>
</head>

<body class="bg-slate-50 flex items-center justify-center min-h-screen p-4">

    <div class="w-full max-w-4xl bg-white rounded-2xl shadow-xl overflow-hidden md:flex">
        <div class="md:w-1/3 bg-gradient-to-b from-green-500 to-emerald-600 p-8 text-white">
            <div class="text-center md:text-left">
                <img src="{{ asset('assets/logo.png') }}" alt="Logo Sekolah" class="w-16 h-auto mx-auto md:mx-0 mb-4">
                <h2 class="text-2xl font-bold">Pendaftaran Anggota</h2>
                <p class="text-green-200 mt-2 text-sm">Lengkapi data Anda melalui langkah-langkah berikut.</p>
            </div>
            <ul class="mt-12 space-y-4" id="step-indicator">
                <li class="step flex items-center" data-step="1">
                    <div
                        class="step-number w-10 h-10 rounded-full flex items-center justify-center font-bold text-lg transition-colors duration-300">
                        1</div>
                    <div class="ml-4">
                        <p class="text-sm text-green-200">Langkah 1</p>
                        <p class="font-bold">Pilih Peran</p>
                    </div>
                </li>
                <li class="step flex items-center" data-step="2">
                    <div
                        class="step-number w-10 h-10 rounded-full flex items-center justify-center font-bold text-lg transition-colors duration-300">
                        2</div>
                    <div class="ml-4">
                        <p class="text-sm text-green-200">Langkah 2</p>
                        <p class="font-bold">Data Diri</p>
                    </div>
                </li>
                <li class="step flex items-center" data-step="3">
                    <div
                        class="step-number w-10 h-10 rounded-full flex items-center justify-center font-bold text-lg transition-colors duration-300">
                        3</div>
                    <div class="ml-4">
                        <p class="text-sm text-green-200">Langkah 3</p>
                        <p class="font-bold">Detail Info</p>
                    </div>
                </li>
            </ul>
        </div>

        <div class="md:w-2/3 p-8">
            <form id="registerForm" method="POST" action="{{ route('register.store') }}">
                @csrf
                <div class="form-step active" id="step1">
                    <h2 class="text-2xl font-bold text-gray-800 mb-2">Pilih Peran Anda</h2>
                    <p class="text-gray-500 mb-8">Peran akan menentukan informasi yang perlu diisi selanjutnya.</p>
                    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-4">
                        @foreach ($role as $role)
                            <div class="role-card border-2 border-gray-200 rounded-xl p-4 text-center cursor-pointer hover:border-green-500 hover:bg-green-50 transition-all duration-300 relative"
                                data-role="{{ $role->name }}">
                                <i class="fas fa-user-circle text-3xl text-green-500 mb-3"></i>
                                <h3 class="font-bold text-md text-gray-800">{{ ucfirst($role->name) }}</h3>
                                <i
                                    class="fas fa-check-circle text-green-600 text-xl absolute top-3 right-3 opacity-0 transition-opacity duration-300"></i>
                            </div>
                        @endforeach
                    </div>
                    <p id="roleError" class="text-red-500 text-sm mt-4 h-5"></p>
                    <input type="hidden" id="role" name="role">
                    <div class="flex justify-end mt-10">
                        <button type="button"
                            class="btn-next bg-green-500 text-white font-bold py-3 px-8 rounded-lg hover:bg-green-600 transition-all duration-300 flex items-center gap-2">
                            Selanjutnya <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>

                <div class="form-step" id="step2">
                    <h2 class="text-2xl font-bold text-gray-800 mb-2">Informasi Dasar</h2>
                    <p class="text-gray-500 mb-8">Data ini akan digunakan untuk login ke akun Anda.</p>
                    <div class="space-y-6">
                        <div>
                            <label for="name" class="font-medium text-gray-700 block mb-2">Nama Lengkap</label>
                            <input type="text" id="name" name="name" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 transition"
                                placeholder="Masukkan nama lengkap Anda">
                            <p class="error-message text-red-500 text-sm mt-1 h-5"></p>
                        </div>
                        <div>
                            <label for="email" class="font-medium text-gray-700 block mb-2">Alamat Email</label>
                            <input type="email" id="email" name="email" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 transition"
                                placeholder="contoh@email.com">
                            <p class="error-message text-red-500 text-sm mt-1 h-5"></p>
                        </div>
                        <div>
                            <label for="password" class="font-medium text-gray-700 block mb-2">Password</label>
                            <input type="password" id="password" name="password" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 transition"
                                placeholder="Minimal 8 karakter">
                            <p class="error-message text-red-500 text-sm mt-1 h-5"></p>
                        </div>
                        <div>
                            <label for="password_confirmation" class="font-medium text-gray-700 block mb-2">Konfirmasi
                                Password</label>
                            <input type="password" id="password_confirmation" name="password_confirmation" required
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 transition"
                                placeholder="Masukkan ulang password Anda">
                            <p class="error-message text-red-500 text-sm mt-1 h-5"></p>
                        </div>
                    </div>
                    <div class="flex justify-between mt-10">
                        <button type="button"
                            class="btn-prev bg-gray-200 text-gray-700 font-bold py-3 px-8 rounded-lg hover:bg-gray-300 transition-all duration-300 flex items-center gap-2">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </button>
                        <button type="button"
                            class="btn-next bg-green-500 text-white font-bold py-3 px-8 rounded-lg hover:bg-green-600 transition-all duration-300 flex items-center gap-2">
                            Selanjutnya <i class="fas fa-arrow-right"></i>
                        </button>
                    </div>
                </div>

                <div class="form-step" id="step3">
                    <h2 class="text-2xl font-bold text-gray-800 mb-2">Informasi Detail</h2>
                    <p class="text-gray-500 mb-8">Lengkapi data sesuai dengan peran yang Anda pilih.</p>
                    <div id="extraFields" class="space-y-6">
                    </div>
                    <div class="flex justify-between mt-10">
                        <button type="button"
                            class="btn-prev bg-gray-200 text-gray-700 font-bold py-3 px-8 rounded-lg hover:bg-gray-300 transition-all duration-300 flex items-center gap-2">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </button>
                        <button type="submit"
                            class="bg-emerald-500 text-white font-bold py-3 px-8 rounded-lg hover:bg-emerald-600 transition-all duration-300 flex items-center gap-2">
                            <i class="fas fa-check"></i> Daftar Sekarang
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            let currentStep = 1;
            const formSteps = document.querySelectorAll('.form-step');
            const stepItems = document.querySelectorAll('#step-indicator .step');
            const nextButtons = document.querySelectorAll('.btn-next');
            const prevButtons = document.querySelectorAll('.btn-prev');
            const roleCards = document.querySelectorAll('.role-card');
            const hiddenRoleInput = document.getElementById('role');
            const registerForm = document.getElementById('registerForm');

            const goToStep = (stepNumber) => {
                currentStep = stepNumber;
                formSteps.forEach((step, index) => {
                    step.classList.toggle('active', index + 1 === currentStep);
                });
                updateStepIndicator();
            };

            const updateStepIndicator = () => {
                stepItems.forEach((step, index) => {
                    const stepNumEl = step.querySelector('.step-number');
                    const stepTextElements = step.querySelectorAll('p');
                    const stepIndex = index + 1;
                    stepNumEl.classList.remove('bg-white', 'text-green-600');
                    stepNumEl.classList.add('bg-white/20', 'text-white');
                    stepTextElements.forEach(p => p.classList.remove('text-white'));
                    stepTextElements.forEach(p => p.classList.add('text-green-200'));
                    step.querySelector('p:last-child').classList.remove('text-white');
                    step.querySelector('p:last-child').classList.add('text-white');

                    if (stepIndex < currentStep) {
                        stepNumEl.innerHTML = `<i class="fas fa-check"></i>`;
                        stepNumEl.classList.replace('bg-white/20', 'bg-white');
                        stepNumEl.classList.replace('text-white', 'text-green-600');
                    } else if (stepIndex === currentStep) {
                        stepNumEl.innerHTML = stepIndex;
                        stepNumEl.classList.replace('bg-white/20', 'bg-white');
                        stepNumEl.classList.replace('text-white', 'text-green-600');
                        stepTextElements.forEach(p => p.classList.replace('text-green-200',
                            'text-white'));
                    } else {
                        stepNumEl.innerHTML = stepIndex;
                    }
                });
            };

            roleCards.forEach(card => {
                card.addEventListener('click', () => {
                    roleCards.forEach(c => {
                        c.classList.remove('selected', 'border-green-600', 'bg-green-50');
                        c.querySelector('.fa-check-circle').classList.add('opacity-0');
                    });
                    card.classList.add('selected', 'border-green-600', 'bg-green-50');
                    card.querySelector('.fa-check-circle').classList.remove('opacity-0');
                    hiddenRoleInput.value = card.dataset.role;
                    document.getElementById('roleError').textContent = '';
                });
            });

            nextButtons.forEach(button => {
                button.addEventListener('click', () => {
                    if (validateStep(currentStep)) {
                        if (currentStep === 1) loadExtraFields();
                        goToStep(currentStep + 1);
                    }
                });
            });

            prevButtons.forEach(button => {
                button.addEventListener('click', () => {
                    goToStep(currentStep - 1);
                });
            });

            registerForm.addEventListener('submit', (e) => {
                if (!validateStep(3)) {
                    e.preventDefault();
                    alert('Harap lengkapi semua data yang diperlukan di langkah terakhir.');
                } else {
                    registerForm.submit();
                }
            });

            const showError = (inputElement, message) => {
                const errorElement = inputElement.nextElementSibling;
                inputElement.classList.add('border-red-500');
                if (errorElement && errorElement.classList.contains('error-message')) {
                    errorElement.textContent = message;
                }
            };

            const clearError = (inputElement) => {
                const errorElement = inputElement.nextElementSibling;
                inputElement.classList.remove('border-red-500');
                if (errorElement && errorElement.classList.contains('error-message')) {
                    errorElement.textContent = '';
                }
            };

            const validateStep = (step) => {
                let isValid = true;
                const activeStepDiv = document.getElementById(`step${step}`);

                if (step === 1) {
                    if (!hiddenRoleInput.value) {
                        document.getElementById('roleError').textContent = 'Silakan pilih salah satu peran.';
                        isValid = false;
                    }
                }

                if (step === 2) {
                    const nameInput = document.getElementById('name');
                    const emailInput = document.getElementById('email');
                    const passwordInput = document.getElementById('password');
                    const passwordConfirmationInput = document.getElementById('password_confirmation');

                    clearError(nameInput);
                    clearError(emailInput);
                    clearError(passwordInput);
                    clearError(passwordConfirmationInput);

                    if (!nameInput.value.trim()) {
                        showError(nameInput, 'Nama wajib diisi.');
                        isValid = false;
                    }
                    if (!emailInput.value.trim() || !/^\S+@\S+\.\S+$/.test(emailInput.value)) {
                        showError(emailInput, 'Email tidak valid.');
                        isValid = false;
                    }
                    if (!passwordInput.value.trim() || passwordInput.value.length < 8) {
                        showError(passwordInput, 'Password minimal 8 karakter.');
                        isValid = false;
                    }
                    if (passwordInput.value !== passwordConfirmationInput.value) {
                        showError(passwordConfirmationInput, 'Konfirmasi password tidak cocok.');
                        isValid = false;
                    }
                }

                if (step === 3) {
                    const inputs = activeStepDiv.querySelectorAll(
                        'input[required], select[required], textarea[required]');
                    inputs.forEach(input => {
                        clearError(input);
                        if (!input.value.trim()) {
                            showError(input, 'Field ini wajib diisi.');
                            isValid = false;
                        }
                    });
                }
                return isValid;
            };

            const loadExtraFields = () => {
                const role = hiddenRoleInput.value;
                const extraFieldsContainer = document.getElementById("extraFields");
                extraFieldsContainer.innerHTML = "";
                const inputClass =
                    "w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-green-500 transition";
                const errorMsgHTML = `<p class="error-message text-red-500 text-sm mt-1 h-5"></p>`;
                let fieldsHTML = '';

                if (role === "students") {
                    fieldsHTML = `
                        <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                            <div>
                                <label for="nisn" class="font-medium text-gray-700 block mb-2">NISN</label>
                                <input type="text" id="nisn" name="nisn" required class="${inputClass}" placeholder="Nomor Induk Siswa Nasional">
                                ${errorMsgHTML}
                            </div>
                            <div>
                                <label for="nis" class="font-medium text-gray-700 block mb-2">NIS</label>
                                <input type="text" id="nis" name="nis" required class="${inputClass}" placeholder="Nomor Induk Siswa">
                                ${errorMsgHTML}
                            </div>
                            <div class="sm:col-span-2">
                                <label for="date_of_birth" class="font-medium text-gray-700 block mb-2">Tanggal Lahir</label>
                                <input type="date" id="date_of_birth" name="date_of_birth" required class="${inputClass}">
                                ${errorMsgHTML}
                            </div>
                            <div class="sm:col-span-2">
                                <label for="gender" class="font-medium text-gray-700 block mb-2">Jenis Kelamin</label>
                                <select id="gender" name="gender" required class="${inputClass}">
                                    <option value="" disabled selected>-- Pilih Jenis Kelamin --</option>
                                    <option value="L">Laki-laki</option>
                                    <option value="P">Perempuan</option>
                                </select>
                                ${errorMsgHTML}
                            </div>
                            <div class="sm:col-span-2">
                                <label for="address" class="font-medium text-gray-700 block mb-2">Alamat</label>
                                <textarea id="address" name="address" required class="${inputClass}" rows="3" placeholder="Alamat lengkap"></textarea>
                                ${errorMsgHTML}
                            </div>
                        </div>
                    `;
                } else {
                    fieldsHTML = `
                        <div>
                            <label for="nip" class="font-medium text-gray-700 block mb-2">NIP</label>
                            <input type="text" id="nip" name="nip" required class="${inputClass}" placeholder="Nomor Induk Pegawai">
                            ${errorMsgHTML}
                        </div>
                        <div>
                            <label for="gender" class="font-medium text-gray-700 block mb-2">Jenis Kelamin</label>
                            <select id="gender" name="gender" required class="${inputClass}">
                                <option value="" disabled selected>-- Pilih Jenis Kelamin --</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                            ${errorMsgHTML}
                        </div>
                    `;
                }
                extraFieldsContainer.innerHTML = fieldsHTML;
            };

            updateStepIndicator();
        });
    </script>
</body>

</html>
