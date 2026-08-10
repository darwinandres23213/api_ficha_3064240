<?php

namespace App\Services;

use App\Interfaces\UsuarioInterface;

class UsuarioService
{
    public function __construct(
        private UsuarioInterface $usuarioRepository
    ) {}

    public function list()
    {
        return $this->usuarioRepository->all();
    }

    public function show(int $id)
    {
        return $this->usuarioRepository->find($id);
    }

    public function store(array $data)
    {
        return $this->usuarioRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->usuarioRepository->update($id, $data);
    }

    public function destroy(int $id)
    {
        return $this->usuarioRepository->delete($id);
    }

    public function getByRol(int $idRol)
    {
        return $this->usuarioRepository->getByRol($idRol);
    }

    public function getByEstatus(bool $status)
    {
        return $this->usuarioRepository->getByEstatus($status);
    }

    public function getByName(string $name)
    {
        return $this->usuarioRepository->getByName($name);
    }
}
