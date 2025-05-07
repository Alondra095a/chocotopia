<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produccion extends Model
{
    use SoftDeletes;

    protected $table = 'producciones'; // ← solución

    protected $primaryKey = 'id_produccion';

    protected $fillable = [
        'fecha', 'cantidad', 'id_producto', 'id_empleado'
    ];


    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }

    public function empleado()
    {
        return $this->belongsTo(Empleado::class, 'id_empleado');
    }
}
