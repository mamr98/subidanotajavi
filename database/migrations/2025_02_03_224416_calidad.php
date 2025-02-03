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
        Schema::create('calidad', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    // Datos a tener en cuenta para el formulario
    // *****        El nombre de las calidades son  E1,E2,E3 hasta E9             *****
    // *****        Cambian las letra pero todas del 1 al 9                       *****
                

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
