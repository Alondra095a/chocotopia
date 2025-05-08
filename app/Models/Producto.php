<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Producto extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'productos';
    protected $primaryKey = 'id_producto';

    protected $fillable = [
        'nombre_producto',
        'presentacion',
        'stock',
        'id_materia',
        'precio',
        'descripcion',
        'imagen'
    ];

    // Ya no es necesario ocultar deleted_at manualmente, SoftDeletes se encarga de eso
    protected $dates = ['deleted_at']; // <-- Asegura el tratamiento correcto de la fecha

    public function materia()
    {
        return $this->belongsTo(Materias::class, 'id_materia');
    }
}




