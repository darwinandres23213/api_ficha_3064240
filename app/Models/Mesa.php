<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mesa extends Model
{
    use HasFactory;

    protected $table="mesas";

    protected $fillable =[
        "numero",
        "capacidad",
        "tipo",
        "estado", //1, 0
        "zona_id"
    ];

    protected $casts =[
        "estado" => "boolean" // true, false
        
    ];
}
