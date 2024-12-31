<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    use HasFactory;

    protected $table = 'estados'; // Especificar la tabla si no sigue la pluralización.
    protected $fillable = ['nombre']; // Campos que se pueden asignar masivamente

    // Relación: Un estado tiene muchos usuarios
    public function usuarios()
    {
        return $this->hasMany(User::class, 'estadoId');
    }
}
