<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;

    // Nombre de la tabla en la base de datos
    protected $table = 'prestamos';

    // Campos que pueden ser asignados masivamente
    protected $fillable = [
        'fecha',
        'usuarioId',
    ];

    // Relación: Un préstamo pertenece a un usuario
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuarioId');
    }

    // Relación: Un préstamo tiene muchos detalles (detallePrestamos)
    public function detallePrestamos()
    {
        return $this->hasMany(DetallePrestamo::class, 'prestamoId');
    }
}
