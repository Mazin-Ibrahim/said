<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
            'phone' => 'required',
            'role' => 'required',
        ]);

        $user = User::create([
             'name' => $request->name,
             'password' => Hash::make($request->password),
             'phone' => $request->phone,
             'role' => $request->role
         ]);

        return $user;
    }

    public function getAllUsers()
    {
        $users = User::all();

        return $users;
    }

    public function update(User $user, Request $request)
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

        return $user;
    }


    public function updateRole(User $user, Request $request)
    {
        $user->update([
            'role' => $request->role
        ]);

        return response()->json($user, 204);
    }

    
    public function deleteUser(User $user)
    {
        $user->delete();

        return response()->json(null, 204);
    }
}
