<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Student;
use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function register()
    {
        $role = Role::all();
        return view('auth.register', compact('role'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|exists:roles,name',
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role,
        ]);

        if($request->role == 'student'){
            $student = Student::create([
                'nisn' => $request->nisn,
                'nis' => $request->nis,
                'user_id' => $user->id,
                'date_of_birth' => $request->date_of_birth,
                'address' => $request->address,
            ]);
        } else {
            $role = Role::where('name', 'admin')->first();
        }

        return redirect()->route('login')->with('success', 'Registration successful. Please login.');
    }
}
