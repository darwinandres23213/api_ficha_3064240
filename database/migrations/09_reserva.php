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
        Schema::create('reservas', function (Blueprint $table) {
            $table->id();
            $table->dateTime("fecha_reserva");
            $table->unsignedTinyInteger("cantidad_personas");
            $table->decimal("anticipo")->nullatable();
            $table->text("observaciones")->nullatable();
            $table->enum("estado",["pendiente", "cancelada","asistio"]);
            $table->timestamps();

            $table->unsignedBigInteger("clientes_id");

            $table->foreign("clientes_id")->references("id")->on("clientes")->onDelete("cascade");

            $table->unsignedBigInteger("mesas_id");

            $table->foreign("mesas_id")->references("id")->on("mesas")->onDelete("cascade");

            $table->unsignedBigInteger("eventos_id");

            $table->foreign("eventos_id")->references("id")->on("eventos")->onDelete("cascade");

            $table->unsignedBigInteger("empleados_id");

            $table->foreign("empleados_id")->references("id")->on("empleados")->onDelete("cascade");
        

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("reservas"); 
    }
    
};
