<?php

namespace App\Interfaces;

interface UsuarioInterface extends BaseInterface
{
    public function getByRol(int $idRol);
    public function getByEstatus (bool $status); //true, false 
    public function getByName (string $name);
}
