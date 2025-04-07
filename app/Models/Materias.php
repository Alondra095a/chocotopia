<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Materias extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'materias'; // Nombre de la tabla en la BD
    protected $primaryKey = 'id_materia'; // Clave primaria

    protected $fillable = [
        'nombre_materia',
        'cantidad',
        'id_proveedor'
    ];

    /**
     * Relación con el modelo Proveedores.
     * Un material pertenece a un proveedor.
     */
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class, 'id_proveedor', 'id_proveedor');
    }
}
