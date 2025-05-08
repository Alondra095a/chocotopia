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

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
    $pedidosPendientes = Pedido::where('estado', 'pendiente')->get();
    $productos = Producto::all();
    $chocolates = Chocolate::with('producto')->get();
    $dulces = Dulce::with('producto')->get();
    $especiales = Especial::with('producto')->get();

    // NUEVO: relaciones para las demás tarjetas
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

    return view('home', compact(
        'pedidosPendientes', 'productos', 'chocolates', 'dulces', 'especiales',
        'clientes', 'empleados', 'proveedores', 'materias', 'producciones'
    ));
    }

}
