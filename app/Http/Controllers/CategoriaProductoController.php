<?php

namespace App\Http\Controllers;

use App\Services\CategoriaProductoService;
use App\Http\Requests\CategoriaProducto\StoreCategoriaProductoRequest;
use App\Http\Requests\CategoriaProducto\UpdateCategoriaProductoRequest;

class CategoriaProductoController extends Controller
{
    public function __construct(private CategoriaProductoService $categoriaProductoService)
    {
    }

    public function index()
    {
        return response()->json([
            'success' => true,
            'data' => $this->categoriaProductoService->list()
        ]);
    }

    public function store(StoreCategoriaProductoRequest $datos)
    {
        $registroInsertado = $this->categoriaProductoService->store($datos->validated());

        return response()->json([
            'success' => true,
            'message' => 'La categoría se creó correctamente',
            'data' => $registroInsertado
        ]);
    }

    public function show(int $id)
    {
        return response()->json([
            'success' => true,
            'data' => $this->categoriaProductoService->show($id)
        ]);
    }

    public function update(UpdateCategoriaProductoRequest $datosActualizar, int $id)
    {
        $registroActualizado = $this->categoriaProductoService->update($id, $datosActualizar->validated());

        return response()->json([
            'success' => true,
            'message' => 'La categoría se actualizó correctamente',
            'data' => $registroActualizado
        ]);
    }

    public function destroy(int $id)
    {
        $this->categoriaProductoService->destroy($id);

        return response()->json([
            'success' => true,
            'message' => 'La categoría se eliminó correctamente'
        ]);
    }
}