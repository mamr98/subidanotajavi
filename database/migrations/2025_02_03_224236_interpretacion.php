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
        Schema::create('interpretacion', function (Blueprint $table) {
            $table->id();
            $table->string('texto', 2550);
            $table->unsignedBigInteger('idTipoEstudio');
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('idTipoEstudio')->references('id')->on('tipo_estudio');
        });
    }

    // Datos a tener en cuenta para el formulario
    // *****        Un select con el tipo de interpretación que se debe de tener                    *****

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
