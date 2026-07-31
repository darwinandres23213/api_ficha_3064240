<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    use HasFactory;

    protected $table = "eventos";

    protected $fillable = [
        "nombre",
        "descripcion",
        "fecha_inicio",
        "fecha_fin",
        "aforo",
        "precio_entrada",
        "estado",
        "zonas_id",
        "dj_artistas_id",
    ];

    protected $casts = [
        'estado' => 'boolean', //true, false
    ];
}