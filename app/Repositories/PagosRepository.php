<?php

namespace App\Repositories;

use App\Interfaces\PagoInterface;
use App\Models\Pago;
use Carbon\Carbon;

class PagoRepository extends BaseRepository implements PagoInterface
{
    public function __construct(Pago $pagoModel)
    {
        parent::__construct($pagoModel);
    }

    public function getByVenta(int $id)
    {
        $pagos = $this->model->where("venta_id", $id)
                                 ->get();
        
        if($pagos->empty())
        {
            return null;
        }

        return $pagos;
    }

    public function getByEstado(string $estado)
    {
        $pagos = $this->model->where("estado", $estado)
                                 ->get();

        if($pagos->empty())
        {
            return null;
        }

        return $pagos;
       
    }

    public function getByFecha (Carbon $fecha_pago)
    {
        $pagos = $this->model->where("fechaPago", $fecha_pago)
                                 ->get();   
        
        if($pagos->empty())
        {
            return null;
        }

        return $pagos;
    }
}