<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

/*
POST /players : crea un jugador
PUT /players/{id} : modifica el nom del jugador
POST /players/{id}/games/ : un jugador específic realitza una tirada dels daus.
DELETE /players/{id}/games: elimina les tirades del jugador
GET /players: retorna el llistat de tots els jugadors del sistema amb el seu percentatge mig d’èxits 
GET /players/{id}/games: retorna el llistat de jugades per un jugador.
GET /players/ranking: retorna el ranking mig de tots els jugadors del sistema. 
    És a dir, el percentatge mig d’èxits.
GET /players/ranking/loser: retorna el jugador amb pitjor percentatge d’èxit
GET /players/ranking/winner: retorna el jugador amb pitjor percentatge d’èxit.
*/

Route::post('/players', [APIPlayerController::class, 'store']);
Route::put('/players/{id}', [APIPlayerController::class, 'update']);

Route::post('/players/{id}/games', [APIGameController::class, 'store']);
Route::delete('/players/{id}/games', [APIGameController::class, 'delete']);

Route::get('/players', [APIPlayerController::class, 'index']);
Route::get('/players/{id}/games', [APIGameController::class, 'show']);

Route::get('/players/ranking', [APIGameController::class, 'ranking']);
Route::get('/players/ranking/loser', [APIGameController::class, 'ranking_loser']);
Route::get('/players/ranking/winner', [APIGameController::class, 'ranking_winner']);


