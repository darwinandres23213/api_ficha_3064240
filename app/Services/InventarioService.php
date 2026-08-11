<?php

namespace App\Services;

use App\Interfaces\InventarioInterface;

class InventarioService
{
    public function __construct(
        private InventarioInterface $inventarioRepository
    ) {}

    public function list()
    {
        return $this->inventarioRepository->getAll();
    }

    public function show(int $id)
    {
        return $this->inventarioRepository->find($id);
    }

    public function store(array $data)
    {
        return $this->inventarioRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->inventarioRepository->update($id, $data);
    }

    public function destroy(int $id)
    {
        return $this->inventarioRepository->delete($id);
    }

    public function getByProductoId(int $productoId)
    {
        return $this->inventarioRepository->getByProductoId($productoId);
    }

    public function getByStockActual(int $stockActual)
    {
        return $this->inventarioRepository->getByStockActual($stockActual);
    }

    public function getByUbicacion(string $ubicacion)
    {
        return $this->inventarioRepository->getByUbicacion($ubicacion);
    }
}
