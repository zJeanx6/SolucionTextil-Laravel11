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
        Schema::create('maquinas', function (blueprint $table) {
            $table->string('serial')->primary();
            $table->unsignedBigInteger('marcaId')->nullable();
            $table->unsignedBigInteger('tiposMaquinasId')->nullable();
            $table->unsignedBigInteger('estadoId')->nullable();
            $table->string('proveedorNit')->nullable();
            $table->timestamps();

            $table->foreign('marcaId')->references('id')->on('marcas')->onDelete('set null');
            $table->foreign('tiposMaquinasId')->references('id')->on('tiposMaquinas')->onDelete('set null');
            $table->foreign('estadoId')->references('id')->on('estados')->onDelete('set null');
            $table->foreign('proveedorNit')->references('nit')->on('proveedores')->onDelete('set null');
        });

        Schema::create('mantenimientoMaquinas', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('usuarioId')->nullable();
            $table->datetime('fecha');
            $table->string('serialId')->nullable();
            $table->unsignedBigInteger('estadoId')->nullable();
            $table->text('descripcion')->nullable();
            $table->timestamps();

            $table->foreign('serialId')->references('serial')->on('maquinas')->onDelete('set null');
            $table->foreign('usuarioId')->references('id')->on('usuarios')->onDelete('set null');
            $table->foreign('estadoId')->references('id')->on('estados')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maquinas');
        Schema::dropIfExists('mantenimientoMaquinas');
    }
};
