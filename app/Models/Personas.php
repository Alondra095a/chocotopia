<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personas extends Model
{
    use HasFactory;

    protected $table = 'personas'; // La tabla en la base de datos es 'personas' (plural).


    // Definir la clave primaria
    protected $primaryKey = 'id_persona';

    // Si no estás usando un campo `id` como primaryKey, deshabilita el auto-incremento
    public $incrementing = false;

    // Definir los campos que son asignables en masa
    protected $fillable = [
        'nombre',
        'a_paterno',
        'a_materno',
        'telefono',
    ];

    // Si no deseas manejar los timestamps automáticamente (created_at y updated_at)
    // puedes deshabilitarlos, aunque en tu caso no es necesario.
    public $timestamps = true;
    public function clientes()
    {
        return $this->hasMany(Cliente::class, 'id_persona', 'id_persona');
    }
    public function empleados()
    {
        return $this->hasMany(Empleado::class, 'id_persona');
    }
}
