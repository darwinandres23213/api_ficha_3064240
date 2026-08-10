<?php

namespace App\Services;

use App\Interfaces\MesaInterface;

class MesaService
{
    public function __construct(
        private MesaInterface $mesaRepository
    ){}

    public function list()
    {
        return $this->mesaRepository->all();
    }

    public function show(int $id)
    {
        return $this->mesaRepository->find($id);
    }

    public function store(array $data)
    {
        return $this->mesaRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->mesaRepository->update($id, $data);
    }

    public function destroy(int $id)
    {
        return $this->mesaRepository->delete($id);
    }
    
    public function getByNumero(int $numero)
    {
        return $this->mesaRepository->getByNumero($numero);
    }

    public function getByEstado(float $estado)
    {
        return $this->mesaRepository->getByEstado($estado);
    }

    public function getByTipo(string $tipo)
    {
        return $this->mesaRepository->getByTipo($tipo);
    }






}