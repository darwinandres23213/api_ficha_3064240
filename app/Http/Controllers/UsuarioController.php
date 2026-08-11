<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\UsuarioService;
use App\HTTP\Requests\Usuario\StoreUsuarioRequest;
use App\HTTP\Requests\Usuario\UpdateUsuarioRequest;

class UsuarioController extends Controller
{
    public function __construct(private Usuarioservice $usuarioServicio)
    {}
   
    public function index()
    {
        return response()->json([
            'succes' => 'se listaron Correctamente',
            'data' => $this->usuarioServicio->list()
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUsuarioRequest $datos)
    {
        $registroInsertado = $this->usuarioServicio->store($datos->validated());


        return response()->json([
            'succes' => 'El rol se creó correctamente',
            'datosInsertados' => $registroInsertado
        ],201);



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
    public function update(UpdateUsuarioRequest $datosActualizar, int $id)
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
