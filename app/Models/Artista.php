<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Artista extends Model //extend es heredar
{
    use HasFactory; //hasfactory datos de prueba=datos basura

    protected $table="djs_artistas";

    protected $fillable =[
        "nombre_artistico",
        "nombre_real",
        "genero_musical",
        "biografia",
        "contacto",
        "cache_base",
        "estado"
    ];


    protected $casts =[
        "estado" => 'boolean'
    ];

}
