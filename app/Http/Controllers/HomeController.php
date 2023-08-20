<?php

namespace App\Http\Controllers;
use App\Models\Maquina;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $conteoMaquinasElSalvador = Maquina::with('tipoMaquina', 'pais')
        ->whereHas('pais', function ($query) {
            $query->where('nombre', 'El Salvador');
        })
        ->selectRaw('COUNT(*) as total, tipo_maquina_id, pais_id')
        ->groupBy('tipo_maquina_id', 'pais_id')
        ->get();
        
        $conteoMaquinasGuatemala = Maquina::with('tipoMaquina', 'pais')
        ->whereHas('pais', function ($query) {
            $query->where('nombre', 'Guatemala');
        })
        ->selectRaw('COUNT(*) as total, tipo_maquina_id, pais_id')
        ->groupBy('tipo_maquina_id', 'pais_id')
        ->get();

        return view('home', compact('conteoMaquinasElSalvador','conteoMaquinasGuatemala'));
    }
}
