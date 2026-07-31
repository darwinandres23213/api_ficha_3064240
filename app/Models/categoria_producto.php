<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\factories\Hasfactory;


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
         'estado'  => 'boolean'//true,false 


     ];
     public function productos()
    {
        return $this->hasMany(Producto::class);
    }

}


