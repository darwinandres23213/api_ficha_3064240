<?php

namespace App\Services;

use App\Interfaces\DetalleVentaInterface;

class DetalleVentaService
{
    public function __construct(
        private DetalleVentaInterface $detalleVentaRepository
    ) {}

    public function list()
    {
        return $this->detalleVentaRepository->getAll();
    }

    public function show(int $id)
    {
        return $this->detalleVentaRepository->find($id);
    }

    public function store(array $data)
    {
        return $this->detalleVentaRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->detalleVentaRepository->update($id, $data);
    }

    public function destroy(int $id)
    {
        return $this->detalleVentaRepository->delete($id);
    }

    public function findByVentaId(int $ventaId)
    {
        return $this->detalleVentaRepository->getByVentaId($ventaId);
    }

    public function findByProductoId(int $productoId)
    {
        return $this->detalleVentaRepository->getByProductoId($productoId);
    }
}
