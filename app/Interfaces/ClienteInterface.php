<?php

namespace App\Interfaces;

interface ClienteInterface extends BaseInterface
{
    public function getByName (String $name);
    public function getByLastname (String $lastname);//prueba
    public function getByDocument (String $document);
}
