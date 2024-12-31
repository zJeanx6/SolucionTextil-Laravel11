<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    use HasFactory;

    protected $table = 'colores'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'codigo'; // Clave primaria personalizada ya que no es 'id'
    public $incrementing = false; // 'id' no es auto-incremental por ser string
    protected $keyType = 'string'; // Tipo de dato de la clave primaria
    protected $fillable = ['codigo', 'nombre']; // Campos permitidos para inserción masiva

    public function elementos()
    {
        return $this->hasMany(elemento::class, 'colorId');
    }
}
