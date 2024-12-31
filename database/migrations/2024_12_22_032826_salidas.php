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
        Schema::create('salidas', function (Blueprint $table) {
            $table->id();
            $table->datetime('fecha');
            $table->timestamps();
        });

        Schema::create('detalleSalidas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('salidaId')->nullable();
            $table->string('productoCodigo')->nullable();
            $table->integer('cantidad');
            $table->timestamps();

            $table->foreign('salidaId')->references('id')->on('salidas')->onDelete('set null');
            $table->foreign('productoCodigo')->references('codigo')->on('productos')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('salidas');
        Schema::dropIfExists('detalleSalidas');
    }
};
