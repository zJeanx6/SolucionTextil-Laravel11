<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;


    protected $table = 'productos';  // Especificar la tabla si no sigue la pluralización predeterminada
    protected $primaryKey = 'codigo';  // Especificar la clave primaria, ya que es un campo diferente al id por defecto
    public $incrementing = false; // 'id' no es auto-incremental por ser string
    protected $keyType = 'string';  // Indicar que la clave primaria es un string

    // Campos que pueden ser asignados masivamente
    protected $fillable = [
        'codigo',
        'nombre',
        'tallaId',
        'colorId',
        'tipoProductoId',
        'existencias',
        'imagen',
    ];

    // Relación: Un producto pertenece a una talla
    public function talla()
    {
        return $this->belongsTo(Talla::class, 'tallaId');
    }

    // Relación: Un producto pertenece a un color
    public function color()
    {
        return $this->belongsTo(Color::class, 'colorId', 'codigo');
    }

    // Relación: Un producto pertenece a un tipo de producto
    public function tipoProducto()
    {
        return $this->belongsTo(TipoProducto::class, 'tipoProductoId');
    }
}
