<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Services\ClienteService;
use App\Http\Requests\Cliente\StoreClienteRequest;
use App\Http\Requests\Cliente\UpdateClienteRequest;
use Illuminate\Support\Facades\Config;

class ClienteController extends Controller
{
    private ClienteService $clienteServicio;

    public function __construct(ClienteService $clienteServicio)
    {
        $this->clienteServicio = $clienteServicio;

        Config::set('database.connections.mysql.host', '127.0.0.1');
        Config::set('database.connections.mysql.port', 3308);
        Config::set('database.connections.mysql.username', 'root');
        Config::set('database.connections.mysql.password', '1234');
    }
    /**
     * Display a    listing of the resource.
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
        $cliente = Cliente::create($datos->validated());
        
        return response()->json([
        'success' => 'El cliente se creo correctamente',
        'datosInsertado' => $cliente
        ], 201);

    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $cliente = $this->clienteServicio->show($id);

        if (!$cliente) {
            return response()->json([
                'message' => 'Cliente no encontrado'
        ], 404);
        }

        return response()->json([
            'success' => 'Cliente encontrado correctamente',
            'data' => $cliente
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClienteRequest $datosActualizar, int $id)
    {
        $cliente = $this->clienteServicio->update(
        $id,
        $datosActualizar->validated()
        );

        if (!$cliente) {
            return response()->json([
                'message' => 'Cliente no encontrado'
        ], 404);
        }

        return response()->json([
            'success' => 'Cliente actualizado correctamente',
            'data' => $cliente
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $cliente = Cliente::find($id);
        if (!$cliente) {
            return response()->json([
                'message' => 'Cliente no encontrado'
            ], 404);
        }

        $cliente->delete();

        return response()->json([
            'success' => 'Cliente eliminado correctamente'
        ], 200);
    }
}
