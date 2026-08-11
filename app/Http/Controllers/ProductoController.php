<?php

namespace App\Http\Controllers;

use App\Http\Requests\Rol\StoreRolRequest;
use App\Http\Requests\Rol\UpdateRolRequest;
use App\Services\RolService;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function __construct(private RolService $rolservice)
    {
    }
    public function index() //traer todos los registros
    {
        return response()->json([
            'success' => 'se listaron correctamente',
            'data' => $this->rolservice->list()
        ]);
    }


    public function store(StoreRolRequest $datos) //crear registros
    {
        $registroInsertado = $this->rolservice->store($datos->validated());

        return response()->json([
            'success' => 'rol se creo correctamente',
            'data' => $registroInsertado
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
    public function update(UpdateRolRequest $datosActualizar, int $id)
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
