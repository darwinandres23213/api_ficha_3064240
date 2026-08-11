<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\InventarioService;
use App\Http\Requests\Inventario\StoreInventarioRequest;
use App\Http\Requests\Inventario\UpdateInventarioRequest;


class InventarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct(private InventarioService $invetarioService)
    {}

    public function index()
    {
        return response()->json([
            'success' => 'Se listaron Correctamente',
            'data' => $this->invetarioService->list()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreIventarioRequest $datos)
    {
        $registroInsertado = $this->invetarioService->store($datos->validated());
    
        return response()->json([
            'success'=> 'El Inventario se creo correctamente',
            'datosInsertado' => $registroInsertado
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
    public function update(UpdateInventarioRequest $datosActualizar, int $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        //
    }
}
