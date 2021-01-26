<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'email|required',
            'password' => 'confirmed|min:6|required'
        ]);

        $user = User::create(Arr::collapse([
            $request->except('password'),
            ['password' => bcrypt($request->password)]
        ]));
        $token = $user->createToken('auth')->plainTextToken;

        return response('success');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'email|required',
            'password' => 'min:6|required'
        ]);

        $credentials = $request->only(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            return response('wrong_password_or_email', 400);
        }

        $user = User::find(auth()->id());
        $token = $user->createToken('auth')->plainTextToken;

        return [ 'token' => $token ];
    }

    public function logout()
    {
        $user = User::find(auth()->id());
        $user->tokens()->delete();       
        
        return response('success');
    }
}
