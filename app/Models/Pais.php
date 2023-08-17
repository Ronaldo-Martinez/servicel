<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pai
 *
 * @property $id
 * @property $nombre
 * @property $created_at
 * @property $updated_at
 *
 * @property Maquina[] $maquinas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Pais extends Model
{
    
    static $rules = [
		'nombre' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function maquinas()
    {
        return $this->hasMany('App\Models\Maquina', 'pais_id', 'id');
    }
    

}
