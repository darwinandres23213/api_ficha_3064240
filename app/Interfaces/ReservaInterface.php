<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface ReservaInterface extends BaseInterface
{
    public function getByFechaReserva(date_time $fechaReserva); 
    public function getByClienteId(int $clienteId);
    public function getByEventoId(int $eventoId);
}