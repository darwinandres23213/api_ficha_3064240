<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Venta extends Model

{
    use HasFactory; //HasFactory se va encargar de crear datos de prueba

    protected $table="ventas"; //Escribimos como se llama la tabla en la base de datos

    protected $fillable = [ //Definimos los campos

        'nombre',
        'descripcion',
        'fecha_inicio',
        'echa_fin',
        'aforo',
        'precio_entrada',
        'programado","en_curso","finalizado","cancelado',
        'zonas_id',
        'dj_artistas_id',
        'zonas_id',     

];

public function cliente(){
    return $this->belongsTo(Cliente::class);
}

public function empleado(){
    return $this->belongsTo(Empleado::class);
}

public function mesa(){
    return $this->belongsTo(Mesa::class);
}

public function promocion(){
    return $this->belongsTo(Promocion::class);

}

public function detalle_venta(){
    return $this->hasMany(detalle_venta::class);

}

public function pagos(){
    return $this->hasMany(Pagos::class);
}

}