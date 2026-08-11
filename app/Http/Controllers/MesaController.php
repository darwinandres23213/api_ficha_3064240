<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\MesaService;
use App\Http\Request\Rol\StoreMesaRequest;
use App\Http\Request\Rol\updateMesaRequest;

class MesaController extends Controller
{
    
    public function __construct(private MesaService $mesaServicio)
    {}

    public function index()
    {
        return Reponse()->json([
            "success" => "se listaron Correctamente",
            "data" => $this->mesaServicio->list()
        ]);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMesaRequest $datos)
    {
        $registroInsertado = $this->mesaServicio->store($data->validated());

        return response()->json([
            "success"=> "El rol se creo correctamente",
            "datosInsertado"=>$registroInsertado
        ]);
    

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
    public function update(UpdateMesaRequest $datoActualizar, string $id)
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
