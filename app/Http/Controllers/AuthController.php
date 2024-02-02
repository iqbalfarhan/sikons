<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Sanctum\PersonalAccessToken;

class AuthController extends Controller
{
    public function login(Request $request){
        $valid = $request->only([
            'username',
            'password'
        ]);

        if (Auth::attempt($valid)) {
            $user = Auth::user();
            $token = $user->createToken('token-name')->plainTextToken;

            return response()->json(['token' => $token], 200);
        }

        return response()->json(['message' => 'Invalid credentials'], 401);
    }

    public function user(Request $request){
        return new UserResource($request->user());
    }

    public function logout(){
        $token = PersonalAccessToken::findToken(request()->bearerToken());
        if ($token) {
            $token->delete();
            Auth::guard('web')->logout();
        }

        return response()->json(['message' => 'Logout berhasil']);
    }
}
