<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Clientes extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'clientes';
    protected $primaryKey = 'id_cliente';
    public $timestamps = true;

    protected $fillable = [
        'id_persona',
        'tipo',
    ];

    public function persona()
    {
        return $this->belongsTo(Personas::class, 'id_persona');
    }
    public function pedido()
    {
        return $this->hasMany(Pedidos::class, 'id_cliente');
    }
}

