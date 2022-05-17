<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
         
        $request->validate([
            'phone' => 'required',
            'password' => 'required'
        ]);

        if (auth()->attempt(['phone' => $request->phone, 'password' => $request->password])) {
            return redirect()->route('home');
        }

        return redirect()->back()->withErrors(['email' => 'Email or password is incorrect']);
    }
}
