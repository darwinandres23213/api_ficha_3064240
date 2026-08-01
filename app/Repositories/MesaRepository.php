<?php

namespace App\Repositories;

use App\Interfaces\MesaInterface;
use App\Models\Mesa;

class MesaRepository extends BaseRepository implements MesaInterface
{
    public function __construct(Mesa $mesaModel)
    {
        parent::__construct($mesaModel);
    }

    public function getByNumero(String $numero)
    {
        $mesas->model->where("numero", $numero)
                    ->get();

        if($mesas->empty())
        {
        return null;
        }
        return $mesas;
    }

    public function getByEstado(String $estado)
    {
        $mesas = $this->model->where("estado", $estado)
                             ->get();

        if($mesas->empty())
        {
        return null;
        }
        return $mesas;

    }

    public function getByTipo(String $tipo)
    {
        $mesas = $this->model->where("tipo", $tipo)
                             ->get();

        if($mesas->empty())
        {
        return null;
        }
        return $mesas;
    }


}

