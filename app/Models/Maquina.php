<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Maquina extends Model
{
    use HasFactory;

    protected $table = 'maquinas';  // Nombre de la tabla

    protected $primaryKey = 'serial';  // La clave primaria es 'serial'

    protected $fillable = [
        'serial',
        'marcaId',
        'tiposMaquinasId',
        'estadoId',
        'proveedorNit',
    ];

    // Relación: Una máquina tiene muchos mantenimientos
    public function mantenimientos()
    {
        return $this->hasMany(MantenimientoMaquinas::class, 'serialId', 'serial');
    }

    // Relación: Una máquina pertenece a una marca
    public function marca()
    {
        return $this->belongsTo(Marca::class, 'marcaId');
    }

    // Relación: Una máquina pertenece a un tipo
    public function tipo()
    {
        return $this->belongsTo(TipoMaquina::class, 'tiposMaquinasId');
    }

    // Relación: Una máquina tiene un estado
    public function estado()
    {
        return $this->belongsTo(Estado::class, 'estadoId');
    }

    // Relación: Una máquina tiene un proveedor
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'proveedorNit', 'nit');
    }
}
