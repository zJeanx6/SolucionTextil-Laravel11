<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetallePrestamo extends Model
{
    use HasFactory;

    protected $table = 'detallePrestamos'; // Nombre de la tabla en la base de datos

    // Campos permitidos para asignación masiva
    protected $fillable = [
        'prestamoId',
        'elementoCodigo',
        'cantidad',
    ];

    // Relación: Un detalle de prestamo pertenece a una prestamo
    public function prestamo()
    {
        return $this->belongsTo(prestamo::class, 'prestamoId');
    }

    // Relación: Un detalle de prestamo está asociado a un elemento
    public function elemento()
    {
        return $this->belongsTo(Elemento::class, 'elementoCodigo', 'codigo');
    }
}

