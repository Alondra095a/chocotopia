<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use App\Models\Personas;
use Illuminate\Http\Request;

class ProveedorController extends Controller
{
    public function index()
    {
        $proveedores = Proveedor::join('personas', 'proveedores.id_persona', '=', 'personas.id_persona')
        ->select(
            'proveedores.id_proveedor',
            'proveedores.tipo_materia',
            'proveedores.cantidad',
            'personas.nombre as nombre',
            'personas.a_paterno',
            'personas.a_materno',
            'personas.telefono'
        )
        ->get();

    return view('proveedores.index', compact('proveedores'));
    }

    public function create()
    {
        $personas = Personas::all();
        return view('proveedores.create', compact('personas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_persona' => 'required|exists:personas,id_persona',
            'tipo_materia' => 'required|string',
            'cantidad' => 'required|integer',
        ]);

        Proveedor::create($request->all());

        return redirect()->route('proveedores.index')->with('success', 'Proveedor creado exitosamente.');
    }

    public function edit($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $personas = Personas::all();
        return view('proveedores.edit', compact('proveedor', 'personas'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_persona' => 'required|exists:personas,id_persona',
            'tipo_materia' => 'required|string',
            'cantidad' => 'required|integer',
        ]);

        $proveedor = Proveedor::findOrFail($id);
        $proveedor->update($request->all());

        return redirect()->route('proveedores.index')->with('success', 'Proveedor actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->delete();

        return redirect()->route('proveedores.index')->with('success', 'Proveedor eliminado exitosamente.');
    }
}