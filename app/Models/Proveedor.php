<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    protected $table = 'proveedores'; // Especificar la tabla si no sigue la pluralización predeterminada
    protected $primaryKey = 'nit'; // Especificar la clave primaria, en este caso 'nit'
    public $incrementing = false; // Indicar que la clave primaria no es auto-incremental

    // Definir los campos que pueden ser asignados masivamente
    protected $fillable = [
        'nit',
        'nombre',
        'contacto',
        'email',
    ];

    // Si necesitas agregar más relaciones en el futuro, puedes hacerlo aquí.
    // Ejemplo:
    // Relación: Un proveedor tiene muchos productos
    // public function productos()
    // {
    //     return $this->hasMany(Producto::class, 'proveedor_nit');
    // }
}
