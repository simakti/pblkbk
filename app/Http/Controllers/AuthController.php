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
        return view('auth.login'); // Ensure you have this view
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard'); // Redirect to the intended page
        }

        return redirect('login')->withErrors('Login details are not valid');
    }

    public function showRegistrationForm()
    {
        return view('auth.register'); // Ensure you have this view
    }

    public function signUp(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Auth::login($user);

        return redirect()->route('home')->with('success', 'Registration successful');
    }

    public function viewForgotPassword()
    {
        return view('auth.forgot_password');
    }

    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:255',
            'password' => 'required|string|min:8|confirmed',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user) {
            $user->password = Hash::make($request->password);
            $user->save();
            return redirect()->route('login')->with('success', 'Password reset successful');
        }

        return redirect()->back()->withErrors('Email not found');
    }
}
