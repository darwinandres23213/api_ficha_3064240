<?php

namespace App\Services;

use App\Interfaces\ZonaInterface;

class ZonaService
{
    public function __construct(
        private ZonaInterface $zonaRepository
    ){}

    public function list()
    {
        return $this->zonaRepository->all();
    }

    public function show(int $id)
    {
        return $this->zonaRepository->find($id);
    }

    public function store(array $data)
    {
        return $this->zonaRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->zonaRepository->update($id, $data);
    }

    public function destroy(int $id)
    {
        return $this->zonaRepository->delete($id);
    }

    public function getByAforoMaximo(int $aforoMaximo)
    {
        return $this->zonaRepository->getByAforoMaximo($aforoMaximo);
    }

    public function getByPrecioCover(float $precioCover)
    {
        return $this->zonaRepository->getByPrecioCover($precioCover);
    }

    public function getByEstado(string $estado)
    {
        return $this->zonaRepository->getByEstado($estado);
    }

    public function getByNombre(string $nombre)
    {
        return $this->zonaRepository->getByNombre($nombre);
    }
}