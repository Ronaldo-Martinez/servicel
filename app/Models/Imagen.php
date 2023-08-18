<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Imagen
 *
 * @property $id
 * @property $url
 * @property $nombre
 * @property $descripcion
 * @property $maquina_id
 * @property $created_at
 * @property $updated_at
 *
 * @property Maquina $maquina
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Imagen extends Model
{
    
    static $rules = [
		'url' => 'required',
		'nombre' => 'required',
		'descripcion' => 'required',
		'maquina_id' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['url','nombre','descripcion','maquina_id'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function maquina()
    {
        return $this->hasOne('App\Models\Maquina', 'id', 'maquina_id');
    }
    

}
