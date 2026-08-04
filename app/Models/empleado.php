<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Empleado extends Model
{
    use HasFactory;

    protected $table = "empleado";

    protected $fillable = [
        "usuario_id",
        "documento",
        "nombres",
        "apellidos",
        "cargo",
        "fecha_ingreso",
        "salario",
        "estado",
    ];

    protected $casts = [
        "fecha_ingreso" => "date",
        "salario"       => "decimal:2",
    ];

    // Un empleado pertenece a (opcionalmente) un usuario del sistema
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    // Un empleado atiende muchas reservas
    public function reservas()
    {
        return $this->hasMany(Reserva::class);
    }

    // Un empleado registra muchas ventas
    public function ventas()
    {
        return $this->hasMany(Venta::class);
    }
}



