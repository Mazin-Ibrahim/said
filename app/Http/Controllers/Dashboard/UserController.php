<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        return inertia('Dashboard/User/create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
            'phone' => 'required',
            'role' => 'required',
        ]);

        User::create([
            'name' => $request->name,
            'password' => Hash::make($request->password),
            'phone' => $request->phone,
            'role' => $request->role
        ]);

        return redirect()->route('users.index');
    }

    public function index()
    {
        $users = User::all();

        return inertia('Dashboard/User/index', [
            'users' => $users
        ]);
    }

    public function edit(User $user)
    {
        return inertia('Dashboard/User/edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'role' => 'required',
        ]);
             
        $password = null;
        if ($request->has('password')) {
            $password =  Hash::make($request->password);
        } else {
            $password = $user->password;
        }

        $user->password = $password;
        $user->name = $request->get('name');

        $user->role = $request->get('role');
        $user->phone = $request->get('phone');
        $user->save();
        
        

        return redirect()->route('users.index');
    }
}
