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
        Schema::create('empleado', function (Blueprint $table) {
            $table->id();
            $table->string("documento", 20);
            $table->string("nombres", 80);
            $table->string("apellidos",80);
            $table->string("cargo",60);
            $table->date("fecha_ingreso");
            $table->decimal("salario");
            $table->enum("tipo",["regular","vip","corporativo"]);
            $table->timestamps();
            $table->unsignedBigInteger("usuario_id");

            $table->foreign("usuario_id")->references("id")->on("usuarios")->onDelete("cascade");
            
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema:: dropIfExists('empleados');
        
    }
};
