<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoElemento extends Model
{
    use HasFactory;

    protected $table = 'tiposElementos'; // Especificar la tabla si no sigue la pluralización predeterminada
    protected $fillable = ['nombre',]; // Definir los campos que pueden ser asignados masivamente
    
}
