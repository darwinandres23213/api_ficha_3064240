<?php

namespace App\Http\Controllers;

use App\Services\InventarioService;
use App\Http\Requests\Inventario\StoreInventarioRequest;
use App\Http\Requests\Inventario\UpdateInventarioRequest;

class InventarioController extends Controller
{
    public function __construct(
        private InventarioService $inventarioService
    ) {}

    public function index()
    {
        return response()->json([
            'success' => 'Se listaron correctamente',
            'data' => $this->inventarioService->list()
        ]);
    }

    public function store(StoreInventarioRequest $datos)
    {
        $registroInsertado = $this->inventarioService->store(
            $datos->validated()
        );

        return response()->json([
            'success' => 'El inventario se creó correctamente',
            'datosInsertado' => $registroInsertado
        ]);
    }

    public function show(int $id)
    {
        $registro = $this->inventarioService->show($id);

        if (!$registro) {
            return response()->json([
                'success' => false,
                'message' => 'Inventario no encontrado'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $registro
        ]);
    }

    public function update(UpdateInventarioRequest $datosActualizar, int $id)
    {
        $registroActualizado = $this->inventarioService->update(
            $id,
            $datosActualizar->validated()
        );

        if (!$registroActualizado) {
            return response()->json([
                'success' => false,
                'message' => 'Inventario no encontrado'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Inventario actualizado correctamente',
            'data' => $registroActualizado
        ]);
    }

    public function destroy(int $id)
    {
        $registroEliminado = $this->inventarioService->destroy($id);

        if (!$registroEliminado) {
            return response()->json([
                'success' => false,
                'message' => 'Inventario no encontrado'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'Inventario eliminado correctamente'
        ]);
    }
}
