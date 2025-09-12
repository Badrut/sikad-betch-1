<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', [StudentController::class ,"index"]);
Route::get('/raport', [StudentController::class ,"rapot"]);
Route::get('/attendance', [StudentController::class ,"absen"]);