<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoProducto extends Model
{
    use HasFactory;

    protected $table = 'tiposProductos'; // Especificar la tabla si no sigue la pluralización predeterminada
    protected $fillable = ['nombre',]; // Definir los campos que pueden ser asignados masivamente
    
}
