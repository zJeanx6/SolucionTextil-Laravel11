<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Talla extends Model
{
    use HasFactory;

    protected $table = 'tallas'; // Especificar la tabla si no sigue la pluralización predeterminada
    protected $fillable = ['talla']; // Definir los campos que pueden ser asignados masivamente

    // Una talla esta en muchos productos
    public function productos()
    {
        return $this->hasMany(Producto::class, 'tallaId');
    }
}
