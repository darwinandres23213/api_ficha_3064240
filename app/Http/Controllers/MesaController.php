<?php

namespace App\Http\Controllers;

use App\Services\MesaService;
use App\Http\Requests\Mesa\StoreMesaRequest;
use App\Http\Requests\Mesa\UpdateMesaRequest;

class MesaController extends Controller
{
    public function __construct(private MesaService $mesaServicio)
    {
    }

    public function index()
    {
        return response()->json([
            "success" => "Se listaron correctamente",
            "data" => $this->mesaServicio->list()
        ]);
    }

    public function store(StoreMesaRequest $datos)
    {
        $registroInsertado = $this->mesaServicio->store(
            $datos->validated()
        );

        return response()->json([
            "success" => "La mesa se creó correctamente",
            "datosInsertado" => $registroInsertado
        ]);
    }

    public function show(string $id)
    {
        return response()->json([
            "data" => $this->mesaServicio->show((int) $id)
        ]);
    }

    public function update(UpdateMesaRequest $datoActualizar, string $id)
    {
        $mesa = $this->mesaServicio->update(
            (int) $id,
            $datoActualizar->validated()
        );

        return response()->json([
            "success" => "La mesa se actualizó correctamente",
            "data" => $mesa
        ]);
    }

    public function destroy(string $id)
    {
        $mesa = $this->mesaServicio->destroy((int) $id);

        return response()->json([
            "success" => "La mesa se eliminó correctamente",
            "data" => $mesa
        ]);
    }
}