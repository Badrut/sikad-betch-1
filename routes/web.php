<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', [AuthController::class, 'login']);
Route::post('/login', [AuthController::class, 'loginPost'])->name('login.post');
Route::get('/register', [AuthController::class, 'register']);
Route::post('/register', [AuthController::class, 'store'])->name('register.store');

Route::middleware(['auth', 'role:admin'])->group(
    function () {
        Route::get('/dashboard', function () {
            return view('dashboard');
        })->name('dashboard');
    }
);

Route::middleware(['auth', 'role:students'])->group(
    function () {
        Route::get('/student/dashboard', [StudentController::class, "index"]);
        Route::get('/student/raport', [StudentController::class, "rapot"]);
        Route::get('/student/attendance', [StudentController::class, "absen"]);
        Route::get('/student/schedule', [StudentController::class, "jadwal"]);
        Route::get('/student/profile', [StudentController::class, "profil"]);
    }
);
