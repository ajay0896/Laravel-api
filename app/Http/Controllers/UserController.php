<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function login(Request $request)
    {
        $data = $request->validate([
            'username'=>'required',
            'password'=>'required',
        ]);

        if (auth()->attempt($data)) {
            $token = auth()->user()->CreateToken('app')->plainTextToken;

            return response([
                'message'=>'berhasil login',
                'kode'=>$token
            ]);
        }
        return response([
            'gagal login'
        ]);
    }


    public function logout()
    {
        auth()->user()->currentAccessToken()->delete();

        return response([
            'berhasil logout'
        ]);
    }

    public function register(Request $request, User $user)
    {
        $data = $request->validate([
            'name'=>'required|unique:users',
            'username'=>'required',
            'password'=>'required',
        ]);

        User::create([
            'name'=>$request->name,
            'username'=>$request->username,
            'password'=>bcrypt($request->password),
        ]);

        return response([
            'berhasil register'
        ]);
    }
}
