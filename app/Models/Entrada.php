<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Entrada extends Model
{
    use HasFactory;

    protected $table = 'entradas'; // Especificar la tabla si no sigue la pluralización.

    // Campos permitidos para asignación masiva
    protected $filalable = [
        'fecha',
        'usuarioId',
    ];

    // Relación: Una entrada pertenece a un usuario
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuarioId');
    }
}
