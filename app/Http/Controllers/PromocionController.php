<?php

namespace App\Http\Controllers;

use App\Interfaces\PromocionInterface;
use App\Http\Requests\StorePromocionRequest;
use App\Http\Requests\UpdatePromocionRequest;

class PromocionController extends Controller
{
    public function __construct(private PromocionInterface $promocionRepository)
    {}

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'success' => 'se listaron correctamente',
            'data' => $this->promocionRepository->getAll()
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePromocionRequest $request)
    {
        $promocion = $this->promocionRepository->create($request->validated());

        return response()->json([
            'success' => 'promoción se creó correctamente',
            'data' => $promocion
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $promocion = $this->promocionRepository->getById($id);

        if (!$promocion) {
            return response()->json(['message' => 'Promoción no encontrada'], 404);
        }

        return response()->json([
            'success' => 'se encontró la promoción',
            'data' => $promocion
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePromocionRequest $request, int $id)
    {
        $promocion = $this->promocionRepository->update($request->validated(), $id);

        if (!$promocion) {
            return response()->json(['message' => 'Promoción no encontrada'], 404);
        }

        return response()->json([
            'success' => 'promoción se actualizó correctamente',
            'data' => $promocion
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $id)
    {
        $eliminado = $this->promocionRepository->delete($id);

        if (!$eliminado) {
            return response()->json(['message' => 'Promoción no encontrada'], 404);
        }

        return response()->json([
            'success' => 'promoción se eliminó correctamente'
        ], 200);
    }
}