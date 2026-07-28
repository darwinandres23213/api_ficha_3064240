<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory; 

    protected $table="ventas";

    protected $fillable = [

        'nombre',
        'descripcion',
        'fecha_inicio',
        'echa_fin',
        'aforo',
        'precio_entrada',
        'programado","en_curso","finalizado","cancelado',
        'zonas_id',
        'dj_artistas_id',
        'zonas_id',
        'dj_artistas_id',

];


}
