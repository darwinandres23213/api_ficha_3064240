<?php

namespace App\Interfaces;

interface ClienteInterface extends BaseInterface
{
    public function getByName (String $name); // 
    public function getByLastname (String $lastname);
    public function getByDocument (String $document);
}