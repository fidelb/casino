<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Player
 *
 * @property $id
 * @property $nickname
 * @property $email
 * @property $data_registre
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Player extends Model
{
    
    static $rules = [
		'nickname' => 'required',
		'email' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nickname','email','data_registre'];

    public function games()
    {
        return $this->hasMany('App\Models\Game', 'player_id', 'id');
    }

    public function updateVictories() {
        $this->porcentatgeVictories=$this->partidesGuanyades*100/$this->partidesJugades;
    }

    public function afegeixPartidaJugada() {
        $this->partidesJugades++;
        $this->updateVictories();
        
    }

    public function afegeixPartidaGuanyada() {
        $this->partidesJugades++;
        $this->partidesGuanyades++;
        $this->updateVictories();      
    }

}
