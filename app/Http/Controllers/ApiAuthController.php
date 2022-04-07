<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ApiAuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            "name" => "required|min:3",
            "email" => "required|unique:users,email",
            "password" => "required|min:6",
            "password_confirmation" => "same:password"
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->save();

        return response()->json([
            "message" => "Aung P"
        ], 200);
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            "email" => "required|email",
            "password" => "required|min:6"
        ]);

        if (!Auth::attempt($credentials)) {
            return response()->json([
                "message" => "login failed",
                "errors" => "invalid cretdentials"
            ], 422);
        } else {
            $token = Auth::user()->createToken('user-auth');
            return response()->json([
                "message" => "Aung p",
                "data" => $token
            ], 200);;
        };
    }

    public function logout(Request $request)
    {
        Auth::user()->tokens()->delete();
        return response()->json([
            "message" => "Logout Successful"
        ], 200);
    }
}
