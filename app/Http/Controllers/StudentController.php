<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index() {
        return view("siswa.dashboard");
    }

    public function rapot() {
    return view("siswa.raport");
    }

    public function absen() {
    return view("siswa.attendance");
    }

    public function jadwal() {
    return view("siswa.schedule");
    }

    public function profil() {
    return view("siswa.profile");
    }
}
