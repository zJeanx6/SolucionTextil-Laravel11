<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InicioSesion extends Model
{
    use HasFactory;

    protected $table = 'iniciosSesion'; // Nombre de la tabla (opcional si sigue el estándar de Laravel)
    
    // Campos que se pueden asignar masivamente, id no es necesario ya que es auto-increment.
    protected $fillable = [
        'fecha',
        'usuarioId',
    ];

    // Relación: Un Inicio de sesión pertenece a un Usuario
    public function usuario()
    {
        // Aquí, la relación debe ser belongsTo, ya que cada inicio de sesión pertenece a un solo usuario
        return $this->belongsTo(User::class, 'usuarioId');
    }
}
