<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Usuario extends Model
{
    use HasFactory;

    protected $table = "usuarios";

    protected $fillable = [
        "rol_id",
        "nombre",
        "email",
        "password",
        "telefono",
        "estado"
    ];

    protected $casts = [
        "estado" => "boolean"
    ];

    public function rol()
    {
        return $this->belongsTo(Rol::class);
    }

    public function empleado()
    {
        return $this->hasOne(Empleado::class);
    }
}