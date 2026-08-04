<?php

namespace App\Repositories;

use App\Interfaces\EmpleadoInterface;
use App\Models\Empleado;

class EmpleadoRepository extends BaseRepository implements EmpleadoInterface
{
    public function __construct(Empleado $empleadoModel)
    {
        parent::__construct($empleadoModel);
    }

    public function getByApellido(string $apellidos)
    {
        return $this->model->where('apellidos', 'like', '%' . $apellidos . '%')
                            ->get();
    }

    public function getByEstado(string $estado)
    {
        return $this->model->where('estado', 'like', '%' . $estado . '%')
                            ->get();
    }

    public function getByCargo(string $cargo)
    {
        return $this->model->where('cargo', 'like', '%' . $cargo . '%')
                            ->get();
    }
}