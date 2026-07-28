<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table="clientes";

    protected $fillable =[
        'documento',
        'nombres_cliente',
        'apellidos_cliente',
        'email',
        'telefono',
        'fecha_nacimiento',
        'tipo'
    ];
}
