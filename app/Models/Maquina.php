<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Maquina
 *
 * @property $id
 * @property $pais_id
 * @property $tipo_maquina_id
 * @property $modelo
 * @property $marca
 * @property $created_at
 * @property $updated_at
 *
 * @property Caracteristica[] $caracteristicas
 * @property Imagen[] $imagens
 * @property Pai $pai
 * @property TipoMaquina $tipoMaquina
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Maquina extends Model
{
    
    static $rules = [
		'pais_id' => 'required',
		'tipo_maquina_id' => 'required',
		'modelo' => 'required',
		'marca' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['pais_id','tipo_maquina_id','modelo','marca'];


    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function caracteristicas()
    {
        return $this->hasMany('App\Models\Caracteristica', 'maquina_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function imagens()
    {
        return $this->hasMany('App\Models\Imagen', 'maquina_id', 'id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function pais()
    {
        return $this->hasOne('App\Models\Pais', 'id', 'pais_id');
    }
    
    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function tipoMaquina()
    {
        return $this->hasOne('App\Models\TipoMaquina', 'id', 'tipo_maquina_id');
    }
    

}
