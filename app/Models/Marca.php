<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;

    // Especificar la tabla, si es necesario (en este caso, 'marcas' es el nombre por defecto)
    protected $table = 'marcas';

    // Campos que pueden ser asignados masivamente
    protected $fillable = ['nombre'];

    // Relación: Una marca tiene muchas máquinas
    public function maquinas()
    {
        return $this->hasMany(Maquina::class, 'marcaId'); // Suponiendo que 'marcaId' es la clave foránea en la tabla 'maquinas'
    }
}
