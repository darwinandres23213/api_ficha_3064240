<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    protected $table="pagos";

    protected $fillable =[
        'metodo',
        'monto',
        'referencia',
        'fecha_pago',
        'estado' // 1 , 0
    ];
    
    
    protected $casts =[
        'estado' => 'boolean'//true
    ];
}
