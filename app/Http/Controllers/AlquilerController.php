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
        $tiposMaquinaria = TipoMaquina::whereHas('maquinas', function ($query)  use ($pais) {
            $query->where('pais_id', $pais->id)->where('status', true);
        })->get();
        $maquinas=Maquina::where('pais_id', $pais->id)->where('status', true)->paginate(6);
        return view('pages.alquiler', compact('titulo', 'pais', 'tiposMaquinaria', 'maquinas'));
    }

    public function alquilerSVCategoria(Request $request, $id){
        $pais=Pai::where('nombre', 'El Salvador')->first();
        $tiposMaquinaria=TipoMaquina::find($id);  
        $titulo="Alquiler de ".$tiposMaquinaria->nombre." en ".$pais->nombre;
        $maquinas=Maquina::where('pais_id', $pais->id)->where('tipo_maquina_id', $tiposMaquinaria->id)->where('status', true)->paginate(6);
        $tiposMaquinaria = TipoMaquina::whereHas('maquinas', function ($query)  use ($pais) {
            $query->where('pais_id', $pais->id)->where('status', true);
        })->get();
        return view('pages.alquiler', compact('titulo', 'pais', 'tiposMaquinaria', 'maquinas'));
    }

    public function alquilerGt(Request $request)
    {
        $pais=Pai::where('nombre', 'Guatemala')->first();
        $titulo="Alquiler de maquinaria en ".$pais->nombre;
        $tiposMaquinaria = TipoMaquina::whereHas('maquinas', function ($query)  use ($pais) {
            $query->where('pais_id', $pais->id)->where('status', true);
        })->get();
        $maquinas=Maquina::where('pais_id', $pais->id)->where('status', true)->paginate(6);
        return view('pages.alquiler', compact('titulo', 'pais', 'tiposMaquinaria', 'maquinas'));
    }

    public function alquilerGtCategoria(Request $request, $id){
        $pais=Pai::where('nombre', 'Guatemala')->first();
        $tiposMaquinaria=TipoMaquina::find($id);  
        $titulo="Alquiler de ".$tiposMaquinaria->nombre." en ".$pais->nombre;
        $maquinas=Maquina::where('pais_id', $pais->id)->where('tipo_maquina_id', $tiposMaquinaria->id)->where('status', true)->paginate(6);
        $tiposMaquinaria = TipoMaquina::whereHas('maquinas', function ($query)  use ($pais) {
            $query->where('pais_id', $pais->id)->where('status', true);
        })->get();
        return view('pages.alquiler', compact('titulo', 'pais', 'tiposMaquinaria', 'maquinas'));
    }

    public function maquina($id){
        $maquina=Maquina::find($id);
        return view('pages.maquina', compact('maquina'));
    }
}
