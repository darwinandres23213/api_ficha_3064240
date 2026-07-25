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
        Schema::table('empleados', function (Blueprint $table) {
            $table->bigIncrements("id");
            $table->string("documento", 20);
            $table->string("nombres", 80);
            $table->string("apellidos",80);
            $table->string("cargo",60);
            $table->date("fecha_ingreso");
            $table->decimal("salario",12,2)->nullable();
            $table->enum("tipo","regular","vip","corporativo");
            $table->timestamps()->nullable();
            
            
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
