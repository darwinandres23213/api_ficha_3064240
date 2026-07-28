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
        Schema::create('eventos', function (Blueprint $table) {
            $table->id();
            $table->string("nombre",120);
            $table->text("descripcion")->nullable();
            $table->datetime("fecha_inicio");
            $table->datetime("fecha_fin");
            $table->unsignedInteger("aforo");
            $table->decimal("precio_entrada");
            $table->enum("estado", ["programado","en_curso","finalizado","cancelado"]);
            $table->timestamps();
            $table->unsignedBigInteger("zonas_id");
            $table->unsignedBigInteger("dj_artistas_id");


             $table->foreign("zonas_id")->references("id")->on("zonas")->onDelete("cascade");
              $table->foreign("dj_artistas_id")->references("id")->on("djs_artistas")->onDelete("cascade");

           
            //
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists("eventos");
    }
};
