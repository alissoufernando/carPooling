<?php

namespace App\Http\Controllers\API\Dashboard\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class EditUserController extends Controller
{
    public function editUsers(Request $request, $id)
    {

        $user = User::where('delete', 0)->where('id',$id)->first();
        if($user)
        {
            $request->validate([
                'name' => 'required',
                'phone' => 'required',
                'email' => 'required|unique:users',
                'password' => 'required',
            ]);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = Hash::make($request->password);
            $user->save();
            // $token = $user->createToken('Token')->accessToken;
            return response()->json(['user' => $user, 'message' => "Cet Utilisateur à été bien Ajouter"], 200);
        }else{
            return response()->json(['message' => "cet utilisateur n'existe pas dans ce systeme"],404);

        }

    }
}
