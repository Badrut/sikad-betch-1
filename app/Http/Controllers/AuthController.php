<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

        if ($request->role === 'students') {
            $request->validate([
                'nisn' => 'required|string|unique:students,nisn',
                'nis' => 'required|string|unique:students,nis',
                'date_of_birth' => 'required|date',
                'address' => 'required|string',
                'gender' => 'required|in:L,P',
            ]);
        } else { // teachers atau staff
            $request->validate([
                'nip' => 'required|string|unique:teachers,nip',
                'gender' => 'required|in:L,P',
            ]);
        }

        $role = Role::where('name', $request->role)->first();

        if (!$role) {
            return back()->withErrors(['role' => 'Peran tidak valid.'])->withInput();
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role_id' => $role->id,
        ]);

        if ($request->role == 'student') {
            $student = Student::create([
                'nisn' => $request->nisn,
                'nis' => $request->nis,
                'user_id' => $user->id,
                'date_of_birth' => $request->date_of_birth,
                'address' => $request->address,
                'gender' => $request->gender
            ]);
        } else {
            $teacher = Teacher::create([
                'nip' => $request->nip,
                'user_id' => $user->id,
                'gender' => $request->gender,
                'is_active' => true,
                'is_homeroom_teacher' => false,
            ]);
        }


        return redirect('/login')->with('success', 'Registration successful. Please login.');
    }

    public function loginPost(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            $user = Auth::user();

            if ($user->role->name === 'admin') {
                return redirect()->intended('/admin/dashboard');
            } elseif ($user->role->name === 'students') {
                return redirect()->intended('/student/dashboard');
            } elseif ($user->role->name === 'teachers') {
                return redirect()->intended('/teacher/dashboard');
            }

            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password yang Anda berikan tidak cocok.',
        ])->onlyInput('email');
    }
}
