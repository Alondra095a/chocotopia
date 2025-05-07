<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Producto;
use App\Models\Empleado;
use App\Models\Produccion;
use Illuminate\Http\Request;

class ProduccionController extends Controller
{
    /**
     * Muestra la lista de producciones usando JOINs.
     */
    public function index()
    {
        $producciones = produccion::join('productos', 'producciones.id_producto', '=', 'productos.id_producto')
            ->join('empleados', 'producciones.id_empleado', '=', 'empleados.id_empleado')
            ->join('personas', 'empleados.id_persona', '=', 'personas.id_persona')
            ->select(
                'producciones.id_produccion',
                'producciones.fecha',
                'producciones.cantidad',
                'productos.nombre_producto',
                'personas.nombre as nombre_empleado'
            )
            ->get();

        return view('producciones.index', compact('producciones'));
    }

    /**
     * Muestra el formulario para crear una nueva producción.
     */
    public function create()
    {
        $productos = Producto::all();
        $empleados = Empleado::with('persona')->get();
        return view('producciones.create', compact('productos', 'empleados'));
    }

    /**
     * Guarda una nueva producción.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'cantidad' => 'required|integer|min:1',
            'id_producto' => 'required|exists:productos,id_producto',
            'id_empleado' => 'required|exists:empleados,id_empleado',
        ]);

        Produccion::create($request->all());

        return redirect()->route('producciones.index')->with('success', 'Producción registrada correctamente.');
    }

    /**
     * Muestra el formulario para editar una producción.
     */
    public function edit($id)
    {
        $produccion = Produccion::findOrFail($id);
        $productos = Producto::all();
        $empleados = Empleado::with('persona')->get();
        return view('producciones.edit', compact('produccion', 'productos', 'empleados'));
    }

    /**
     * Actualiza una producción existente.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'fecha' => 'required|date',
            'cantidad' => 'required|integer|min:1',
            'id_producto' => 'required|exists:productos,id_producto',
            'id_empleado' => 'required|exists:empleados,id_empleado',
        ]);

        $produccion = Produccion::findOrFail($id);
        $produccion->update($request->all());

        return redirect()->route('producciones.index')->with('success', 'Producción actualizada correctamente.');
    }

    /**
     * Elimina lógicamente una producción.
     */
    public function destroy($id)
    {
        $produccion = Produccion::findOrFail($id);
        $produccion->delete();

        return redirect()->route('producciones.index')->with('success', 'Producción eliminada correctamente.');
    }
}
