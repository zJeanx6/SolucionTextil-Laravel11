<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salida extends Model
{
    use HasFactory;

    protected $table = 'salidas'; // Especificar la tabla si no sigue la pluralización predeterminada

    // Definir los campos que pueden ser asignados masivamente
    protected $fillable = [
        'fecha',
    ];

    // Relación: Una salida tiene muchos detalles de salida
    public function detalles()
    {
        return $this->hasMany(DetalleSalida::class, 'salidaId');
    }
}
