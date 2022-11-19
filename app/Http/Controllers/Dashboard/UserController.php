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
        return view('dashboard.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required',
            'phone' => 'required',
            'role' => 'required',
        ], [
            'name.required' => 'يجب أدخال الاسم',
            'password.required' => 'يجب ادخال كلمة المرور',
            'phone.required' => 'يجب ادخال رقم الجوال',
            'role.required' => 'يجب ادخال الدور'
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

        return view('dashboard.users.index', [
            'users' => $users
        ]);
    }

    public function edit(User $user)
    {
        return view('dashboard.users.edit', [
            'user' => $user
        ]);
    }

    public function update(Request $request, User $user)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'role' => 'required',
        ], [
            'name.required' => 'يجب أدخال الاسم',
            'phone.required' => 'يجب ادخال رقم الجوال',
            'role.required' => 'يجب ادخال الدور'
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
