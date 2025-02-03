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
        Schema::create('tipo_estudio', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('descripcion'); 
            $table->timestamps();
            $table->softDeletes();
        });
    }

    // Datos a tener en cuenta para el formulario
    // *****        El nombre del tipo de estudio serían 5 tipos de estudios                   *****
    // *****        La descripción sería pues una descripción                                  *****

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
