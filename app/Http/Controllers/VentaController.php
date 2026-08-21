<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreVentaRequest;
use App\Http\Requests\UpdateVentaRequest;
use App\Models\Venta;
use App\Services\VentaService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    public function __construct(protected VentaService $ventaService)
    {
    }

    /**
     * GET /api/ventas
     */
    public function index(Request $request): JsonResponse
    {
        $filtros = $request->only(['estado', 'cliente_id', 'fecha_desde', 'fecha_hasta']);
        $porPagina = (int) $request->get('por_pagina', 15);

        $ventas = $this->ventaService->listar($filtros, $porPagina);

        return response()->json([
            'success' => true,
            'data'    => $ventas,
        ]);
    }

    /**
     * POST /api/ventas
     */
    public function store(StoreVentaRequest $request): JsonResponse
    {
        $venta = $this->ventaService->crear($request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Venta creada correctamente.',
            'data'    => $venta,
        ], 201);
    }

    /**
     * GET /api/ventas/{venta}
     */
    public function show(Venta $venta): JsonResponse
    {
        return response()->json([
            'success' => true,
            'data'    => $venta->load(['cliente', 'empleado', 'mesa', 'promocion']),
        ]);
    }

    /**
     * PUT/PATCH /api/ventas/{venta}
     */
    public function update(UpdateVentaRequest $request, Venta $venta): JsonResponse
    {
        $venta = $this->ventaService->actualizar($venta, $request->validated());

        return response()->json([
            'success' => true,
            'message' => 'Venta actualizada correctamente.',
            'data'    => $venta,
        ]);
    }

    /**
     * DELETE /api/ventas/{venta}
     */
    public function destroy(Venta $venta): JsonResponse
    {
        $this->ventaService->eliminar($venta);

        return response()->json([
            'success' => true,
            'message' => 'Venta eliminada correctamente.',
        ]);
    }

    /**
     * PATCH /api/ventas/{venta}/anular
     */
    public function anular(Venta $venta): JsonResponse
    {
        $venta = $this->ventaService->anular($venta);

        return response()->json([
            'success' => true,
            'message' => 'Venta anulada correctamente.',
            'data'    => $venta,
        ]);
    }
}
