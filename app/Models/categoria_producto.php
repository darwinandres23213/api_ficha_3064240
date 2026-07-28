<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class categoria_producto extends Model
{
    use Hasfactory;
    
    protected $table="categoria_producto";

    protected $fillable =[

            'nombre',
            'descripcion',
            'estado',


    ];

     protected $casts =[
         'estado'  => 'boolean'


     ];



}


