<?php

namespace App\Services;

use App\Interfaces\PagoInterface;
use Carbon\Carbon;

class PagoService
{
    public function __construct(
        private PagoInterface $pagoRepository
    ){}

    public function list()
    {
        return $this->pagoRepository->getAll();
    }

    public function show(int $id)
    {
        return $this->pagoRepository->getById($id);
    }

    public function store(array $data)
    {
    return $this->pagoRepository->create($data);
    }

    public function update (int $id, array $data)
    {
        return $this->pagoRepository->update($data, $id);
    }

    public function destroy (int $id)
    {
        return $this->pagoRepository->delete($id);
    }

    public function getByVenta (int $id)
    {
        return $this->pagoRepository->getByVenta($id);
    }

    public function getByEstado (string $estado)
    {
        return $this->pagoRepository->getByEstado($estado);
    }

    public function getByFecha (Carbon $fechaPago)
    {
        return $this->pagoRepository->getByFecha($fechaPago);
    }


}


