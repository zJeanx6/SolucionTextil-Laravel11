<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MantenimientoMaquinas extends Model
{
    use HasFactory;

    protected $table = 'mantenimientoMaquinas';  // Especificar el nombre de la tabla

    protected $fillable = [
        'usuarioId',   // El ID del usuario que realizó el mantenimiento
        'fecha',        // La fecha del mantenimiento
        'serialId',     // El serial de la máquina
        'estadoId',     // El estado del mantenimiento
        'descripcion',  // Descripción del mantenimiento
    ];

    // Relación: Un mantenimiento de máquina pertenece a un usuario
    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuarioId'); // Relación con la tabla usuarios
    }

    // Relación: Un mantenimiento de máquina pertenece a una máquina
    public function maquina()
    {
        return $this->belongsTo(Maquina::class, 'serialId', 'serial'); // Relación con la tabla maquinas
    }

    // Relación: Un mantenimiento de máquina tiene un estado
    public function estado()
    {
        return $this->belongsTo(Estado::class, 'estadoId'); // Relación con la tabla estados
    }
}
