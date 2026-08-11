<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\RolService;
use App\Http\Request\Rol\StoreRolRequest;
use App\Http\Request\Rol\UpdateRolRequest;

class RolController extends Controller
{
    
    public function __construct(private RolService $rolService)
    {}

    public function index()
    {
        return response()->json([
            'success' => 'Se litaron correctamente',
            'data' => $this->rolServicio->list()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreRolRequest $datos)
    {
        $registrosInsertado = $this->rolServicio->store($datos->validated());


        return response()->json([
            'success' => 'El rol se creó correctamente',
            'datosInsertados' => $registrosInsertado 
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
