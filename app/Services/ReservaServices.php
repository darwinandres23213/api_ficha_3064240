<?php

namespace App\services;

use App\Interface\ReservaInterface;
class ReservaService
{
    public function __construct(
        private ProductoInterface $productoRepository
    ){}

    public function all()
    {
        return $this->productoRepository->all();
    }

    public function show(int $id)
    {
        return $this->productoRepository->find($id);
    }

    public function store(array $data)
    {
        return $this->productoRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->produductoRepository->update($id, $data);
    }

    public function destroy(int $id)
    {
        return $this->productoRepository->delete($id);
    }

    public function findByClienteid(ind $cliente)
    {
        return $this->productoRepository->findByClienteid($cliente)
    }

    public function findByEventoid(ind $evento)
    {
        return $this->productoRepository->findByEventoid($evento)
    }

    public function findByEmpleadoid(ind $epleado)
    {
        return $this->productoRepository->findByEmpleadoid($evento)
    }

}