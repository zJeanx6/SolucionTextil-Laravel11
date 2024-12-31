<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleSalida extends Model
{
    use HasFactory;

    protected $table = 'detalleSalidas'; // Nombre de la tabla en la base de datos

    // Campos permitidos para asignación masiva
    protected $fillable = [
        'salidaId',
        'productoCodigo',
        'cantidad',
    ];

    // Relación: Un detalle de salida pertenece a una salida
    public function salida()
    {
        return $this->belongsTo(Salida::class, 'salidaId');
    }    

    // Relación: Un detalle de salida está asociado a un producto
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'productoCodigo', 'codigo');
    }
}
