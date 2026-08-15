<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\ArtistaService;
use App\Http\Requests\Artista\StoreArtistaRequest;
use App\Http\Requests\Artista\UpdateArtistaRequest;

class ArtistaController extends Controller
{
    public function __construct(private ArtistaService $artistaService)
    {
    }
    public function index() //traer todos los registros
    {
        return response()->json([
            'success' => 'se listaron correctamente',
            'data' => $this->artistaService->list()
        ]);
    }


    public function store(StoreArtistaRequest $datos) //crear registros POST lo manda aqui 
    {
        $registroInsertado = $this->artistaService->store($datos->validated());

        return response()->json([
            'success' => 'artista se creo correctamente',
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
    public function update(UpdateArtistaRequest $datosActualizar, int $id)
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