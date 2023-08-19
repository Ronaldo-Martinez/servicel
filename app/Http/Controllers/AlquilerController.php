<?php

namespace App\Http\Controllers;
use App\Models\TipoMaquina;
use App\Models\Maquina;
use App\Models\Pai;

use Illuminate\Http\Request;

class AlquilerController extends Controller
{
    public function alquilerSv(Request $request)
    {
        $pais=Pai::where('nombre', 'El Salvador')->first();
        $titulo="Alquiler de maquinaria en ".$pais->nombre;
        $tiposMaquinaria = TipoMaquina::whereHas('maquinas.pais', function ($query)  use ($pais) {
            $query->where('pais_id', $pais->id);
        })->get();
        $maquinas=Maquina::where('pais_id', $pais->id)->paginate(6);
        return view('pages.alquiler', compact('titulo', 'tiposMaquinaria', 'maquinas'));
    }

    public function alquilerSVCategoria(Request $request, $id){
        $pais=Pai::where('nombre', 'El Salvador')->first();
        $tiposMaquinaria=TipoMaquina::find($id);  
        $titulo="Alquiler de ".$tiposMaquinaria->nombre." en ".$pais->nombre;
        $maquinas=Maquina::where('pais_id', $pais->id)->where('tipo_maquina_id', $tiposMaquinaria->id)->paginate(6);
        $tiposMaquinaria = TipoMaquina::whereHas('maquinas.pais', function ($query)  use ($pais) {
            $query->where('pais_id', $pais->id);
        })->get();
        return view('pages.alquiler', compact('titulo', 'tiposMaquinaria', 'maquinas'));
    }

}
