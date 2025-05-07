<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    // Nombre de la tabla en la base de datos
    protected $table = 'pedidos';

    // Especificar la clave primaria
    protected $primaryKey = 'id_pedido';

    // Permitir asignación masiva en estos campos
    protected $fillable = [
        'fecha', 'monto', 'descripcion', 'id_cliente', 'estado'
    ];

    // Relación con el modelo Cliente
    public function cliente()
    {
        return $this->belongsTo(Clientes::class, 'id_cliente');
    }

    public $timestamps = true;
}

