<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ZonaService;
use App\Http\Requests\Zona\StoreZonaRequest;
use App\Http\Requests\Zona\UpdateZonaRequest;

class ZonaController extends Controller
{
    public function __construct(private  ZonaService  $zonaServicio)
    {}

    public function index()
    {
        return response()->json([
            'success' => 'Se listaron Correctamente',
            'data' => $this->zonaServicio->list()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreZonaRequest $datos)
    {
        $registroInsertado = $this->zonaServicio->store($datos->validated());

        return response()->json([
            'success' => 'El rol se creó correctamente',
            'datosInsertados' => $registroInsertado
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
    public function update(UpdateZonaRequest $datosActualizar, int $id)
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
