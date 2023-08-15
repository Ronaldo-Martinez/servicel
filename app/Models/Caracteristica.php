<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Caracteristica extends Model
{
    protected $fillable = ['caracteristica', 'valor', 'maquina_id'];
    public function maquina()
    {
        return $this->belongsTo(Maquina::class);
    }
    use HasFactory;
}
