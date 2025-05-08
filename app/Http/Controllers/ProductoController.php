<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Producto;
use App\Models\Materias;

class ProductoController extends Controller
{
    public function index()
    {
        $productos = Producto::join('materias', 'productos.id_materia', '=', 'materias.id_materia')
            ->whereNull('productos.deleted_at')
            ->select(
                'productos.id_producto',
                'productos.nombre_producto',
                'productos.presentacion',
                'productos.stock',
                'productos.precio',
                'productos.descripcion',
                'productos.imagen',
                'materias.nombre_materia as materia'
            )
            ->get();

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
        'precio' => 'required|numeric|min:0',
        'descripcion' => 'nullable|string',
        'imagen' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
    ]);

    $rutaImagen = null;

    if ($request->hasFile('imagen')) {
        $rutaImagen = $request->file('imagen')->store('productos', 'public');
    }

    Producto::create([
        'nombre_producto' => $request->nombre_producto,
        'presentacion' => $request->presentacion,
        'stock' => $request->stock,
        'id_materia' => $request->id_materia,
        'precio' => $request->precio,
        'descripcion' => $request->descripcion,
        'imagen' => $rutaImagen,
    ]);

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
            'nombre_producto' => 'required|string|max:255',
            'presentacion' => 'nullable|string|max:255',
            'stock' => 'required|integer',
            'id_materia' => 'required|exists:materias,id_materia',
            'precio' => 'required|numeric|min:0',
            'descripcion' => 'nullable|string',
            'imagen' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        $datos = $request->only([
            'nombre_producto', 'presentacion', 'stock', 'id_materia', 'precio', 'descripcion'
        ]);

        if ($request->hasFile('imagen')) {
            $datos['imagen'] = $request->file('imagen')->store('productos', 'public');
        }

        $producto->update($datos);

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
