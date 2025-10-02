<?php

namespace App\Http\Controllers;

use App\Models\Instructorinfo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class InstructorAuthController extends Controller
{
    // Registration form
    // public function showRegisterForm()
    // {
    //     return view('auth.instructor_register');
    // }

    // Handle Registration
    // public function register(Request $request)
    // {
    //     $request->validate([
    //         'full_name' => 'required|string|max:255',
    //         'email'     => 'required|email',
    //         'phone'     => 'required',
    //         'password'  => 'required|min:6|confirmed',
    //         'bio'       => 'nullable|string',
    //     ]);

    //     $instructor = Instructorinfo::create([
    //         'full_name' => $request->full_name,
    //         'email'     => $request->email,
    //         'phone'     => $request->phone,
    //         'password'  => Hash::make($request->password),
    //         'bio'       => $request->bio,
    //     ]);

    //     Auth::guard('instructor')->login($instructor);

    //     return redirect()->route('instructor.dashboard');
    // }

    // Login form
    // public function showLoginForm()
    // {
    //     return view('instructor.login');
    // }

    // Handle login
    // public function login(Request $request)
    // {
    //     $credentials = $request->only('email', 'password');

    //     if (Auth::guard('instructor')->attempt($credentials)) {
    //         return redirect()->route('instructor.dashboard');
    //     }

    //     return back()->withErrors(['email' => 'Invalid credentials']);
    // }

    // Logout
    // public function logout()
    // {
    //     Auth::guard('instructor')->logout();
    //     return redirect()->route('instructor.login');
    // }
}
