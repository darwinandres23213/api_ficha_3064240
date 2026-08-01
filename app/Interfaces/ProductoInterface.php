<?php

namespace App\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface ProductoInterface extends BaseInterface
{
    public function getByCategoriaId(int $categoriaId);
    public function getByProvedorId(int $proveedorId);
    public function getNombreById(string $nombre);
}