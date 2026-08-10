<?php

namespace App\Interfaces;

interface EmpleadoInterface extends BaseInterface
{
    public function getByApellido(string $apellidos);
    public function getByEstado(string $estado);
    public function getByCargo(string $cargo);
}
