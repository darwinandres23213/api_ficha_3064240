<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Iluminate\Database\Factories\HasFactory;

class Evento extends Model
{
    use HasFactory; //HasFactory se va encargar de crear datos de prueba

    protected $table="eventos"; //Escribimos como se llama la tabla en la base de datos

    protected $fillable =[ //Definimos los campos
        "nombre",
        "descripcion",
        "fecha_inicio",
        "fecha_fin",
        "aforo",
        "precio_entrada",
        "estado",
        "zonas_id",
        "dj_artistas_id"

    ];

    protected $casts =[
        'estado' => 'boolean' //true, false
        
    ];

    public function reservas()
    {
        return$this->hasMany(reserva::class);
    }

      public function promociones()
    {
        return$this->hasMany(promocion::class);
    }

        public function zona()
    {
        return$this->belongsTo(zona::class);
    }

      public function dj()
    {
        return$this->belongsTo(Dj::class);
    }





}
