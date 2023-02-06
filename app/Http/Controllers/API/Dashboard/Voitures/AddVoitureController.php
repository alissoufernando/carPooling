<?php

namespace App\Http\Controllers\API\Dashboard\Voitures;

use App\Http\Controllers\Controller;
use App\Models\Voiture;
use Illuminate\Http\Request;

class AddVoitureController extends Controller
{
    public $array_full =[];
    public $image;
    public function addVoitures(Request $request){
        $request->validate([
            'marque' => 'required',
            'immatriculation' => 'required',
            'model' => 'required',
            'annee' => 'required',
            'images' => 'required',
            'couleur' => 'required',
            'place' => 'required',
            'prix' => 'required',
            'user_id' => 'required',
        ]);
        // $this->image = $request->images;
        $this->uploadOne($request->images);
        $voiture = Voiture::create([
            'user_id' => $request->user_id,
            'immatriculation' => $request->immatriculation,
            'model' => $request->model,
            'marque' => $request->marque,
            'annee' => $request->annee,
            // 'images' => $request->images,
            'images' => collect($this->array_full)->implode(','),
            'couleur' => $request->couleur,
            'place' => $request->place,
            'prix' => $request->prix,
        ]);
        // $token = $user->createToken('Token')->accessToken;
        return response()->json(['voiture' => $voiture, 'message' => "Une voiture à été ajouter"], 201);
    }

    public function uploadOne($image)
    {
        if (!empty($image)) {
            $array_full = array();
            foreach ($image as $full){
                $images = $full;
                $imageName = uniqid().'.'.$images->getClientOriginalExtension();
                $images->storeAs('VoitureImage', $imageName, 'public');

                array_push($array_full, $imageName);

            }
            $this->array_full=$array_full;
            // return $this->array_full;


        }
    }
}
