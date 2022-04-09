<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // /**
    //  * Create a new AuthController instance.
    //  *
    //  * @return void
    // */
    // public function __construct()
    // {
    //     $this->middleware('auth:api', ['except' => ['login']]);
    // }

    public function loginAdmin(Request $request)
    {
        dd("aha");

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        try {
            $credentials = $request->only('email', 'password');
            
            $token = $this->guard()->attempt($credentials);
            
            if (!$token) return $this->returnFailed("invalid credentials");
            
            // return $this->respondWithToken($token);

            // $token = Auth::setTTL(18000)->attempt($request->email);

            $user = Auth::user();
            $user->token = $token;
            
            return self::returnSuccess($user);
        } catch (\Exception $e) {
            return self::returnFailed($e->getMessage());
        }
    }
}
