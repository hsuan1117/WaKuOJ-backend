<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * sanctum login issue token
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = request(['email', 'password']);

        if (!Auth::attempt($credentials)) {
            return response()->json([
                'message' => 'Unauthorized'
            ], 401);
        }

        $user = $request->user();

        $token = $user->createToken('Personal Access Token');
        /*$token = $tokenResult->accessToken;

        if ($request->remember_me) {
            $token->expires_at = Carbon::now()->addWeeks(1);
        }

        $token->save();*/

        return response()->json([
            'access_token' => $token->plainTextToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $token->accessToken->expires_at
            )->toDateTimeString()
        ]);
    }

    /**
     * Register and issue sanctum token
     */
    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users',
            'password' => 'required|string'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);

        $token = $user->createToken('Personal Access Token');

        return response()->json([
            'access_token' => $token->plainTextToken,
            'token_type' => 'Bearer',
            'expires_at' => Carbon::parse(
                $token->accessToken->expires_at
            )->toDateTimeString()
        ]);
    }
}
