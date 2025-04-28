<?php

namespace App\Http\Controllers;

use App\Models\Dulce;
use App\Models\Producto;
use Illuminate\Http\Request;

class DulceController extends Controller
{
    public function index()
    {
        $dulces = Dulce::with('producto')->get();
        return view('dulces.index', compact('dulces'));
    }

    public function create()
    {
        $productos = Producto::all();
        return view('dulces.create', compact('productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            
            'dureza' => 'required|string|max:255',
            'colorante' => 'required|string|max:255',
            'id_producto' => 'required|exists:productos,id_producto',
        ]);

        Dulce::create($request->all());

        return redirect()->route('dulces.index')->with('success', 'Dulce creado correctamente.');
    }

    public function edit($id)
    {
        $dulce = Dulce::findOrFail($id);
        $productos = Producto::all();
        return view('dulces.edit', compact('dulce', 'productos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            
            'dureza' => 'required|string|max:255',
            'colorante' => 'required|string|max:255',
            'id_producto' => 'required|exists:productos,id_producto',
        ]);

        $dulce = Dulce::findOrFail($id);
        $dulce->update($request->all());

        return redirect()->route('dulces.index')->with('success', 'Dulce actualizado correctamente.');
    }

    public function destroy($id)
    {
        $dulce = Dulce::findOrFail($id);
        $dulce->delete();

        return redirect()->route('dulces.index')->with('success', 'Dulce eliminado correctamente.');
    }
}
