<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Caracteristica
 *
 * @property $id
 * @property $caracteristica
 * @property $valor
 * @property $maquina_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Maquina $maquina
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Caracteristica extends Model
{
    
    static $rules = [
		'caracteristica' => 'required',
		'valor' => 'required',
		'maquina_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['caracteristica','valor','maquina_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function maquina()
    {
        return $this->hasOne('App\Models\Maquina', 'id', 'maquina_id');
    }
    

}
