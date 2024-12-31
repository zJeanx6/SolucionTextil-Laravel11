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
        Schema::create('productos', function (Blueprint $table){
            $table->string('codigo')->primary(); 
            $table->string('nombre');
            $table->unsignedBigInteger('tallaId')->nullable();
            $table->string('colorId')->nullable();
            $table->unsignedBigInteger('tipoProductoId')->nullable();
            $table->integer('existencias');
            $table->string('imagen')->nullable();
            $table->timestamps();

            $table->foreign('tallaId')->references('id')->on('tallas')->onDelete('set null');
            $table->foreign('colorId')->references('codigo')->on('colores')->onDelete('set null');
            $table->foreign('tipoProductoId')->references('id')->on('tiposProductos')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
