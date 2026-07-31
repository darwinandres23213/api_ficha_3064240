<?php

namespace App\Interfaces;

interface UsuarioInterface extends BaseInterface 
{
    public function getByRol(string $apellido);

    public function getByEstatus(string $estado);

    public function getByName(string $cargo);
    
}
