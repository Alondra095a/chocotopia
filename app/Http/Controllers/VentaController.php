<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Venta;
use App\Models\Pedido;
use App\Models\Empleado;

class VentaController extends Controller
{
    public function index()
    {
        $ventas = Venta::join('pedidos', 'ventas.id_pedido', '=', 'pedidos.id_pedido')
            ->join('empleados', 'ventas.id_empleado', '=', 'empleados.id_empleado')
            ->join('personas', 'empleados.id_persona', '=', 'personas.id_persona')
            ->select(
                'ventas.id_venta',
                'ventas.fecha',
                'ventas.total',
                'pedidos.descripcion as pedido',
                'personas.nombre as empleado',
                'personas.a_paterno',
                'personas.a_materno'
            )
            ->whereNull('ventas.deleted_at')
            ->get();

        return view('ventas.index', compact('ventas'));
    }

    public function create()
    {
        $pedidos = Pedido::all();
        $empleados = Empleado::join('personas', 'empleados.id_persona', '=', 'personas.id_persona')
            ->select('empleados.id_empleado', 'personas.nombre', 'personas.a_paterno', 'personas.a_materno')
            ->get();

        return view('ventas.create', compact('pedidos', 'empleados'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'total' => 'required|numeric|min:0',
            'id_pedido' => 'required|exists:pedidos,id_pedido',
            'id_empleado' => 'required|exists:empleados,id_empleado',
        ]);

        Venta::create($request->all());

        return redirect()->route('ventas.index')->with('success', 'Venta registrada exitosamente.');
    }

    public function edit($id)
    {
        $venta = Venta::findOrFail($id);

        $pedidos = Pedido::all();
        $empleados = Empleado::join('personas', 'empleados.id_persona', '=', 'personas.id_persona')
            ->select('empleados.id_empleado', 'personas.nombre', 'personas.a_paterno', 'personas.a_materno')
            ->get();

        return view('ventas.edit', compact('venta', 'pedidos', 'empleados'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'fecha' => 'required|date',
            'total' => 'required|numeric|min:0',
            'id_pedido' => 'required|exists:pedidos,id_pedido',
            'id_empleado' => 'required|exists:empleados,id_empleado',
        ]);

        $venta = Venta::findOrFail($id);
        $venta->update($request->all());

        return redirect()->route('ventas.index')->with('success', 'Venta actualizada correctamente.');
    }

    public function destroy($id)
    {
        $venta = Venta::findOrFail($id);
        $venta->delete();

        return redirect()->route('ventas.index')->with('success', 'Venta eliminada correctamente.');
    }
}
