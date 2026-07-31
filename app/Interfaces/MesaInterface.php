<?php

namespace App\Interfaces;

interface MesaInterface extends BaseInterface
{
    public function getByNombre(String $nombre);

    public function getByNumero(String $numero);

    public function getByEstado (String $estado);



}
