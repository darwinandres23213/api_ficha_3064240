<?php

namespace App\Services;

use App\Interfaces\EventoInterface;

class EventoService
{
    public function __construct(
        private EventoInterface $eventoRepository
    ){}

    public function list()
    {
        return $this->eventoRepository->all();
    }

    public function show(int $id)
    {
        return $this->eventoRepository->find($id);
    }

    public function store(array $data)
    {
        return $this->eventoRepository->create($data);
    }

    public function update(int $id, array $data)
    {
        return $this->eventoRepository->update($id, $data);
    }

    public function destroy(int $id)
    {
        return $this->eventoRepository->delete($id);
    }
    
    public function getByAforo(int $aforo)
    {
        return $this->eventoRepository->getByAforo($aforo);
    }

    public function getByEstado(string $estado)
    {
        return $this->eventoRepository->getByEstado($estado);
    }

    public function getByPrecioEntradao(float $precioEntrada)
    {
        return $this->eventoRepository->getByPrecioEntrada($precioEntrada);
    }






}