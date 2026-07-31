<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Producto extends Model
{
   use HasFactory; // se encarga de crear datos de prueba 

   protected $table = "producto"; // nombre de la tabla

   protected $fillable = [ // define los campos
      'categoria_id',
      'proveedor_id',
      'codigo',
      'nombre',
      'descripcion',
      'precio_venta',
      'precio_compra'
   ];

   public function categoria()
   {
      return $this->belongsTo(categoria_producto::class);
   }

   public function proveedor()
   {
      return $this->belongsTo(Proveedor::class);
   }
   public function inventario()
   {
      return $this->hasMany(Inventario::class);
   }
   public function detalleVenta()
   {
      return $this->hasOne(Detalle_venta::class);
   }
}
