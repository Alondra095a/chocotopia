<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class Dulce extends Model
{
    use HasFactory;
    protected $table = 'dulces';
    protected $primaryKey = 'id_dulce';

    protected $fillable = [
        'dureza',
        'colorante',
        'id_producto'
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }
}