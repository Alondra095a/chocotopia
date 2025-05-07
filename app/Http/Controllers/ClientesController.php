<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Clientes;
use App\Models\Personas;

class ClientesController extends Controller
{
    // Mostrar todos los clientes usando JOIN (solo para visualización)
    public function index()
    {
        $clientes = clientes::join('personas', 'clientes.id_persona', '=', 'personas.id_persona')
            ->select(
                'clientes.id_cliente',
                'clientes.id_persona',
                'clientes.tipo',
                'personas.telefono',
                'personas.nombre as nombre'
            )
            ->get();

        return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
        $personas = Personas::all();
        return view('clientes.create', compact('personas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_persona' => 'required|exists:personas,id_persona',
            'tipo' => 'required|string|max:255',
        ]);

        Clientes::create($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente creado exitosamente');
    }

    public function show($id)
    {
        $cliente = Clientes::with('persona')->find($id);
        if (!$cliente) {
            return response()->json(['message' => 'Cliente no encontrado'], 404);
        }
        return response()->json($cliente);
    }

    public function edit($id)
    {
        $cliente = Clientes::findOrFail($id);
        $personas = Personas::all();
        return view('clientes.edit', compact('cliente', 'personas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_persona' => 'required|exists:personas,id_persona',
            'tipo' => 'required|string|max:255',
        ]);

        $cliente = Clientes::findOrFail($id);
        $cliente->update($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado exitosamente');
    }

    public function destroy($id)
    {
        $cliente = Clientes::findOrFail($id);
        $cliente->delete();

        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado exitosamente');
    }
}