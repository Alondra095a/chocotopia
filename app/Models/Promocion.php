<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Promocion extends Model
{
    use SoftDeletes;

    protected $table = 'promociones'; 
    protected $primaryKey = 'id_promocion';
    protected $fillable = [
    'titulo', 'descripcion', 'valor',
    'fecha_inicio', 'fecha_fin', 'id_producto', 'imagen'
];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }
}

