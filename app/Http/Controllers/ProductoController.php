<?php

namespace App\Http\Controllers;

use App\Services\ProductoService;
use App\Http\Requests\Producto\StoreProductoRequest;
use App\Http\Requests\Producto\UpdateProductoRequest;
class ProductoController extends Controller
{
    public function __construct(private ProductoService $productoService)
    {
    }
    public function index() //traer todos los registros
    {
        return response()->json([
            'success' => 'se listaron correctamente',
            'data' => $this->productoService->list()
        ]);
    }


    public function store(StoreProductoRequest $datos) //crear registros
    {
        $registroInsertado = $this->productoService->store($datos->validated());

        return response()->json([
            'success' => 'producto se creo correctamente',
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
    public function update(UpdateProductoRequest $datosActualizar,int $id)
    {
        $productoActualizado = $this->productoService->update(
            $datosActualizar->validated(),
            $id
        );

        return response()->json([
            'success' => 'El producto se actualizó correctamente',
            'data' => $productoActualizado
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        //
    }
}
