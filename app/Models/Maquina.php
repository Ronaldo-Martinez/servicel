<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maquina extends Model
{
    protected $fillable = ['pais_id', 'tipo_maquinaria_id', 'modelo', 'marca'];
    
    public function pais()
    {
        return $this->belongsTo(Pais::class);
    }
    
    public function tipoMaquinaria()
    {
        return $this->belongsTo(TipoMaquinaria::class);
    }
    
    public function imagenes()
    {
        return $this->hasMany(Imagen::class);
    }
    
    public function caracteristicas()
    {
        return $this->hasMany(Caracteristica::class);
    }
    use HasFactory;
}
