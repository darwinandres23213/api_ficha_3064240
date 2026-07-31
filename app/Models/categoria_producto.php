<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class categoria_producto extends Model
{
    use HasFactory;
    
    protected $table="categoria_producto";

    protected $fillable =[

            'nombre',
            'descripcion',
            'estado',


    ];

     protected $casts =[
         'estado'  => 'boolean'//valores 1 o 2


     ];



}


