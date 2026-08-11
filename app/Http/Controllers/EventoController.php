<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Eventoservice;
use App\Http\Request\Evento\StoreEventoRequest;
use App\Http\Request\Evento\updateEventoRequest;

class EventoController extends Controller
{
    public function __construct(private Eventoservice $eventoservicio)
    {
        return response()-> json([
            "succes" => "se listaron Correctamente",
            "data" => $this->eventoServicio->list()
        ]);
    }
    

    public function index()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreEventoRequest $datos)
    {
        $registroInsertado = $this ->eventoServicio->store($datos-validated());

        returnresponse()->json([
            "succes" => "El rol se creo correctamente",
            "datosInsertado" => $registroInsertado
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
    public function update(UpdateEventoRequest $actualizar, int $id)
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
