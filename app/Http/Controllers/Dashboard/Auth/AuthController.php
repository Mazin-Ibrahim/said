<?php

namespace App\Http\Controllers\Dashboard\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
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

        $user = User::where('phone', '=', $request->phone)->first();

        if ($user->role != 'admin') {
            return redirect()->back()->withErrors(['phone' => 'You are not allowed to login']);
        }

        if (auth()->attempt(['phone' => $request->phone, 'password' => $request->password])) {
            return redirect()->route('users.index');
        }

        return redirect()->back()->withErrors(['phone' => 'Phone or password is incorrect']);
    }

    public function logout()
    {
        auth()->logout();

        return redirect()->route('showLoginForm');
    }
}
