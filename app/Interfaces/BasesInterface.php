<?php

namespace App\Interfaces;

use ILLuminate\Database\Eloquent\Model;

interface BaseInterface
{
    public function create(array $data);
    public function getall();
    public function getById(int $id);
    public function update(array $data, int $id);
    public function delete(int $id);
}