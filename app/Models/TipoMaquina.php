<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoMaquina extends Model
{
    protected $fillable = ['nombre', 'descripcion'];
    public function maquinas()
    {
        return $this->hasMany(Maquina::class);
    }
    use HasFactory;
}
