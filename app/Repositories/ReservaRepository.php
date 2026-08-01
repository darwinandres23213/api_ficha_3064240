<?php
namespace App\Repositories;

use App\Interfaces\ReservaInterface;
use App\Models\Reserva;


class ReservaRepositorio extends BaseRepository implements ReservaInterface
{
    public function __construct(Reserva $reserva)
    {
        parent::__construct($reserva);
    }

    public function getByClienteid(int $cliente)
    {
        $productos = $this->model->where("clientes_id", $cliente)
            ->get();

        if ($productos->empty()) {
            return null;
        }

        return $productos;
    }

    public function getByEventoid(int $evento)
    {
        $productos = $this->model->where("eventos_id", $evento)
            ->get();

        if ($productos->empty()) {
            return null;
        }

        return $productos;
    }

    public function getByEmpleadoid(int $empleado)
    {

        $productos = $this->model->where("empleados_id", $empleado)
            ->get();

        if ($productos->empty()) {
            return null;
        }

        return $productos;
    }

}