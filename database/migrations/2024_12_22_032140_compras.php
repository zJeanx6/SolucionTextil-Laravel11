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
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->datetime('fecha');
            $table->string('proveedorNit')->nullable();
            $table->timestamps();

            $table->foreign('proveedorNit')->references('nit')->on('proveedores')->onDelete('set null');
        });
        
        Schema::create('detalleCompras', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('compraId')->nullable();
            $table->string('elementoCodigo')->nullable();      
            $table->integer('cantidad'); 
            $table->timestamps();
            
            $table->foreign('compraId')->references('id')->on('compras')->onDelete('set null');
            $table->foreign('elementoCodigo')->references('codigo')->on('elementos')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('compras');
        Schema::dropIfExists('detalleCompras');
    }
};
