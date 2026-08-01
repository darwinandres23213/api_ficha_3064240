<?php

namespace App\Repositories;

use App\Interfaces\BaseInterface;


class EmpleadoRepository extends BaseRepository implements EmpleadoInterface
{
    public function _construct(Empleado $EmpleadoModel)
    {
        parent::_construct($EmpleadoModel);
    }

    public function getByRol(string $apellido)
    {
        return $this->model->where('apellido', 'like', '%' . $apellido . '%')
                            ->get();
    }

    public function getByEstatus(string $estado)
    {
        return $this->model->where('estado', 'like', '%' . $estado . '%')
                            ->get();
    }

    public function getByName(string $cargo)
    {
        return $this->model->where('cargo', 'like', '%' . $cargo . '%')
                            ->get();
    }

}