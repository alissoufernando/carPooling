<?php

namespace App\Http\Controllers\API\Dashboard\Voitures;

use App\Http\Controllers\Controller;
use App\Models\Voiture;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditVoitureController extends Controller
{
    public function editVoitures(Request $request, $id)
    {

        $data = Voiture::where('delete', 0)->where('id',$id)->first();
        if($data)
        {
            $request->validate([
                'marque' => 'required',
                'model' => 'required',
                'annee' => 'required',
                'images' => 'required',
                'couleur' => 'required',
                'place' => 'required',
                'prix' => 'required',
            ]);
            $data->marque = $request->marque;
            $data->marque = Auth::user()->id;
            $data->model = $request->model;
            $data->annee = $request->annee;
            $data->couleur = $request->couleur;
            $data->place = $request->place;
            $data->prix = $request->prix;
            $data->save();
            // $token = $user->createToken('Token')->accessToken;
            return response()->json(['user' => $data, 'message' => "Cette Voiture à été bien Ajouter"], 200);
        }else{
            return response()->json(['message' => "cette voiture n'existe pas dans le systeme"],404);

        }

    }
}
