<?php

namespace App\Http\Controllers;

use App\Models\Chocolate;
use App\Models\Producto;
use Illuminate\Http\Request;

class ChocolateController extends Controller
{
    public function index()
    {
        $chocolates = Chocolate::with('producto')->get();
        return view('chocolates.index', compact('chocolates'));
    }

    public function create()
    {
        $productos = Producto::all();
        return view('chocolates.create', compact('productos'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'relleno' => 'required|string|max:255',
            'id_producto' => 'required|exists:productos,id_producto',
        ]);

        Chocolate::create($request->all());
        return redirect()->route('chocolates.index')->with('success','Chocolate creado con éxito');
    }

    public function edit($id)
    {
        $chocolate = Chocolate::findOrFail($id);
        $productos = Producto::all();
        return view('chocolates.edit', compact('chocolate', 'productos'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'relleno' => 'required|string|max:255',
            'id_producto' => 'required|exists:productos,id_producto',
        ]);

        $chocolate = Chocolate::findOrFail($id);
        $chocolate->update($request->all());
        return redirect()->route('chocolates.index')->with('success', 'Chocolate actualizado correctamente.');
    }

    public function destroy($id)
    {
        $chocolate = Chocolate::findOrFail($id);
        $chocolate->delete();
        return redirect()->route('chocolates.index')->with('success', 'Chocolate eliminado correctamente.');
    }
}
