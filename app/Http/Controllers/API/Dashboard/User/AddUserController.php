<?php

namespace App\Http\Controllers\API\Dashboard\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class AddUserController extends Controller
{
    public function addUsers(Request $request){
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|unique:users',
            'password' => 'required',

        ]);
        // return $request;
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);
        if($user)
        {
            return response()->json(['user' => $user, 'message' => "Un nouvel utilisateur à été ajouter"], 201);

        }else{
            return response()->json(['message' => "erreur de creation"], 404);
        }
        // $token = $user->createToken('Token')->accessToken;
    }
}
