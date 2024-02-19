<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    function registration(Request $request)
    {
        $validate = Validator::make($request->all(), [
            "full_name" => "required",
            "email" => "required|email|unique:users",
            "password" => "required",
            "confirm_password" => "required|same:password",
        ]);

        if ($validate->fails()) {
            return response()->json([
                "status" => 400,
                "msg" => "Registrasi gagal",
                "error" => $validate->errors()
            ], 400);
        }

        $dataRegist = [
            "full_name" => htmlspecialchars($request->input("full_name")),
            "email" => htmlspecialchars($request->input("email")),
            "password" => bcrypt($request->input("password")),
            "img_profil" => "profil.jpg",
            "user_role" => "user",
        ];

        $user = User::create($dataRegist);

        return response()->json([
            "status" => 200,
            "msg" => "berhasil membuat akun",
        ], 200);
    }

    function login(Request $request)
    {
        $validate = Validator::make($request->all(), [
            "email" => "required|email",
            "password" => "required",
        ]);

        if ($validate->fails()) {
            return response()->json([
                "status" => 400,
                "msg" => "Login gagal",
                "error" => $validate->errors()
            ], 400);
        }

        if (Auth::attempt(["email" => $request->input("email"), "password" => $request->input("password")])) {
            $auth = Auth::user();
            $token = $auth->createToken($request->input('email'))->plainTextToken;

            return response()->json([
                "status" => 200,
                "msg" => "berhasil login",
                "token_type" => "Bearer",
                "access_token" => $token,
            ], 200);
        } else {
            return response()->json([
                "status" => 400,
                "msg" => "Login gagal, email/password salah",
            ], 400);
        }
    }
}
