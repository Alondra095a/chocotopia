<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Materias;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::whereNull('deleted_at')->with('materia')->get();
        return view('productos.index', compact('productos'));
    }

    public function create()
    {
        $materias = Materias::all();
        return view('productos.create', compact('materias'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre_producto' => 'required|string|max:255',
            'presentacion' => 'nullable|string|max:255',
            'stock' => 'required|integer',
            'id_materia' => 'required|exists:materias,id_materia',
        ]);

        Producto::create($request->all());

        return redirect()->route('productos.index')->with('success', 'Producto creado correctamente.');
    }

    public function show($id)
    {
        $producto = Producto::where('id_producto', $id)
            ->whereNull('deleted_at')
            ->firstOrFail();

        return view('productos.show', compact('producto'));
    }

    public function edit($id)
    {
        $producto = Producto::where('id_producto', $id)
            ->whereNull('deleted_at')
            ->firstOrFail();

        $materias = Materias::all();

        return view('productos.edit', compact('producto', 'materias'));
    }

    public function update(Request $request, $id)
    {
        $producto = Producto::where('id_producto', $id)
            ->whereNull('deleted_at')
            ->firstOrFail();

        $request->validate([
            'nombre_producto' => 'sometimes|required|string|max:255',
            'presentacion' => 'nullable|string|max:255',
            'stock' => 'sometimes|required|integer',
            'id_materia' => 'sometimes|required|exists:materias,id_materia',
        ]);

        $producto->update($request->all());

        return redirect()->route('productos.index')->with('success', 'Producto actualizado correctamente.');
    }

    public function destroy($id)
    {
        $producto = Producto::where('id_producto', $id)
            ->whereNull('deleted_at')
            ->firstOrFail();

        $producto->deleted_at = now();
        $producto->save();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado correctamente.');
    }
}
