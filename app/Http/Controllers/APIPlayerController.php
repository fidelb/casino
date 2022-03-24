<?php

namespace App\Http\Controllers;

use App\Models\Player;
use Illuminate\Http\Request;

/**
 * Class PlayerController
 * @package App\Http\Controllers
 */
class APIPlayerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* retorna el llistat de tots els jugadors del sistema amb el seu percentatge mig d’èxits */
        $players = Player::all('nickname', 'porcentatgeVictories');
        return response()->json(compact('players'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //request()->validate(Player::$rules);
        $player = Player::create($request->all());
        return response()->json(compact('player'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Player $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //request()->validate(Player::$rules);
        $player = Player::find($id);
        $player->nickname = $request->nickname;
        $player->save();
        return response()->json(compact('player'));
    }

    public function ranking()
    {
        /* retorna el ranking mig de tots els jugadors del sistema. 
            És a dir, el percentatge mig d’èxits. */
        return Player::avg('porcentatgeVictories');
    }

    public function rankingLoser()    {
        /* retorna el jugador amb pitjor percentatge d’èxit */
        $player =  Player::whereNotNull('porcentatgeVictories')->min('porcentatgeVictories');
        return response()->json(compact('player'));
    }

    public function rankingWinner()
    {
        /* retorna el jugador amb millor percentatge d’èxit */
        $player =  Player::max('porcentatgeVictories');
        return response()->json(compact('player'));
    }

    
    
}
