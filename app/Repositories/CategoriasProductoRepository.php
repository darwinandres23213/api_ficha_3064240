<?php



namespace App\Repositories;

use App\Interfaces\CategoriaProductoInterface;
use App\Models\CategoriaProducto as CategoriaProductoModel;

class CategoriaProducto extends BaseRepository implements CategoriaProductoInterface
{
    public function __construct(CategoriaProductoModel $model)
    {
        parent::__construct($model);
    }

    public function getByName(string $nombre)
    {
        
        $productos = $this->model->where("nombre", $nombre)
            ->get();
        if ($productos->Empty()) {
            return null;
        }
        return $productos;
    }

    public function getByStatus(string $estado)
    {
        
        $productos = $this->model->where("estado", $estado)
            ->get();
        if ($productos->Empty()) {
            return null;
        }
        return $productos;
    }
}











