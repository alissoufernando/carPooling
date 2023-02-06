<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\Auth\LoginController;
use App\Http\Controllers\API\Auth\ResgisterController;
use App\Http\Controllers\API\Dashboard\User\AddUserController;
use App\Http\Controllers\API\Dashboard\User\DeleteUserController;
use App\Http\Controllers\API\Dashboard\User\EditUserController;
use App\Http\Controllers\API\Dashboard\User\listeUserController;
use App\Http\Controllers\API\Dashboard\Voitures\AddVoitureController;
use App\Http\Controllers\API\Dashboard\Voitures\AfficherVoitureController;
use App\Http\Controllers\API\Dashboard\Voitures\DeleteVoitureController;
use App\Http\Controllers\API\Dashboard\Voitures\EditVoitureController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
// les routes d' auth
Route::post('inscription',[ResgisterController::class,'register']);
Route::post('connexion',[LoginController::class,'login']);
// les routes utilisateurs
Route::get('utilisateurs',[listeUserController::class,'listeUsers']);
Route::get('utilisateur/{id}',[listeUserController::class,'user']);
Route::post('utilisateur',[AddUserController::class,'addUsers']);
Route::put('utilisateur/{id}',[EditUserController::class,'editUsers']);
Route::delete('utilisateur/{id}',[DeleteUserController::class,'deleteUsers']);
// Les routes de Voiture
Route::get('voitures',[AfficherVoitureController::class,'listeVoitures']);
Route::get('voiture/{id}',[AfficherVoitureController::class,'voiture']);
Route::post('voiture',[AddVoitureController::class,'addVoitures']);
Route::put('voiture/{id}',[EditVoitureController::class,'editVoitures']);
Route::delete('voiture/{id}',[DeleteVoitureController::class,'deleteVoitures']);

Route::middleware('auth:api')->group(function(){
    Route::get('dashboard',[DashboardController::class,'dashboard'])->name('dashboard');
});

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
