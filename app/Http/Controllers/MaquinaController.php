<?php

namespace App\Http\Controllers;

use App\Models\Maquina;
use App\Models\Pais;
use App\Models\TipoMaquina;
use Illuminate\Http\Request;

/**
 * Class MaquinaController
 * @package App\Http\Controllers
 */
class MaquinaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maquinas = Maquina::paginate();

        return view('maquina.index', compact('maquinas'))
            ->with('i', (request()->input('page', 1) - 1) * $maquinas->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $maquina = new Maquina();
        $opcionesDePaises = Pais::pluck('nombre', 'id');
        $opcionesDeTiposMaquinaria = TipoMaquina::pluck('nombre', 'id');
        return view('maquina.create', compact('maquina', 'opcionesDePaises', 'opcionesDeTiposMaquinaria'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Maquina::$rules);

        $data = $request->all();
        $data['status'] = $request->has('status');

        $maquina = Maquina::create($data);

        return redirect()->route('maquinas.index')
            ->with('success', 'Maquina created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $maquina = Maquina::find($id);

        return view('maquina.show', compact('maquina'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $maquina = Maquina::find($id);
        $opcionesDePaises = Pais::pluck('nombre', 'id');
        $opcionesDeTiposMaquinaria = TipoMaquina::pluck('nombre', 'id');
        return view('maquina.edit', compact('maquina','opcionesDePaises','opcionesDeTiposMaquinaria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Maquina $maquina
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Maquina $maquina)
    {
        request()->validate(Maquina::$rules);

        $data = $request->all();
        $data['status'] = $request->has('status');

        $maquina->update($data);

        return redirect()->route('maquinas.index')
            ->with('success', 'Maquina updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $maquina = Maquina::find($id)->delete();

        return redirect()->route('maquinas.index')
            ->with('success', 'Maquina deleted successfully');
    }

    /**
     * Toggle the status of the machine.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function toggleStatus($id)
    {
        $maquina = Maquina::findOrFail($id);
        $maquina->status = !$maquina->status;
        $maquina->save();

        return redirect()->back()
            ->with('success', 'Estado de la máquina actualizado correctamente.');
    }

    /**
     * Clone the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function clone($id)
    {
        $original = Maquina::findOrFail($id);
        
        // Replicamos la máquina
        $clone = $original->replicate();
        $clone->modelo = $clone->modelo . ' (Copia)';
        $clone->status = false; // Desactivada por defecto
        $clone->save();
        
        // Clonamos las características
        foreach ($original->caracteristicas as $caracteristica) {
            $cloneCaracteristica = $caracteristica->replicate();
            $cloneCaracteristica->maquina_id = $clone->id;
            $cloneCaracteristica->save();
        }

        // Clonamos las imágenes
        foreach ($original->imagens as $imagen) {
            $cloneImagen = $imagen->replicate();
            $cloneImagen->maquina_id = $clone->id;
            $cloneImagen->save();
        }

        return redirect()->route('maquinas.edit', $clone->id)
            ->with('success', 'Máquina clonada con éxito. Puedes editar sus datos ahora.');
    }
}
