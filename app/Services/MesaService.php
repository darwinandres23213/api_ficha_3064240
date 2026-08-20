<?php

namespace App\Services;

use App\Interfaces\MesaInterface;
use App\Repositories\MesaRepository;

class MesaService
{
    private MesaInterface $mesaRepository;

    public function __construct()
    {
        $this->mesaRepository = app(MesaRepository::class);
    }

    public function list()
    {
        return $this->mesaRepository->getAll();
    }

    public function show(int $id)
    {
        return $this->mesaRepository->getById($id);
    }

    public function store(array $data)
    {
        return $this->mesaRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->mesaRepository->update($data, $id);
    }

    public function destroy(int $id)
    {
        return $this->mesaRepository->delete($id);
    }

    public function getByNumero(string $numero)
    {
        return $this->mesaRepository->getByNumero($numero);
    }

    public function getByEstado(string $estado)
    {
        return $this->mesaRepository->getByEstado($estado);
    }

    public function getByTipo(string $tipo)
    {
        return $this->mesaRepository->getByTipo($tipo);
    }
}