<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    // Definir el nombre de la tabla si es diferente al nombre plural del modelo
    protected $table = 'proveedores';

    // Especificar la clave primaria
    protected $primaryKey = 'id_proveedor';

    // Indicar que la clave primaria no es un número autoincrementable si fuera necesario
    public $incrementing = true;  // Se asume que el id_proveedor es un entero autoincrementable

    // Definir las columnas que pueden ser llenadas masivamente
    protected $fillable = [
        'id_persona', 'tipo_materia', 'cantidad',
    ];

    // Relación con la tabla personas
    public function persona()
    {
        return $this->belongsTo(Personas::class, 'id_persona');
    }
}

