<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\PagoService;
use App\Http\Request\StorePagoRequest;
use App\Http\Request\UpdatePagoRequest;

class Pagocontroller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(private PagoService $pagoServicio)
    {}


   public function index()
   {
    return response()->json([
        'success' => 'Se listaron Correctamente',
        'data' => $this->pagoServicio->list()
    ],200);
    }
    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePagoRequest $datos)
{
    $registroInsertado = $this->pagoServicio->store($datos->validated());

    return response()->json([
        'success' => 'El rol se creo correctamente',
        'datosInsertado' => $registroInsertado
    ], 201);
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePagoRequest $datosActualizar, int $id)
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
