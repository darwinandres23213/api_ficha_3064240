<?php

namespace App\Interfaces;

interface CategoriaProductoInterface extends BaseInterface
{
    
public function getById(string $name);
public function getByStatus(string $estado);



}
