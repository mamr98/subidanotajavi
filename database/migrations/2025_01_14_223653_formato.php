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
        Schema::create('formato', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('codigo');
            $table->timestamps();
            $table->softDeletes();
        });
    }
    // Datos a tener en cuenta para el formulario
    // *****     Para saber en que formato esta, si etanol, si formol o fresco       *****


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
