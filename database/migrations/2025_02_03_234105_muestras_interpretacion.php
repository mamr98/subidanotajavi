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
        Schema::create('muestras_interpretacion', function (Blueprint $table) {
            $table->id();
            $table->string('calidad');
            $table->unsignedBigInteger('idMuestras');
            $table->unsignedBigInteger('idInterpretacion');
            $table->timestamps();

            $table->foreign('idMuestras')->references('id')->on('muestras');
            $table->foreign('idInterpretacion')->references('id')->on('interpretacion');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
