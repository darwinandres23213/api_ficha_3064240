<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Inventario extends Model
{
    use Hasfactory;

    protected $table="inventarios";

    protected $fillable=[
        'stock_actual',
        'stock_minimo',
        'ubicacion',
        'Ultima_entrada',
        'Ultima_salida',
        'productos_id'
    ];

    

}
