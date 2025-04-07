<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model; 
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Producto extends Model
{
    use HasFactory;

    protected $table = 'productos';
    protected $primaryKey = 'id_producto';

    protected $fillable = [
        'nombre_producto',
        'presentacion',
        'stock',
        'id_materia',
    ];

    protected $hidden = ['deleted_at'];

    public function materia()
    {
        return $this->belongsTo(Materias::class, 'id_materia');
    }
}


