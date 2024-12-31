<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleCompra extends Model
{
    use HasFactory;

    protected $table = 'detalleCompras'; // Nombre de la tabla en la base de datos

    // Campos permitidos para asignación masiva
    protected $fillable = [
        'compraId',
        'elementoCodigo',
        'cantidad',
    ];

    // Relación: Un detalle de compra pertenece a una compra
    public function compra()
    {
        return $this->belongsTo(Compra::class, 'compraId');
    }

    // Relación: Un detalle de compra está asociado a un elemento
    public function elemento()
    {
        return $this->belongsTo(Elemento::class, 'elementoCodigo', 'codigo');
    }
}
