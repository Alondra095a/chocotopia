<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Promocion;
use App\Models\Producto;

class PromocionController extends Controller
{
    public function index()
    {
        $promociones = Promocion::join('productos', 'promociones.id_producto', '=', 'productos.id_producto')
            ->select('promociones.*', 'productos.nombre_producto', 'productos.imagen as imagen_producto')
            ->get();

        return view('promociones.index', compact('promociones'));
    }

    public function create()
    {
        $productos = Producto::all();
        return view('promociones.create', compact('productos'));
    }

    public function store(Request $request)
    {
        // Heredar la imagen del producto seleccionado
        $producto = Producto::find($request->id_producto);
        if ($producto && $producto->imagen) {
            $request['imagen'] = $producto->imagen;
        }

        Promocion::create($request->all());
        return redirect()->route('promociones.index')->with('success', 'Promoción registrada con éxito.');
    }

    public function edit($id)
    {
        $promocion = Promocion::findOrFail($id);
        $productos = Producto::all();
        return view('promociones.edit', compact('promocion', 'productos'));
    }

    public function update(Request $request, $id)
    {
        $promo = Promocion::findOrFail($id);

        // Heredar la imagen del producto seleccionado (nuevamente, por si cambió el producto)
        $producto = Producto::find($request->id_producto);
        if ($producto && $producto->imagen) {
            $request['imagen'] = $producto->imagen;
        }

        $promo->update($request->all());
        return redirect()->route('promociones.index')->with('success', 'Promoción actualizada con éxito.');
    }

    public function destroy($id)
    {
        Promocion::findOrFail($id)->delete();
        return redirect()->route('promociones.index')->with('success', 'Promoción eliminada.');
    }
}
