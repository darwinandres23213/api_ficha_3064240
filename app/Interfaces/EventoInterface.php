<?php

namespace App\Interfaces;

interface EventoInterface extends BaseInterface
{
    public function getByEvento(int $idevento);

    public function getByAforo(int $aforo);

    public function getByEstado(string $estado);

    public function getByPrecioEntrada (float $precioEntrada);
}