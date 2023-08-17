<?php

namespace App\Http\Controllers;

use App\Models\Pais;
use Illuminate\Http\Request;

/**
 * Class PaiController
 * @package App\Http\Controllers
 */
class PaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pais = Pais::paginate();

        return view('pai.index', compact('pais'))
            ->with('i', (request()->input('page', 1) - 1) * $pais->perPage());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pai = new Pais();
        return view('pai.create', compact('pai'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate(Pais::$rules);

        $pai = Pais::create($request->all());

        return redirect()->route('pais.index')
            ->with('success', 'Pai created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pai = Pais::find($id);

        return view('pai.show', compact('pai'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pai = Pais::find($id);

        return view('pai.edit', compact('pai'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  Pai $pai
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pai $pai)
    {
        request()->validate(Pais::$rules);

        $pai->update($request->all());

        return redirect()->route('pais.index')
            ->with('success', 'Pai updated successfully');
    }

    /**
     * @param int $id
     * @return \Illuminate\Http\RedirectResponse
     * @throws \Exception
     */
    public function destroy($id)
    {
        $pai = Pais::find($id)->delete();

        return redirect()->route('pais.index')
            ->with('success', 'Pai deleted successfully');
    }
}
