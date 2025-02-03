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
        Schema::create('imagen', function (Blueprint $table) {
            $table->id();
            $table->string('ruta');
            $table->enum('zoom', ['4','10','40','100']); 
            $table->timestamps();
            $table->softDeletes();
        });
    }
    
    // Datos a tener en cuenta para el formulario
    // *****   Tendrá x valores y ya, tanto ruta como zoom    *****
    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
