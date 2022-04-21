<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class authController extends Controller
{
    
    public function login(Request $request)
    {

        $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->email)->first();
        
        if(!$user){
            return response()->json([
                'message' => 'User not found'
            ], 404);
        }

        if(!$user || !Hash::check($request->password, $user->password)){
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }
        $data =   $user->createToken('User Token')->accessToken;
        return response()->json([
            'user' => $user,
            'token' => $data->token,
        ]);
    }
}
