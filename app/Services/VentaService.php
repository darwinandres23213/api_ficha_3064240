<?php

namespace App\Services;

use App\Models\Venta;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class VentaService
{
    /**
     * Relaciones que se cargan por defecto al consultar una venta.
     */
    protected array $with = ['cliente', 'empleado', 'mesa', 'promocion'];

    /**
     * Listar ventas de forma paginada, con filtros opcionales.
     */
    public function listar(array $filtros = [], int $porPagina = 15): LengthAwarePaginator
    {
        $query = Venta::query()->with($this->with);

        if (!empty($filtros['estado'])) {
            $query->where('estado', $filtros['estado']);
        }

        if (!empty($filtros['cliente_id'])) {
            $query->where('cliente_id', $filtros['cliente_id']);
        }

        if (!empty($filtros['fecha_desde'])) {
            $query->whereDate('fecha_venta', '>=', $filtros['fecha_desde']);
        }

        if (!empty($filtros['fecha_hasta'])) {
            $query->whereDate('fecha_venta', '<=', $filtros['fecha_hasta']);
        }

        return $query->latest('fecha_venta')->paginate($porPagina);
    }

    /**
     * Obtener todas las ventas sin paginar (uso interno / reportes).
     */
    public function listarTodas(): Collection
    {
        return Venta::with($this->with)->latest('fecha_venta')->get();
    }

    /**
     * Buscar una venta por id. Lanza ModelNotFoundException si no existe.
     */
    public function buscar(int $id): Venta
    {
        return Venta::with($this->with)->findOrFail($id);
    }

    /**
     * Crear una nueva venta.
     */
    public function crear(array $datos): Venta
    {
        return DB::transaction(function () use ($datos) {
            $datos['total'] = $this->calcularTotal($datos);

            $venta = Venta::create($datos);

            Log::info('Venta creada', ['id' => $venta->id, 'numero_factura' => $venta->numero_factura]);

            return $venta->load($this->with);
        });
    }

    /**
     * Actualizar una venta existente.
     */
    public function actualizar(Venta $venta, array $datos): Venta
    {
        return DB::transaction(function () use ($venta, $datos) {
            // Si cambia subtotal o descuento, se recalcula el total
            if (isset($datos['subtotal']) || isset($datos['descuento'])) {
                $datos['total'] = $this->calcularTotal([
                    'subtotal'  => $datos['subtotal']  ?? $venta->subtotal,
                    'descuento' => $datos['descuento'] ?? $venta->descuento,
                ]);
            }

            $venta->update($datos);

            Log::info('Venta actualizada', ['id' => $venta->id]);

            return $venta->fresh($this->with);
        });
    }

    /**
     * Eliminar una venta.
     */
    public function eliminar(Venta $venta): bool
    {
        return DB::transaction(function () use ($venta) {
            $eliminado = $venta->delete();

            Log::info('Venta eliminada', ['id' => $venta->id]);

            return $eliminado;
        });
    }

    /**
     * Anular una venta (cambio de estado en lugar de borrado físico).
     */
    public function anular(Venta $venta): Venta
    {
        $venta->update(['estado' => 'anulada']);

        return $venta->fresh($this->with);
    }

    /**
     * Calcula el total como subtotal - descuento.
     */
    protected function calcularTotal(array $datos): float
    {
        $subtotal  = (float) ($datos['subtotal'] ?? 0);
        $descuento = (float) ($datos['descuento'] ?? 0);

        return round($subtotal - $descuento, 2);
    }
}
