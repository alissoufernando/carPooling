<?php

namespace App\Http\Controllers\API\Dashboard\User;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DeleteUserController extends Controller
{
    public function deleteUsers($id){
        $user = User::where('delete', 0)->where('id',$id)->first();
        if($user)
        {
            $user->delete = 1;
            $user->save();
           return response()->json(['message' => "Cet utilisateur à été supprimer"],200);

        }else{
            return response()->json(['message' => "cet utilisateur n'existe pas dans ce systeme"],404);
        }

    }
}
