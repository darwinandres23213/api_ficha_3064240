<?php

namespace App\Repositories;

use App\Interfaces\RolInterface;
use App\Models\Rol;

class RolRepository extends BaseRepository implements RolInterface
{
    public function __construct(Rol $model)
    {
        parent::__construct($model);
    }

    public function findActivos()
    {
        return $this->model->where('estado', true)->get();
    }

    public function getByName(string $nombre)
    {
        return $this->model->where('nombre', $nombre)->first();
    }   

    public function updateEstado(int $id, bool $estado)
    {
        $registro = $this->model->find($id);

        if (! $registro) {
            return null;
        }

        $registro->estado = $estado;
        $registro->save();

        return $registro->fresh();
    }
}