<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ReservaService; 
use App\Http\Requests\Reserva\StoreReservaRequest; 
use App\Http\Requests\Reserva\UpdateReservaRequest;
class ReservaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(private ReservaService $reservaService)
    {}

    public function index()
    {
        //de tarer todos los resgistros de la tabla reservas
        return response()->json([
            'success' => ' se ha realizado correctamente',
            'data' => $this->reservaService->list()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReservaRequest $datos)
    {
        $registroInsertado = $this->reservaService->store($datos->validated());
        return response()->json([
            'success' => 'Reserva creada correctamente',
            'datosInsertados' => $registroInsertado
        ], 201);
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
    public function update(UpdateReservaRequest $datosActualizado, int $id)
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
