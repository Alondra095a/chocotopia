<?php

namespace App\Http\Controllers;

use App\Models\Clientes;
use App\Models\Personas;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function index()
    {
        $clientes = Clientes::with('persona')->get();
    return view('clientes.index', compact('clientes')); 
    }

    public function store(Request $request)
{
    // Validar los datos del formulario
    $request->validate([
        'id_persona' => 'required|exists:personas,id_persona',
        'tipo' => 'required|string|max:255',
    ]);

    // Crear el cliente con los datos del formulario
    $cliente = Clientes::create($request->all());

    // Redirigir al listado de clientes con un mensaje de éxito
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
    $cliente = Clientes::find($id);
    if (!$cliente) {
        return redirect()->route('clientes.index')->with('error', 'Cliente no encontrado');
    }

    $request->validate([
        'id_persona' => 'exists:personas,id_persona',
        'tipo' => 'string|max:255',
    ]);

    $cliente->update($request->only(['id_persona', 'tipo']));

    return redirect()->route('clientes.index')->with('success', 'Cliente actualizado exitosamente');
}


public function destroy($id)
{
    $cliente = Clientes::find($id);
    if (!$cliente) {
        // Si no se encuentra el cliente, redirigir con un mensaje de error
        return redirect()->route('clientes.index')->with('error', 'Cliente no encontrado');
    }

    // Eliminar el cliente
    $cliente->delete();

    // Redirigir al listado de clientes con un mensaje de éxito
    return redirect()->route('clientes.index')->with('success', 'Cliente eliminado exitosamente');
}

    public function create()
{
    // Obtener todas las personas para pasarlas a la vista
    $personas = Personas::all();

    // Pasar las personas a la vista
    return view('clientes.create', compact('personas'));
}
}
