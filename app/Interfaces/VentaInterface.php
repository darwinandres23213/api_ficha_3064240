<?php
namespace App\Interfaces;

interface VentaInterface extends BaseInterface

{
    public function getByNumero_factura(string $Numero_factura);

    public function getByFecha_venta(dateTime $Fecha_venta);

    public function getByEstado(enum $Estado);

}