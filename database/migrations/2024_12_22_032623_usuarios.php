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
        Schema::create('usuarios', function (Blueprint $table) {
            $table->id();  // Crea una columna 'id' que será la clave primaria de la tabla.
            $table->string('nombre');  // Crea una columna 'name' de tipo string.
            $table->string('apellido');  // Crea una columna 'email' de tipo string y establece que debe ser único.
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();  // Crea una columna de tipo timestamp para verificar cuándo se verificó el correo electrónico.
            $table->string('contacto')->nullable();
            $table->string('password');
            $table->rememberToken();  // Crea una columna 'remember_token' que se usa para recordar al usuario (como un token de sesión persistente).
            $table->unsignedBigInteger('estadoId')->nullable();
            $table->unsignedBigInteger('rolId')->nullable();;
            $table->timestamps();  // Crea dos columnas: 'created_at' y 'updated_at' para manejar la fecha de creación y actualización de los registros.

            $table->foreign('estadoId')->references('id')->on('estados')->onDelete('set null');
            $table->foreign('rolId')->references('id')->on('roles')->onDelete('set null');
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();  // Establece la columna 'email' como clave primaria.
            $table->string('token');  // Crea una columna 'token' que almacenará el token generado para restablecer la contraseña.
            $table->timestamp('created_at')->nullable();  // Crea una columna 'created_at' para almacenar el tiempo de creación del token.
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();  // Crea una columna 'id' que será la clave primaria de la tabla. Es probable que esta columna almacene el ID de la sesión.
            $table->foreignId('user_id')->nullable()->index();  // Crea una columna 'user_id' que puede ser nula, y es una clave foránea que hace referencia al 'id' de la tabla 'users'. También se agrega un índice para mejorar las búsquedas.
            $table->string('ip_address', 45)->nullable();  // Crea una columna 'ip_address' que almacena la dirección IP del usuario. Se establece un límite de 45 caracteres (para direcciones IPv6).
            $table->text('user_agent')->nullable();  // Crea una columna 'user_agent' que almacena información sobre el navegador y sistema operativo del usuario.
            $table->longText('payload');  // Crea una columna 'payload' que almacena los datos de la sesión en formato largo (puede contener grandes cantidades de datos).
            $table->integer('last_activity')->index();  // Crea una columna 'last_activity' que almacena la última actividad en la sesión, y se agrega un índice para mejorar la búsqueda.
        });

        Schema::create('iniciosSesion', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('usuarioId')->nullable();
            $table->datetime('fecha');
            $table->timestamps();

            $table->foreign('usuarioId')->references('id')->on('usuarios')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('usuarios');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
        Schema::dropIfExists('iniciosSesion');
    }
};
