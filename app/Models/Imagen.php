<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Imagen extends Model
{
    protected $fillable = ['url', 'nombre', 'descripcion', 'maquina_id'];
    public function maquina()
    {
        return $this->belongsTo(Maquina::class);
    }
    use HasFactory;
}
