<?php

namespace App\Http\Controllers\API\Dashboard\Voitures;

use App\Http\Controllers\Controller;
use App\Models\Voiture;
use Illuminate\Http\Request;

class DeleteVoitureController extends Controller
{
    public function deleteVoitures($id){
        $voiture = Voiture::where('delete', 0)->where('id',$id)->first();
        if($voiture)
        {
            $voiture->delete = 1;
            $voiture->save();
           return response()->json(['message' => "Cette voiture à été supprimer"],200);

        }else{
            return response()->json(['message' => "cette voiture n'existe pas dans le systeme"],404);
        }

    }
}
