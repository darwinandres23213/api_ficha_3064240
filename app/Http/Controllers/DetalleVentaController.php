<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\DetalleVentaService;
use App\Http\Requests\StoreDetalleVentaRequest;
use App\Http\Requests\UpdateDetalleVentaRequest;

class DetalleVentaController extends Controller
{
    public function __construct(private DetalleVentaService $detalleVentaService) 
    {}
    public function index() //trae todos los registros de la tabla
    {
        return response()->json([
            "success" => "se listaron correctamente",
            "data" => $this->detalleVentaService->list()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDetalleVentaRequest $datos) //para crear registros
    {
        $registroInsertado = $this->detalleVentaService->store($datos->validated());
        return response()->json([
            "success" => "el detalle de venta se creo correctamente",
            "datosInsertado" => $registroInsertado
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
    public function update(UpdateDetalleVentaRequest $datosActualizar, int $id) //actualiza todos los registros
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) //elimina un registro
    {
        //
    }
}
