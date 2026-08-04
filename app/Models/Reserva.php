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
        'cliente_id',
        'mesa_id',
        'evento_id',
        'empleado_id'
    ];

    protected $casts =[
        'estado' => 'boolean'// true, false

    ];

    public function cliente()
    {
        return $this->belongsTo(cliente::class);
    }

    public function mesa()
    {
        return $this->belongsTo(mesa::class);
    }

    public function evento()
    {
        return $this->belongsTo(evento::class);
    }

    public function empledo()
    {
        return $this->belongsTo(empleado::class);
    }
}



