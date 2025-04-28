<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Chocolate extends Model
{
    use HasFactory;
    protected $table = 'chocolates';
    protected $primaryKey = 'id_choc';

    protected $fillable = [
        'relleno', 
        'id_producto'
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }
}
