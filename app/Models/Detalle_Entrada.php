<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleEntrada extends Model
{
    use HasFactory;

    protected $table = 'detalleEntradas'; // Nombre de la tabla en la base de datos

    // Campos permitidos para asignación masiva
    protected $fillable = [
        'entradaId',
        'productoCodigo',
        'cantidad',
    ];

    // Relación: Un detalle de entrada pertenece a una entrada
    public function entrada()
    {
        return $this->belongsTo(entrada::class, 'entradaId');
    }

    // Relación: Un detalle de entrada está asociado a un producto
    public function producto()
    {
        return $this->belongsTo(Producto::class, 'productoCodigo', 'codigo');
    }
}
