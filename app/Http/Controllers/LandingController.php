<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Promocion;

class LandingController extends Controller
{
    public function index()
    {
        $productos = Producto::whereNull('deleted_at')->latest()->get();

        $promociones = Promocion::join('productos', 'promociones.id_producto', '=', 'productos.id_producto')
            ->whereDate('promociones.fecha_inicio', '<=', now())
            ->whereDate('promociones.fecha_fin', '>=', now())
            ->select('promociones.*', 'productos.imagen as imagen_producto')
            ->get();

        return view('welcome', compact('productos', 'promociones'));
    }
}
