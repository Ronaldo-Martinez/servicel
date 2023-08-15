<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pais extends Model
{
    protected $fillable = ['nombre'];

    public function maquinas()
    {
        return $this->hasMany(Maquina::class);
    }

    use HasFactory;
}
