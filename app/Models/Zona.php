<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Zona extends Model
{
    use HasFactory;

    protected $table="zonas";

    protected $fillable=[
        'nombre',
        'descripcion',
        'aforo_maximo',
        'precio_cover',
        'estado'

    ];


    protected $casts =[
        'estado' => 'boolean'
    ];

}
