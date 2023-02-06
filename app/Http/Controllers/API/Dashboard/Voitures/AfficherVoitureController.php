<?php

namespace App\Http\Controllers\API\Dashboard\Voitures;

use App\Http\Controllers\Controller;
use App\Models\Voiture;
use Illuminate\Http\Request;

class AfficherVoitureController extends Controller
{
    public function listeVoitures()
    {
       $data = Voiture::where('delete', 0)->orderBy('id', 'desc')->get();

       return response()->json($data,200);
    }

    public function Voiture($id)
    {
        $data = Voiture::where('delete', 0)->where('id',$id)->first();
        if($data)
        {
            return response()->json($data,200);
        }else{
            return response()->json(['message' => "cette voiture n'existe pas dans le systeme"],404);

        }
    }
}
