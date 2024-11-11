<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        $user = User::where('user_email', $credentials['email'])->first();

        if (!$user || !Hash::check($credentials['password'], $user->user_password)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        $token = JWTAuth::fromUser($user);
        return response()->json(['data' => $token]);
    }
}
