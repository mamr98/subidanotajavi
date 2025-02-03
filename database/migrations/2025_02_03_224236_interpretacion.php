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
            $table->string('texto');
            $table->timestamps();
            $table->softDeletes();
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
