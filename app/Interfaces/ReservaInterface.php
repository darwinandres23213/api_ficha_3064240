<?php

namespace App\Interfaces;

interface ReservaInterface extends BaseInterface
{
    public function getByClienteid(int $cliente);
    public function getByEventoid(int $evento);
    public function getByFechaReserva(datatime $fechareserva);

}