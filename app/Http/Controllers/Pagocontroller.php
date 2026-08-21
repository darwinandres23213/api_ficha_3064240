<?php

namespace App\Http\Controllers;

use App\Services\PagoService;
use App\Http\Requests\PagoRequest;

class PagoController extends Controller
{
    public function __construct(private PagoService $pagoService)
    {
    }

 
    public function index()
    {
        return response()->json([
            'success' => 'se listaron correctamente',
            'data' => $this->pagoService->list()
        ]);
    }


    public function store(PagoRequest $datos)
    {
        $registroInsertado = $this->pagoService->store(
            $datos->validated()
        );

        return response()->json([
            'success' => 'el pago se creó correctamente',
            'data' => $registroInsertado
        ]);
    }

   
    public function show(int $id)
    {
        return response()->json([
            'success' => 'se encontró el pago',
            'data' => $this->pagoService->show($id)
        ]);
    }

    public function update(PagoRequest $datosActualizar, int $id)
    {
        $registroActualizado = $this->pagoService->update(
            $id,
            $datosActualizar->validated()
        );

        return response()->json([
            'success' => 'el pago se actualizó correctamente',
            'data' => $registroActualizado
        ]);
    }

    public function destroy(int $id)
    {
        $this->pagoService->destroy($id);

        return response()->json([
            'success' => 'el pago se eliminó correctamente'
        ]);
    }
}