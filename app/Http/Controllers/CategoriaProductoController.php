<?php

namespace App\Http\Controllers;

use App\Services\CategoriaProductoService;
use App\Http\Requests\CategoriaProducto\StoreCategoriaProductoRequest;
use App\Http\Requests\CategoriaProducto\UpdateCategoriaProductoRequest;

class CategoriaProductoController extends Controller
{
    public function __construct(private CategoriaProductoService $categoriaProductoServicio)
    {
    }

    public function index()
    {
        return response()->json([
            'success' => 'Se listaron Correctamente',
            'data' => $this->categoriaProductoServicio->list()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoriaProductoRequest $datos)
    {
        $registroInsertado = $this->categoriaProductoServicio->store($datos->validated());

        return response()->json([
            'success' => 'Se registró Correctamente',
            'data' => $registroInsertado
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoriaProductoRequest $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}