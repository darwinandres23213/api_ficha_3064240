<?php

namespace App\Interfaces;

interface categoria_producto extends BaseInterface
{
    
public function getById(string $name);
public function getByStatus(string $estado);



}
