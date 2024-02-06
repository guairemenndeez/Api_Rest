<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Http\Requests\StoreCategoriaRequest;
use App\Http\Requests\UpdateCategoriaRequest;
use App\Http\Resources\CategoriaCollection;
use App\Http\Resources\CategoriaResource;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $Categorias= Categoria::paginate(10);
       return new CategoriaCollection($Categorias);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoriaRequest $request)
    {
        return new CategoriaResource(Categoria::create($request->all()));

    }

    /**
     * Display the specified resource.
     */
    public function show(Categoria $categoria)
    {
        return new CategoriaResource($categoria);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categoria $categoria)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoriaRequest $request, Categoria $categoria)
    {
        $categoria->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Categoria $categoria)
    {
        $categoria->delete();
    }
}
