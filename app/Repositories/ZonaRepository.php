<?php

namespace App\Repositories;

use App\Interfaces\Zonainterface;
use App\Models\Zona;

class ZonaRepository extends BaseRepository implements ZonaInterface
{
    public function __construct(Zona $zonaModel)
    {
        parent::__construct($zonaModel);
    }
    
    public function getByAforoMaximo(int $aforoMaximo)
    {
        $zona =$this ->model->where("aforo_maximo", $aforoMaximo)
                    ->get();
        if($zona->empty())
        {
            return null;
        }
        return $zona;
    }

    public function getByPrecioCover(float $precioCover)
    {
        $zona =$this ->model->where("precio_Cover", $precioCover)
                    ->get();
        if($zona->empty())
        {
            return null;
        }
        return $zona;
    }

    public function getByEstado(string $estado)
    {
        $zona =$this ->model->where("estado", $estado)
                    ->get();
        if($zona->empty())
        {
            return null;
        }
        return $zona;
    }

    public function getByNombre(string $nombre)
    {
        $zona =$this ->model->where("nombre", $nombre)
                    ->get();
        if($zona->empty())
        {
            return null;
        }
        return $zona;
    }

}