<?php
namespace App\Services;

use App\Interfaces\Usuariointerface;

class UsuarioService{
    public function __construct(
        private Usuariointerface $UsuarioRepository
    )

    public function list()
    {
        return $this->UsuarioRepository->all();
    }

    public function show(int $id)
    {
        return $this->UsuarioRepository->find($id);
    }

    public function store(array $data)
    {
        return $this->UsuarioRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->UsuarioRepository->update($id, $data);
    }

    public function destroy(int $id)
    {
        return $this->UsuarioRepository->delete($id);
    }

    public function getByROL (int $idRol)
    {
        return $this->UsuarioRepository->getByRol($idRol);
    }

    public function getByEStatus (bool $status)
    {
        return $this->UsuarioRepository->getByEstatus($status);
    }

    public function getByName (string $name)
    {
        return $this->UsuarioRepository->getByName($name);
    }
}
    

