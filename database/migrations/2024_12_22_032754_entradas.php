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
        Schema::create('entradas', function (Blueprint $table){
            $table->id();
            $table->datetime('fecha');
            $table->unsignedBigInteger('usuarioId')->nullable();
            $table->timestamps();

            $table->foreign('usuarioId')->references('id')->on('usuarios')->onDelete('set null');
        });

        Schema::create('detalleEntradas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('entradaId')->nullable();
            $table->string('productoCodigo')->nullable();
            $table->integer('cantidad');
            $table->timestamps();

            $table->foreign('entradaId')->references('id')->on('entradas')->onDelete('set null');
            $table->foreign('productoCodigo')->references('codigo')->on('productos')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('entradas');
        Schema::dropIfExists('detalleEntradas');
    }
};
