<?php

namespace App\Repositories;

use App\Interfaces\ProductoInterface;
use App\Models\Producto;

class ProductoRepository extends BaseRepository implements ProductoInterface
{
    public function __construct(Producto $producto)
    {
        parent::__construct($producto);
    }

    public function getByCategoriaId($id)
    {
        return $this->model->find($id);
    }

    public function getByProvedorId($id)
    {
        return $this->model->find($id);
    }

    public function getNombreById($nombre)
    {
        $productos = $this->model->where("nombre", $nombre)
            ->get();
        if ($productos->empty()) {
            return null;
        }
        return $productos;

    }
}



