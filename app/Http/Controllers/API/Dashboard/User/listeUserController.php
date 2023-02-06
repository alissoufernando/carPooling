<?php

namespace App\Http\Controllers\API\Dashboard\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class listeUserController extends Controller
{
    public function listeUsers()
    {
       $data = User::where('delete', 0)->orderBy('id', 'desc')->get();

       return response()->json($data,200);
    }

    public function User($id)
    {
        $data = User::where('delete', 0)->where('id',$id)->first();
        if($data)
        {
            return response()->json($data,200);
        }else{
            return response()->json(['message' => "cet utilisateur n'existe pas dans ce systeme"],404);

        }
    }
}
