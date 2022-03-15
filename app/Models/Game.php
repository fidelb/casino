<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Game
 *
 * @property $id
 * @property $data
 * @property $player_id
 * @property $dau1
 * @property $dau2
 * @property $guanyada
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Game extends Model
{
    
    static $rules = [
		'data' => 'required',
		'player_id' => 'required',
		'dau1' => 'required',
		'dau2' => 'required',
		'guanyada' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['data','player_id','dau1','dau2','guanyada'];



}
