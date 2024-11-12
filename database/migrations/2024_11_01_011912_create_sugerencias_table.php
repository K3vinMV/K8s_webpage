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
        Schema::create('sugerencias', function (Blueprint $table) {
            $table->id();
            $table->string('titulo');
            $table->text('justificacion');
            $table->timestamps();
        });

        Schema::create('archivos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sugerencia_id');
            $table->string('archivo');
            $table->foreign('sugerencia_id')->references('id')->on('sugerencias')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('archivos');
        Schema::dropIfExists('sugerencias');
    }
};
