<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory; 

    protected $table="roles"; 

    protected $fillable =[ 
        'nombre',
        'descripcion',
        'estado', //1, 0
    ];

    protected $casts =[
        'estado' => 'boolean' 
    ];



}
