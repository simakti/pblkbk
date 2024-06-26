<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        if (Auth::attempt($request->only('email', 'password'))) {
            return redirect('/dashboard');
        }
        return redirect('/login')->with('error', 'Invalid credentials.');
    }

    public function register(){
        return view('auth.register');
    }

    public function signUp(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/login')->with('success', 'Registration successful. Please login.');
    }

    public function logout(Request $request)
    {
        Auth::logout(); // Memanggil fungsi logout dari Auth

        $request->session()->invalidate(); // Menghapus session
        $request->session()->regenerateToken(); // Me-regenerate token CSRF

        return redirect('/'); // Redirect ke halaman utama setelah logout
    }

    public function viewForgotPassword()
    {
        return view('auth.forgot_password');
    }

    public function forgotPassword(Request $request)
    {
        // Implement forgot password functionality
    }

    public function redirectToHome()
    {
        return redirect()->route('/');
    }
}
