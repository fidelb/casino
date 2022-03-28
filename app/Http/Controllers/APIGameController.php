<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Player;
use Illuminate\Http\Request;

/**
 * Class GameController
 * @package App\Http\Controllers
 */
class APIGameController extends Controller
{    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        // un jugador específic realitza una tirada dels daus
        // crear tirada i desar a base de dades
        $game = new Game();
        $game->player_id = $request->id; // {id}
        $game->dau1 = rand(1, 6);
        $game->dau2 = rand(1, 6);
        if ($game->dau1+$game->dau2 == 7) {
            $game->guanyada = true;
        } else {
            $game->guanyada = false;
        }    
        $game->save();

        // actualitzar les estadistiques del jugador
        $jugadorActual = Player::find($request->id);
        if ($game->guanyada) {
            $jugadorActual->afegeixPartidaGuanyada();            
        } else {
            $jugadorActual->afegeixPartidaJugada();
        }
        $jugadorActual->save();

        return response()->json(compact('game'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        // retorna el llistat de jugades per un jugador.        
        $games = Game::where('player_id', '=', $request->id)->get();
        $percentatgeExit = Player::percentatgeVictoriesJugador($request->id);
        return response()->json(compact('percentatgeExit', 'games'));
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy(Request $request)
    {
        // elimina les tirades del jugador        
        $games = Game::where('player_id', '=', $request->id)->delete();
        
        // posar a 0 les partides en jugador        
        $jugadorActual = Player::find($request->id);
        $jugadorActual->partidesJugades = null;
        $jugadorActual->partidesGuanyades = null;
        $jugadorActual->porcentatgeVictories = null;
        $jugadorActual->save();

    }
}
