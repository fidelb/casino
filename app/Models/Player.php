<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Player
 *
 * @property $id
 * @property $nickname
 * @property $email
 * @property $data_regostre
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
		'data_regostre' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nickname','email','data_regostre'];



}
