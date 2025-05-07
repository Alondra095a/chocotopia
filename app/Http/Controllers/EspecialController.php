<?php

namespace App\Http\Controllers;

use App\Models\Especial;
use App\Models\Producto;
use Illuminate\Http\Request;

class EspecialController extends Controller
{
    public function index()
    {
        $especiales = Especial::join('productos', 'especiales.id_producto', '=', 'productos.id_producto')
        ->select(
            'especiales.id_especial',
            'especiales.descripcion',
            'especiales.tipo',
            'productos.nombre_producto as nombre_producto',
            'productos.precio'
        )
        ->get();

    return view('especiales.index', compact('especiales'));
    
    }

    public function create()
    {
        $productos = Producto::all();
        return view('especiales.create', compact('productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'descripcion' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'id_producto' => 'required|exists:productos,id_producto',
        ]);

        Especial::create($request->all());

        return redirect()->route('especiales.index')->with('success', 'Especial creado correctamente.');
    }

    public function edit($id)
    {
        $especial = Especial::findOrFail($id);
        $productos = Producto::all();
        return view('especiales.edit', compact('especial', 'productos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'descripcion' => 'required|string|max:255',
            'tipo' => 'required|string|max:255',
            'id_producto' => 'required|exists:productos,id_producto',
        ]);

        $especial = Especial::findOrFail($id);
        $especial->update($request->all());

        return redirect()->route('especiales.index')->with('success', 'Especial actualizado correctamente.');
    }

    public function destroy($id)
    {
        $especial = Especial::findOrFail($id);
        $especial->delete();

        return redirect()->route('especiales.index')->with('success', 'Especial eliminado correctamente.');
    }
}
