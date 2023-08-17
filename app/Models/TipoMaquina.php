<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TipoMaquina
 *
 * @property $id
 * @property $nombre
 * @property $descripcion
 * @property $created_at
 * @property $updated_at
 *
 * @property Maquina[] $maquinas
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class TipoMaquina extends Model
{
    
    static $rules = [
		'nombre' => 'required',
		'descripcion' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre','descripcion'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function maquinas()
    {
        return $this->hasMany('App\Models\Maquina', 'tipo_maquina_id', 'id');
    }
    

}
