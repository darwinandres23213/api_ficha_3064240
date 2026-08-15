<?php

namespace App\Http\Controllers;

use App\Services\UsuarioService;
use App\HTTP\Requests\Usuario\StoreUsuarioRequest;
use App\HTTP\Requests\Usuario\UpdateUsuarioRequest;

class UsuarioController extends Controller
{
    public function __construct(private UsuarioService $usuarioServicio)
    {}

    public function index()
    {
        return response()->json([
            'success' => 'Se listaron correctamente',
            'data' => $this->usuarioServicio->list()
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUsuarioRequest $datos)
    {
        $registroInsertado = $this->usuarioServicio->store(
            $datos->validated()
        );

        return response()->json([
            'success' => 'El usuario se creó correctamente',
            'datosInsertados' => $registroInsertado
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $usuario = $this->usuarioServicio->show($id);

        if (!$usuario) {
            return response()->json([
                'success' => false,
                'message' => 'El usuario no existe.'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $usuario
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUsuarioRequest $datosActualizar, int $id)
    {
        $registroActualizado = $this->usuarioServicio->update(
            $id,
            $datosActualizar->validated()
        );

        if (!$registroActualizado) {
            return response()->json([
                'success' => false,
                'message' => 'El usuario no existe.'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'El usuario se actualizó correctamente.',
            'data' => $registroActualizado
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $usuarioEliminado = $this->usuarioServicio->destroy($id);

        if (!$usuarioEliminado) {
            return response()->json([
                'success' => false,
                'message' => 'El usuario no existe.'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'message' => 'El usuario se eliminó correctamente.'
        ], 200);
    }
}