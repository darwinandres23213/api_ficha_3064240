<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ZonaService;
use App\Http\Requests\Zona\StoreZonaRequest;
use App\Http\Requests\Zona\UpdateZonaRequest;
use App\Models\Zona;


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
    public function update(UpdateZonaRequest $request, Zona $zona)
{
    $zona->update($request->validated());

    return response()->json([
        'success' => 'Zona actualizada correctamente',
        'data' => $zona
    ], 200);
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Zona $zona)
{
    $zona->delete();

    return response()->json([
        'message' => 'Zona eliminada correctamente'
    ], 200);
}

}
