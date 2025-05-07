<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Personas;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    public function index()
    {
        $empleados = Empleado::join('personas', 'empleados.id_persona', '=', 'personas.id_persona')
        ->select(
            'empleados.id_empleado',
            'empleados.cargo',
            'empleados.turno',
            'personas.nombre as nombre',
            'personas.a_paterno',
            'personas.a_materno',
            'personas.telefono'
        )
        ->get();

    return view('empleados.index', compact('empleados'));
    }

    public function create()
    {
        $personas = Personas::all(); // Obtener todas las personas
        return view('empleados.create', compact('personas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'cargo' => 'required|string|max:255',
            'turno' => 'required|string|max:255',
            'id_persona' => 'required|exists:personas,id_persona',
        ]);

        Empleado::create($request->all());
        return redirect()->route('empleados.index')->with('success', 'Empleado creado con éxito.');
    }

    public function edit($id)
    {
        $empleado = Empleado::findOrFail($id);
        $personas = Personas::all();
        return view('empleados.edit', compact('empleado', 'personas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'cargo' => 'required|string|max:255',
            'turno' => 'required|string|max:255',
            'id_persona' => 'required|exists:personas,id_persona',
        ]);

        $empleado = Empleado::findOrFail($id);
        $empleado->update($request->all());
        return redirect()->route('empleados.index')->with('success', 'Empleado actualizado con éxito.');
    }

    public function destroy($id)
    {
        $empleado = Empleado::findOrFail($id);
        $empleado->delete();
        return redirect()->route('empleados.index')->with('success', 'Empleado eliminado con éxito.');
    }
}
