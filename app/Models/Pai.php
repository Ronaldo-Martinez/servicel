<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Pai
 *
 * @property $id
 * @property $nombre
 * @property $codigo_pais
 * @property $numero_telefono
 * @property $created_at
 * @property $updated_at
 *
 * @property Maquina[] $maquinas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Pai extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'codigo_pais' => 'required',
		'numero_telefono' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','codigo_pais','numero_telefono'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function maquinas()
    {
        return $this->hasMany('App\Models\Maquina', 'pais_id', 'id');
    }
    

}
