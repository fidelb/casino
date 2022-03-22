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
        return "soc el index de apiplayercontroller.";
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $player = new Player();
        return view('player.create', compact('player'));
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Player::$rules);

        $player = Player::create($request->all());

        //tornar json

    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $player = Player::find($id);

        return view('player.show', compact('player'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $player = Player::find($id);

        return view('player.edit', compact('player'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Player $player
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Player $player)
    {
        request()->validate(Player::$rules);

        $player->update($request->all());

        return redirect()->route('players.index')
            ->with('success', 'Player updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $player = Player::find($id)->delete();

        return redirect()->route('players.index')
            ->with('success', 'Player deleted successfully');
    }
}
