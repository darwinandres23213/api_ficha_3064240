<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class empleado extends Model
{

    use HasFactory;

    protected $table="empleado";

    protected $fillable  =[

     "documento",
     "nombres",
     "apellidos",
     "cargo",
     "fecha_ingreso",
     "salario",
     "estado",
     "usuario_id",

];

  
    public function usuarios()

    {
        return $this-belongsTo(usuarios::class);
    }

     public function reservas()

    {
        return $this-hasmany(reservas::class);
    }

      public function ventas()

    {
        return $this-hasmany(ventas::class);
    }



}




