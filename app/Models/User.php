<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\ResetPasswordNotification;

class User extends Authenticatable
{
    public function sendPasswordResetNotification($token)
{
    $this->notify(new ResetPasswordNotification($token));
}

    use HasFactory, Notifiable;

    // Especificar la tabla si no sigue la pluralización
    protected $table = 'usuarios';  
    
    protected $fillable = [
        'id',
        'nombre',
        'apellido',
        'email',
        'contacto',
        'contrasenaHash',
        'estadoId',
        'rolId',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Relación: Un usuario pertenece a un rol
    public function rol()
    {
        return $this->belongsTo(Rol::class, 'rolId');
    }

    // Relación: Un usuario pertenece a un estado
    public function estado()
    {
        return $this->belongsTo(Estado::class, 'estadoId');
    }

    // Relación: Un usuario tiene muchos inicios de sesión
    public function iniciosSesiones()
    {
        return $this->hasMany(InicioSesion::class, 'usuarioId'); 
    }
}
