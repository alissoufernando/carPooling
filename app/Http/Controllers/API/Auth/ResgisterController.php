<?php

namespace App\Http\Controllers\API\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ResgisterController extends Controller
{
    public function register(Request $request){
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',
        ]);
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);
        $token = $user->createToken('Token')->accessToken;
        if($token)
        {
            return response()->json(['token' => $token, 'user' => $user], 200);

        }else{

            return response()->json(['message' => "error"], 404);
        }
    }

}
