<?php

namespace App\Services;

use App\Interfaces\Repositories\RolInterface;

class RolServices
{
    public function__construct(
        private RolInterface $rolRepository
    ){}

    public function list()
    {
        return $this->rolRepository->all();
    }

    public function show(int $id)
    {
        return $this->rolRepository->find(id);
    }

    public function store(array $data);
    {
        return $this->rolRepository->create(id,$data);
    }

    public function update(int $id, array $data)
    {
        return $this->rolRepository->update($id, $data),
    }

    public function destroy(int $id)
    {
        return $this->rolRepository->delete($id);
    }

    public function getByName(string $nombre)
    {
        return $this->rolRepository->getByName($nombre);
    }

    public function obtenerActivos()
    {
        return $this->rolRepository->findActivos();
    }

    public function cambiarEstado(int $id, bool $estado)
    {
        $rol = $this->rolRepository->updateEstado($id, $estado);

        if (! $rol) {
            throw new \Exception("No se encontró el rol con id {$id}");
        }

        return $rol;
    }