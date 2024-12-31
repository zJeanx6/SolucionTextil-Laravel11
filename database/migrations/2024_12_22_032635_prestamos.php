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
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id();
            $table->datetime('fecha');
            $table->unsignedBigInteger('usuarioId')->nullable();
            $table->timestamps();
            
            $table->foreign('usuarioId')->references('id')->on('usuarios')->onDelete('set null');
        });

        Schema::create('detallePrestamos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('prestamoId')->nullable();
            $table->string('elementoCodigo')->nullable();
            $table->integer('cantidad');
            $table->timestamps();

            $table->foreign('prestamoId')->references('id')->on('prestamos')->onDelete('set null');
            $table->foreign('elementoCodigo')->references('codigo')->on('elementos')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestamos');
        Schema::dropIfExists('detallePrestamos');
    }
};
