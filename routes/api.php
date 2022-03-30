<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\APIPlayerController;
use App\Http\Controllers\APIGameController;

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

/*
Route::get('/user', function (Request $request) {
    return $request->user();
});
*/

/*
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
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

/* POST /players : crea un jugador */
Route::post('/players', [APIPlayerController::class, 'store'])->middleware('auth:api');
/* PUT /players/{id} : modifica el nom del jugador */
Route::put('/players/{id}', [APIPlayerController::class, 'update'])->middleware('auth:api');

/* POST /players/{id}/games/ : un jugador específic realitza una tirada dels daus. */
Route::post('/players/{id}/games', [APIGameController::class, 'store'])->middleware('auth:api');
/* DELETE /players/{id}/games: elimina les tirades del jugador */
Route::delete('/players/{id}/games', [APIGameController::class, 'destroy'])->middleware('auth:api');

/* GET /players: retorna el llistat de tots els jugadors del sistema amb el seu percentatge mig d’èxits */
Route::get('/players', [APIPlayerController::class, 'index'])->middleware('auth:api');
/* GET /players/{id}/games: retorna el llistat de jugades per un jugador. */
Route::get('/players/{id}/games', [APIGameController::class, 'show'])->middleware('auth:api');

/* GET /players/ranking: retorna el ranking mig de tots els jugadors del sistema. 
    És a dir, el percentatge mig d’èxits. */
Route::get('/players/ranking', [APIPlayerController::class, 'ranking'])->middleware('auth:api');
/* GET /players/ranking/loser: retorna el jugador amb pitjor percentatge d’èxit */
Route::get('/players/ranking/loser', [APIPlayerController::class, 'rankingLoser'])->middleware('auth:api');
/* GET /players/ranking/winner: retorna el jugador amb millor percentatge d’èxit. */
Route::get('/players/ranking/winner', [APIPlayerController::class, 'rankingWinner']);
