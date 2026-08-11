<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Rolservice;
use App\Http\Request\Rol\UpdateRolRequest;

class Rolcontroller extends Controller
{
    public function __construct(private Rolservice $empleados)
{}


    public function index()
    {


        return Response()->json([
             'success' => 'se listaron Correctamente',
             'data' => $this->rolServicio->list();
    ],200);

    }
        
    
    
    public function store(RequestRolRequest $datos)
    {
       registroInsertado - $this->store($datos->validated());


    return response()->json([

    'succes' => 'El rol se creo correctamente',
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
    public function update(UpdateEmpleadosRequest $request, string $id)
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
