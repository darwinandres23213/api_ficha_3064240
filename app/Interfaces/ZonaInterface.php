<?php

namespace App\Interfaces;

interface ZonaInterface extends BaseInterface
{
    public function getByAforoMaximo(int $aforoMaximo);

    public function getByPrecioCover(float $precioCover);

    public function getByEstado(string $estado);

    public function getByNombre(string $nombre);

}