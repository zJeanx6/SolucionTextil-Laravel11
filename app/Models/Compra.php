<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $table = 'compras'; //Nombre de la tabla (opcional si sigue el estándar de Laravel)
    protected $fillable = ['fecha', 'proveedorNit']; //Campos que se pueden asignar masivamente, id no es necesario ya que es auto-increment

    // Relación: Una compra tiene muchos detalles
    public function detalleCompras()
    {
        return $this->hasMany(DetalleCompra::class, 'compraId');
    }
}
