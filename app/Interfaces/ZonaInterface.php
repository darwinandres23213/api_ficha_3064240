<?php

namespace App\Interfaces;

interface ZonaInterface extends BaseInterface
{
    public function getByAforoMaximo(int $aforoMaximo);

    public function getByPrecioCover(float $precioCover);

    public function getByEstado(String $estado);

    public function getByNombre(String $nombre);

}