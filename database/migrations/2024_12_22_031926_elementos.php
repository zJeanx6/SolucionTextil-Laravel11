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
        Schema::create('elementos', function (Blueprint $table) {
            $table->string('codigo')->primary();
            $table->string('nombre');
            $table->string('colorId')->nullable();
            $table->unsignedBigInteger('tipoElementoId')->nullable(); 
            $table->decimal('ancho', 5, 2)->nullable();
            $table->decimal('largo', 5, 2)->nullable();
            $table->integer('existencias');
            $table->string('imagen')->nullable();
            $table->timestamps();
            
            $table->foreign('colorId')->references('codigo')->on('colores')->onDelete('set null');
            $table->foreign('tipoElementoId')->references('id')->on('tiposElementos')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('elementos');
    }
};
