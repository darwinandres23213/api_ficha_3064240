<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Detalle_venta extends Model
{
    use HasFactory;

    protected $table="Detalle_venta";

    protected $fillable = [
        "venta_id",
        "producto_id",
        "cantidad",
        "precio_unitario",
        "subtotal",
    ];

}
