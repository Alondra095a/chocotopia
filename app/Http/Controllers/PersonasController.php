<?php

namespace App\Http\Controllers;

use App\Models\Personas;
use Illuminate\Http\Request;

class PersonasController extends Controller
{
    // Mostrar todas las personas
    public function index()
    {
        $personas = Personas::all(); // Obtener todas las personas
        return view('personas.index', compact('personas'));
    }

    // Mostrar el formulario para crear una nueva persona
    public function create()
    {
        return view('personas.create');
    }

    // Almacenar una nueva persona en la base de datos
    public function store(Request $request)
{
    $request->validate([
        'nombre' => 'required',
        'a_paterno' => 'required',
        'telefono' => 'required|unique:personas',  // Si el teléfono es único
    ]);

    // Crear la persona
    Personas::create($request->all());

    // Redirigir con un mensaje flash
    return redirect()->route('personas.index')->with('success', 'Persona creada con éxito');
}

    // Mostrar los detalles de una persona
    public function show($id)
    {
        $persona = Persona::findOrFail($id); // Buscar persona por ID
        return view('personas.show', compact('persona'));
    }

    // Mostrar el formulario para editar una persona
    public function edit($id)
    {
        $persona = Personas::findOrFail($id); // Buscar persona por ID
        return view('personas.edit', compact('persona'));
    }

    // Actualizar la persona en la base de datos
    public function update(Request $request, $id)
    {
        $persona = Personas::findOrFail($id); // Buscar persona por ID

        // Validar la entrada
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'a_paterno' => 'required|string|max:255',
            'a_materno' => 'nullable|string|max:255',
            'telefono' => 'required|string|max:20',
        ]);

        // Actualizar la persona
        $persona->update($validated);

        return redirect()->route('personas.index')->with('success', 'Persona actualizada con éxito.');
    }

    // Eliminar una persona
    public function destroy($id)
    {
        $persona = Personas::findOrFail($id); // Buscar persona por ID
        $persona->delete(); // Eliminar persona

        return redirect()->route('personas.index')->with('success', 'Persona eliminada con éxito.');
    }
}