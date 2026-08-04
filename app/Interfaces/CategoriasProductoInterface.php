<?php

namespace App\Interfaces;

interface CategoriasProductoInterface extends BaseInterface
{    
public function getByName(string $name);
public function getByStatus(string $estado);
}

