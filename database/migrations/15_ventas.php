<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->id();
            $table->string("numero_factura",30)->unique();
            $table->datetime("fecha_venta",0);
            $table->decimal("subtotal",12,2);
            $table->decimal("descuento",12,2);
            $table->decimal("total",12,5);
            $table->enum("estado", ['abierta', 'pagada', 'anulada']);
            $table->timestamps();

            $table->unsignedBigInteger("clientes_id");
            $table->unsignedBigInteger("empleados_id");
            $table->unsignedBigInteger("mesas_id");
            $table->unsignedBigInteger("promociones_id");

            $table->foreign("clientes_id")->references("id")->on("clientes")->onDelete("cascade");
            $table->foreign("empleados_id")->references("id")->on("empleados")->onDelete("cascade");
            $table->foreign("mesas_id")->references("id")->on("mesas")->onDelete("cascade");
            $table->foreign("promociones_id")->references("id")->on("promociones")->onDelete("cascade");
        
            

            
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void

    {
        Schema::table('ventas', function (Blueprint $table) {
            //
        });
    }
};
