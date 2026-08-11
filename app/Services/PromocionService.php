<?php

namespace App\Services;

use App\Interfaces\PromocionInterface;

class PromocionService
{
    public function __construct(
        private PromocionInterface $promocionRepository
    ){}

    public function list()
    {
        return $this->promocionRepository->all();
    }

    public function show(int $id)
    {
        return $this->promocionRepository->find($id);
    }

    public function store(array $data)
    {
        return $this->promocionRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->promocionRepository->update($id, $data);
    }

    public function destroy(int $id)
    {
        return $this->promocionRepository->delete($id);
    }

    public function getByEstado(bool $estado)
    {
        return $this->promocionRepository->getByEstado($estado);
    }

    public function getByEvento(int $eventoId)
    {
        return $this->promocionRepository->getByEvento($eventoId);
    }

    public function getByReference(string $referencia)
    {
        return $this->promocionRepository->getByReference($referencia);
    }
}