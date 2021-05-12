<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateProjetoRequest;
use App\Models\Projeto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;

class ProjetoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projetos = auth()->user()->projetos()->latest()->paginate(5);

        return Inertia::render('Projetos/Index', ['projetos' => $projetos]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return Inertia::render('Projetos/Create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreUpdateProjetoRequest $request)
    {
        $projeto = auth()->user()->projetos()->create($request->validated());

        return Redirect::route('projetos.index')->with('success', 'Projeto cadastrado com sucesso !');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Projeto $projeto)
    {
        return inertia()->render('Projetos/Show', ['projeto' => $projeto]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Projeto $projeto)
    {
        return inertia()->render('Projetos/Edit', compact('projeto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreUpdateProjetoRequest $request, Projeto $projeto)
    {
        $projeto->update($request->all());

        return Redirect::route('projetos.show', $projeto)->with('success', 'Projeto ' . $projeto->titulo . ' editado com sucesso !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
