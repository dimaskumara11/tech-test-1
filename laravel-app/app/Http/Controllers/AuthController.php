<?php

namespace App\Http\Controllers;

use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm() : View
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'user_email' => 'required|email',
            'user_password' => 'required',
        ]);

        if (Auth::attempt(['user_email' => $request->user_email, 'password' => $request->user_password])) {
            session([
                "fullname" => auth()->user()->user_fullname
            ]);
            return redirect()->intended('dashboard');
        }
        return back()->withErrors(['login' => 'Invalid credentials.']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
