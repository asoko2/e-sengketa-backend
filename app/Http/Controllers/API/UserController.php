<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;


use App\Models\User;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $fields = $request->validate([
            'username' => 'required|string|unique:users,username',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed',
            'name' => 'required|string',
            'alamat' => 'required|string',
            'no_hp' => 'required|string',
            'no_ktp' => 'required|integer|unique:users,no_ktp',
            'pekerjaan' => 'required|string',
            'pendidikan' => 'required|string',
        ]);

        $user = User::create([
            'username' => $fields['username'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
            'name' => $fields['name'],
            'alamat' => $fields['alamat'],
            'no_hp' => $fields['no_hp'],
            'no_ktp' => $fields['no_ktp'],
            'pekerjaan' => $fields['pekerjaan'],
            'pendidikan' => $fields['pendidikan'],
            'role' => 'pemohon'
        ]);

        $token = $user->createToken('accountToken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }
    
    public function login(Request $request) {
        $fields = $request->validate([
            'username' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check email
        $user = User::where('username', $fields['username'])->first();

        // Check password
        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'Bad creds'
            ], 401);
        }

        $token = $user->createToken('accountToken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 200);
    }

    public function logout(Request $request) {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged out'
        ];
    }
}