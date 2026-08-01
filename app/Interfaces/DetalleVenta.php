<?php

namespace App\Interfaces;



interface DetalleVentaInterface extends BaseInterface
{
    public function getByProductoId(int $productoId);
    public function getByVentaid(int $ventaId);
    public function getByCantidad(int $cantidad);

}