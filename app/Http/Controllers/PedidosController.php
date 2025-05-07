<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Clientes;
use Illuminate\Http\Request;

class PedidosController extends Controller
{
    /**
     * Muestra la lista de pedidos.
     */
    public function index()
    {
        $pedidos = Pedido::join('clientes', 'pedidos.id_cliente', '=', 'clientes.id_cliente')
        ->join('personas', 'clientes.id_persona', '=', 'personas.id_persona')
        
        ->select(
            'pedidos.id_pedido',
            'pedidos.fecha',
            'pedidos.monto',
            'pedidos.descripcion',
            'pedidos.estado',
            'personas.nombre as nombre_cliente',
        )
        ->get();

    return view('pedidos.index', compact('pedidos'));
    }

    /**
     * Muestra el formulario para crear un nuevo pedido.
     */
    public function create()
    {
        $clientes = Clientes::all();
        return view('pedidos.create', compact('clientes'));
    }

    /**
     * Guarda un nuevo pedido en la base de datos.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha' => 'required|date',
            'monto' => 'required|numeric',
            'descripcion' => 'nullable|string',
            'id_cliente' => 'required|exists:clientes,id_cliente',
            'estado' => 'required|in:pendiente,entregado' // ← Validación para estado
        ]);

        Pedido::create($request->all());

        return redirect()->route('pedidos.index')->with('success', 'Pedido creado exitosamente.');
    }

    /**
     * Muestra el formulario para editar un pedido.
     */
    public function edit($id_pedido)
    {
        $pedido = Pedido::findOrFail($id_pedido);
        $clientes = Clientes::all();
        return view('pedidos.edit', compact('pedido', 'clientes'));
    }

    /**
     * Actualiza un pedido en la base de datos.
     */
    public function update(Request $request, $id_pedido)
    {
        $request->validate([
            'fecha' => 'required|date',
            'monto' => 'required|numeric',
            'descripcion' => 'nullable|string',
            'id_cliente' => 'required|exists:clientes,id_cliente',
            'estado' => 'required|in:pendiente,entregado' // ← Validación para estado
        ]);

        $pedido = Pedido::findOrFail($id_pedido);
        $pedido->update($request->all());

        return redirect()->route('pedidos.index')->with('success', 'Pedido actualizado correctamente.');
    }

    /**
     * Elimina un pedido de la base de datos.
     */
    public function destroy($id_pedido)
    {
        $pedido = Pedido::findOrFail($id_pedido);
        $pedido->delete();

        return redirect()->route('pedidos.index')->with('success', 'Pedido eliminado correctamente.');
    }
}
