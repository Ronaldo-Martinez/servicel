<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use Illuminate\Http\Request;

/**
 * Class ImagenController
 * @package App\Http\Controllers
 */
class ImagenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $imagens = Imagen::paginate();

        return view('imagen.index', compact('imagens'))
            ->with('i', (request()->input('page', 1) - 1) * $imagens->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $imagen = new Imagen();
        return view('imagen.create', compact('imagen'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validación de campos si es necesario
        $this->validate($request, [
            'imagen' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'nombre' => 'required',
            'descripcion' => 'required',
            'maquina_id' => 'required'
        ]);

        // Guardar la imagen
        $imagen = new Imagen;
        $imagen->nombre = $request->nombre;
        $imagen->descripcion = $request->descripcion;
        $imagen->maquina_id = $request->maquina_id;

        if ($request->hasFile('imagen')) {
            $imagePath = $request->file('imagen')->store('imagenes', 'public');
            $imagen->url = $imagePath;
        }

        $imagen->save();

        return response()->json(['message' => 'Imagen subida exitosamente'], 200);
    }

    public function maquina($id)
    {
        $caracteristicas = Imagen::where('maquina_id', $id)->get();

        return response()->json($caracteristicas);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $imagen = Imagen::find($id);

        return view('imagen.show', compact('imagen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $imagen = Imagen::find($id);

        return view('imagen.edit', compact('imagen'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Imagen $imagen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Imagen $imagen)
    {
        request()->validate(Imagen::$rules);

        $imagen->update($request->all());

        return redirect()->route('imagens.index')
            ->with('success', 'Imagen updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $imagen = Imagen::find($id)->delete();

        return response()->json('Ok', 201);
    }
}