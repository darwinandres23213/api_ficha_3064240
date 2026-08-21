<?php

namespace App\Services;

use App\Interfaces\ProductoInterface;

class ProductoService
{
    public function __construct(
        private ProductoInterface $productoRepository
    ) {
    }

    public function list()
    {
        return $this->productoRepository->getAll();
    }

    public function show(int $id)
    {
        //return $this->productoRepository->find($id);
    }

    public function store(array $data)
    {
        return $this->productoRepository->create($data);
    }

    public function update(array $data,int $id)
    {
        return $this->productoRepository->update($id, $data);
    }

    public function destroy(int $id)
    {
        return $this->productoRepository->delete($id);
    }
}


