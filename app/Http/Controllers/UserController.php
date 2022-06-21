<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function login(Request $request){         
        $credentials = ['email' => $request->email, 'password' => $request->password];
        if (Auth::guard('web')->attempt($credentials, false, false)) {
            $token = Auth::guard('web')->user()->createToken('JWT');
            return response()->json($token->plainTextToken, 200);
        }
        return response()->json('Usuario invalido', 401);
    }
}
