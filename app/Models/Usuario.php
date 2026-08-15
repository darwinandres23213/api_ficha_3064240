<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usuario extends Model
{
    use HasFactory; // HasFactory se va a encargar de crear los datos de prueba para la tabla usuarios

    protected $table = "usuarios"; // Especificamos el nombre de la tabla que va a usar este modelo

    protected $fillable = [ // Definimos los campos
        "rol_id",
        "nombre",
        "email",
        "password",
        "telefono",
        "estado" // 1, 0
    ];

    protected $casts = [
        "estado" => "boolean" // true, false
    ];

    public function rol()
    {
        return $this->belongsTo(Rol::class); // Un usuario pertenece a un rol
    }

    public function empleado()
    {
        return $this->hasOne(Empleado::class); // Un usuario tiene un empleado
    }
}
