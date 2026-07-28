<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
     use factory;

     protected $table="producto"

     protected $fillable =[
        'categorias_id',
        'proveedores_id',
        'codigo',
        'nombre',
        'descripcion',
        'precio_venta',
        'precio_compra'
     ];

}
