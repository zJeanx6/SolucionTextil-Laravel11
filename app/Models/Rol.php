<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rol extends Model
{
    use HasFactory;
    
    protected $table = 'roles'; // Nombre de la tabla (opcional si sigue el estándar de Laravel)
    protected $fillable = ['nombre']; // Campos que se pueden asignar masivamente, id no es necesario ya que es auto-increment.
    
    // Relación: Un rol tiene muchos usuarios
    public function usuarios()
    {
        return $this->hasMany(User::class, 'rolId');
    }
}
