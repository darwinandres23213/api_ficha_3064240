<?php

namespace App\Interfaces;

interface Categoria_Producto extends BaseInterface
{
    
public function getById(string $name);
public function getByStatus(string $estado);



}
