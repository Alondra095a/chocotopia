<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Especial extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'especiales';
    protected $primaryKey = 'id_especial';

    protected $fillable = [
        'descripcion',
        'tipo',
        'id_producto',
    ];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'id_producto');
    }
}
