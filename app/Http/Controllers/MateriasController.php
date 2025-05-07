<?php

namespace App\Http\Controllers;

use App\Models\Materias;
use App\Models\Proveedor;
use Illuminate\Http\Request;

class MateriasController extends Controller
{
    public function index()
    {
        $materias = Materias::join('proveedores', 'materias.id_proveedor', '=', 'proveedores.id_proveedor')
        ->join('personas', 'proveedores.id_persona', '=', 'personas.id_persona')
        ->select(
            'materias.id_materia',
            'materias.nombre_materia',
            'materias.cantidad',
            'personas.nombre as nombre_proveedor',
            'personas.telefono'
        )
        ->get();

    return view('materias.index', compact('materias'));
    }

    public function create()
    {
        $proveedores = Proveedor::with('persona')->get();
        return view('materias.create', compact('proveedores'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_materia' => 'required|string|max:255',
            'cantidad' => 'required|integer|min:1',
            'id_proveedor' => 'required|exists:proveedores,id_proveedor',
        ]);

        Materias::create($request->all());
        return redirect()->route('materias.index')->with('success', 'Materia creada correctamente.');
    }

    public function edit(Materias $materia)
    {
        $proveedores = Proveedor::with('persona')->get();
        return view('materias.edit', compact('materia', 'proveedores'));
    }

    public function update(Request $request, Materias $materia)
    {
        $request->validate([
            'nombre_materia' => 'required|string|max:255',
            'cantidad' => 'required|integer|min:1',
            'id_proveedor' => 'required|exists:proveedores,id_proveedor',
        ]);

        $materia->update($request->all());
        return redirect()->route('materias.index')->with('success', 'Materia actualizada correctamente.');
    }

    public function destroy(Materias $materia)
    {
        $materia->delete();
        return redirect()->route('materias.index')->with('success', 'Materia eliminada correctamente.');
    }
}
