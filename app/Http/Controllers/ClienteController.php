<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ClienteService;
use App\Hpt\Request\Cliente\StoreClienteRequest;
use App\Hpt\Request\Cliente\UpdateClienteRequest;

class ClienteController extends Controller
{
    public function __construct(private ClienteService $clienteService)
    {}
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'success' => 'Se listaron Correctamente',
            'data' => $this->clienteServicio->list()
        ],200); // OK
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreClienteRequest $datos)
    {
        $registroInsertado = $this->clienteServicio->store($datos->validated());

        return response()->json([
            'sucess' => 'El cliente se creo correctamente',
            'datosInsertado' =>$registroInsertado

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
    public function update(UpdateClienteRequest $datosActualizar, int $id)
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
