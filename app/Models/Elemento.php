<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Elemento extends Model
{
    use HasFactory;

    protected $table = 'elementos';  // Especificar la tabla si no sigue la pluralización.
    protected $primaryKey = 'codigo'; // Clave primaria personalizada ya que no es 'id'.
    public $incrementing = false; // 'id' no es auto-incremental por ser string.
    protected $keyType = 'string'; // Tipo de dato de la clave primaria.
    // Campos permitidos para asignación masiva
    protected $fillable = [
        'nombre',
        'colorId',
        'tipoElementiId',
        'ancho',
        'largo',
        'existencias',
        'imagen',
    ];

    // Relación: Un usuario pertenece a un rol
    public function color()
    {
        return $this->belongsTo(Color::class, 'colorId');
    }

    // Relación: Un elemento tiene un color
    public function tipoElemento()
    {
        return $this->belongsTo(TipoElemento::class, 'tipoElementoId');
    }
}
