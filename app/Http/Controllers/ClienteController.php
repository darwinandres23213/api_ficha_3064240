<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;
use App\Services\ClienteService;
use App\Http\Requests\Cliente\StoreClienteRequest;
use App\Http\Requests\Cliente\UpdateClienteRequest;
use Illuminate\Support\Facades\Config;


class ClienteController extends Controller
{
    public function __construct()
    {
        Config::set('database.connections.mysql.host', 'db');
        Config::set('database.connections.mysql.port', 3306);
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
            'data' => []
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClienteRequest $datosActualizar, int $id)
    {
        $cliente = Cliente::find($id);

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
