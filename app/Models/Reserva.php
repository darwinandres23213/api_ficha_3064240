<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Reserva extends Model
{
    use HasFactory;

    protected $table="reservas";

    protected $fillable=[
        'fecha_reserva',
        'cantidad_personas',
        'anticipo',
        'observaciones',
        'estado',
        'clientes_id',
        'mesas_id',
        'eventos_id',
        'empleados_id'
    ];

    protected $casts =[
        'estado' => 'boolean'// true, false

    ];
}
