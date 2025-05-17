<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Chocolate;
use App\Models\Dulce;
use App\Models\Especial;
use App\Models\Pedido;
use App\Models\Clientes;
use App\Models\Empleado;
use App\Models\Proveedor;
use App\Models\Materias;
use App\Models\Produccion;
use App\Models\Venta; 
use App\Models\Promocion;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $pedidosPendientes = Pedido::where('estado', 'pendiente')->get();
        $productos = Producto::all();
        $chocolates = Chocolate::with('producto')->get();
        $dulces = Dulce::with('producto')->get();
        $especiales = Especial::with('producto')->get();

        $clientes = Clientes::join('personas', 'clientes.id_persona', '=', 'personas.id_persona')
            ->select('clientes.id_cliente', 'personas.nombre', 'personas.a_paterno', 'personas.a_materno')
            ->get();

        $empleados = Empleado::join('personas', 'empleados.id_persona', '=', 'personas.id_persona')
            ->select('empleados.id_empleado', 'personas.nombre', 'personas.a_paterno', 'personas.a_materno')
            ->get();

        $proveedores = Proveedor::join('personas', 'proveedores.id_persona', '=', 'personas.id_persona')
            ->select('proveedores.id_proveedor', 'personas.nombre', 'personas.a_paterno', 'personas.a_materno')
            ->get();

        $materias = Materias::select('nombre_materia', 'cantidad')->get();

        $producciones = Produccion::join('productos', 'producciones.id_producto', '=', 'productos.id_producto')
            ->select('producciones.fecha', 'producciones.cantidad', 'productos.nombre_producto')
            ->get();

        $totalVentas = Venta::sum('total') ?? 0;

        $promosDashboard = Promocion::join('productos', 'promociones.id_producto', '=', 'productos.id_producto')
            ->whereDate('promociones.fecha_inicio', '<=', now())
            ->whereDate('promociones.fecha_fin', '>=', now())
            ->select('promociones.titulo', 'productos.nombre_producto')
            ->get();

        return view('home', compact(
            'pedidosPendientes', 'productos', 'chocolates', 'dulces', 'especiales',
            'clientes', 'empleados', 'proveedores', 'materias', 'producciones',
            'totalVentas', 'promosDashboard'
        ));
    }
}
