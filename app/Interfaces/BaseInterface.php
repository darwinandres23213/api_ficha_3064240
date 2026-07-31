<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Model;


interface BaseInterface
{
    public function create(array $data);
    public function getAll();
    public function getById(int $id);
    public function update(int $id, array $data);
    public function delete(int $id);
}