<?php
namespace App\Interfaces;

interface VentaInterface extends BaseInterface

{
    public function getByNumero_factura(cadena $factura);

    public function getByTotal_precio(decimal $Total_precio);

    public function getByEstado(enum $Estado);

}