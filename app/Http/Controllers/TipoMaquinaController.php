<?php

namespace App\Http\Controllers;

use App\Models\TipoMaquina;
use Illuminate\Http\Request;

/**
 * Class TipoMaquinaController
 * @package App\Http\Controllers
 */
class TipoMaquinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tipoMaquinas = TipoMaquina::paginate();

        return view('tipo-maquina.index', compact('tipoMaquinas'))
            ->with('i', (request()->input('page', 1) - 1) * $tipoMaquinas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipoMaquina = new TipoMaquina();
        return view('tipo-maquina.create', compact('tipoMaquina'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(TipoMaquina::$rules);

        $tipoMaquina = TipoMaquina::create($request->all());

        return redirect()->route('tipo-maquinas.index')
            ->with('success', 'TipoMaquina created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipoMaquina = TipoMaquina::find($id);

        return view('tipo-maquina.show', compact('tipoMaquina'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tipoMaquina = TipoMaquina::find($id);

        return view('tipo-maquina.edit', compact('tipoMaquina'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  TipoMaquina $tipoMaquina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoMaquina $tipoMaquina)
    {
        request()->validate(TipoMaquina::$rules);

        $tipoMaquina->update($request->all());

        return redirect()->route('tipo-maquinas.index')
            ->with('success', 'TipoMaquina updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $tipoMaquina = TipoMaquina::find($id)->delete();

        return redirect()->route('tipo-maquinas.index')
            ->with('success', 'TipoMaquina deleted successfully');
    }
}
