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
        if(Auth::attempt($request->only('email','password'))){
            return redirect('/dashboard');
        }
        dd('password salah');
        return redirect('/login');
    }

    public function signUp(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required'],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/logins'.'Register Succes');
    }

    public function viewForgotPassword()
    {
        return view('auth.forgot_password');
    }


    public function forgotPassword(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'password' => ['required'],
            'password_confirmation' => ['required'],
        ]);

        if ($request->password != $request->password_confirmation) {
            echo('<script>alert("Password tidak sesuai!"); history.back()</script>');
        }

        $user = User::where('email', $request->email)->first();
        if($user){
            $user->password = Hash::make($request->password);
            $user->save();
        }else{
            echo('<script>alert("Email tidak ditemukan!")</script>');
        }

        return view('auth.login');

    }
    public function redirectToHome()
    {
        return redirect()->route('home');
    }
}
