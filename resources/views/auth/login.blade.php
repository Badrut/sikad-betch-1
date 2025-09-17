<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Koperasi</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            background-color: #f8fafc;
        }

        .login-card {
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
            transition: transform 0.2s ease-in-out;
        }

        .login-card:hover {
            transform: translateY(-2px);
        }

        .input-field:focus {
            box-shadow: 0 0 0 3px rgba(74, 222, 128, 0.2);
        }

        .login-btn {
            transition: all 0.2s ease-in-out;
        }

        .login-btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06);
        }
    </style>
</head>

<body class="flex items-center justify-center min-h-screen p-4">
    <div class="login-card bg-white rounded-2xl w-full max-w-md p-8">
        <div class="text-center mb-8">
            <div class="inline-flex items-center justify-center bg-green-50 rounded-full p-4 mb-4">
                <img src="{{ asset('assets/logo.png') }}" alt="Logo Koperasi" class="mx-auto"
                    style="width: 60px; height: 56px;">
            </div>
            <h1 class="text-2xl font-bold text-gray-800 mb-1">Login Sekolah</h1>
            <p class="text-gray-500 text-sm">Masuk untuk mengakses akun Anda</p>
        </div>

        <form id="loginForm" method="POST" action="{{ route('login.post') }}" class="space-y-6">
            @csrf
            <div>
                <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                <input type="text" id="email" name="email" placeholder="Masukkan Email Anda" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg input-field focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition duration-200">
            </div>

            <div>
                <label for="password" class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                <input type="password" id="password" name="password" placeholder="••••••••" required
                    class="w-full px-4 py-2 border border-gray-300 rounded-lg input-field focus:ring-2 focus:ring-green-500 focus:border-green-500 outline-none transition duration-200">
            </div>

            <div class="pt-2">
                <button type="submit"
                    class="w-full login-btn bg-green-500 hover:bg-green-600 text-white font-semibold py-2.5 px-4 rounded-lg transition duration-200">
                    Masuk
                </button>
            </div>
        </form>

        <p class="mt-8 text-center text-sm text-gray-500">
            &copy; 2025 MumetCrew. Semua hak cipta dilindungi.
        </p>
    </div>
</body>

</html>
