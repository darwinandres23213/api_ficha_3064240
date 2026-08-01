<?php

namespace App\Interfaces;

interface MesaInterface extends BaseInterface
{

    public function getByNumero(String $numero);

    public function getByEstado(String $estado);

    public function getByTipo(String $tipo);

}
