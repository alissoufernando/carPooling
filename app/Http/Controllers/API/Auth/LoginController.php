<?php

namespace App\Http\Controllers\API\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request){
        $request->validate([
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);
        $user = User::where('email', $request->email)->first();
        // dd($user);
        return $user;
        if($user && Hash::check($request->password, $user->password))
        {

            $token = $user->createToken('user-token')->accessToken;
            $response = [
                'user' => $user,
                'token' => $token
            ];
         return response()->json($response, 201);
        }else{
            return response([
                'message' => ['These credentials do not match our records']
            ], 404);
        }



    }
}
