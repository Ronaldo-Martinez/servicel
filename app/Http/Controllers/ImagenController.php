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
        $request->validate([
            'maquina_id' => 'required|exists:maquinas,id',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:5120',
            'imagenes.*' => 'nullable|image|mimes:jpeg,png,jpg,webp,gif|max:5120',
            'nombre' => 'nullable|string|max:255',
            'descripcion' => 'nullable|string|max:500'
        ]);

        $maquinaId = $request->input('maquina_id');
        $maquina = \App\Models\Maquina::find($maquinaId);
        $baseName = $request->input('nombre') ?: ($maquina ? $maquina->modelo : 'Foto');
        $descripcion = $request->input('descripcion') ?: '';

        // Determinar el último número de orden
        $ultimoOrden = Imagen::where('maquina_id', $maquinaId)->max('orden') ?? -1;

        $archivos = [];
        if ($request->hasFile('imagenes')) {
            $archivos = $request->file('imagenes');
        } elseif ($request->hasFile('imagen')) {
            $archivos = [$request->file('imagen')];
        }

        if (empty($archivos)) {
            return response()->json(['error' => 'No se seleccionó ninguna imagen.'], 422);
        }

        $guardadas = [];
        foreach ($archivos as $index => $archivo) {
            $imagePath = $archivo->store('imagenes', 'public');
            $ultimoOrden++;

            $nombre = count($archivos) > 1 
                ? pathinfo($archivo->getClientOriginalName(), PATHINFO_FILENAME) 
                : $baseName;

            $imagen = Imagen::create([
                'url' => $imagePath,
                'nombre' => $nombre,
                'descripcion' => $descripcion,
                'maquina_id' => $maquinaId,
                'orden' => $ultimoOrden
            ]);

            $guardadas[] = $imagen;
        }

        return response()->json([
            'message' => count($guardadas) > 1 ? 'Imágenes subidas exitosamente' : 'Imagen subida exitosamente',
            'imagenes' => $guardadas
        ], 200);
    }

    /**
     * Get all images for a specific machine ordered by orden asc.
     */
    public function maquina($id)
    {
        $imagenes = Imagen::where('maquina_id', $id)
            ->orderBy('orden', 'asc')
            ->orderBy('id', 'asc')
            ->get();

        return response()->json($imagenes);
    }

    /**
     * Set an image as primary (first photo / portada).
     */
    public function makePrimary($id)
    {
        $imagen = Imagen::findOrFail($id);
        $maquinaId = $imagen->maquina_id;

        // Todas las imágenes de la máquina ordenadas
        $imagenes = Imagen::where('maquina_id', $maquinaId)
            ->orderBy('orden', 'asc')
            ->orderBy('id', 'asc')
            ->get();

        // Asignar orden 0 a la seleccionada, y 1, 2, 3... a las demás
        $orden = 1;
        foreach ($imagenes as $img) {
            if ($img->id == $imagen->id) {
                $img->orden = 0;
            } else {
                $img->orden = $orden++;
            }
            $img->save();
        }

        return response()->json([
            'message' => 'Foto establecida como principal exitosamente.',
            'primary_id' => $imagen->id
        ], 200);
    }

    /**
     * Reorder images according to an array of IDs.
     */
    public function reorder(Request $request)
    {
        $ids = $request->input('ids', []);
        if (is_array($ids)) {
            foreach ($ids as $orden => $id) {
                Imagen::where('id', $id)->update(['orden' => $orden]);
            }
        }

        return response()->json(['message' => 'Orden de fotos actualizado con éxito.'], 200);
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
     * @return \Illuminate\Http\JsonResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $imagen = Imagen::findOrFail($id);

        // Verificar si la imagen está compartida con otra máquina antes de borrar el archivo
        $isShared = Imagen::where('url', $imagen->url)->where('id', '!=', $imagen->id)->exists();
        if (!$isShared && $imagen->url && \Illuminate\Support\Facades\Storage::disk('public')->exists($imagen->url)) {
            \Illuminate\Support\Facades\Storage::disk('public')->delete($imagen->url);
        }

        $imagen->delete();

        return response()->json(['message' => 'Imagen eliminada exitosamente.'], 200);
    }
}
