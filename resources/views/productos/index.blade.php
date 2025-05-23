@extends('layouts.barra_dash')

@section('content')
<div class="container-fluid bg-light p-4">
    @if(session('success'))
    <div class="alert text-center" style="background-color: rgb(39, 26, 7); color: white; font-family: 'Fenix', serif; font-size: 1.5rem;">
        {{ session('success') }}
    </div>
    @endif

    <div class="card shadow-lg rounded p-4" style="background-color: #d2b48c;">
        <h1 class="bg-primary text-white p-4 rounded-top text-center" style="font-family: 'Fenix', serif; font-size: 2.5rem;">Productos</h1>

        <div class="text-end mb-3">
            <a href="{{ route('productos.create') }}" class="btn btn-success shadow">
                <i class="fa-solid fa-boxes-packing"></i> Crear Producto
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-bordered shadow-sm">
                <thead class="bg-primary text-white text-center">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Presentación</th>
                        <th>Stock</th>
                        <th>Precio</th>
                        <th>Materia Prima</th>
                        <th>Descripción</th>
                        <th>Imagen</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($productos as $producto)
                    <tr class="text-center align-middle">
                        <td>{{ $producto->id_producto }}</td>
                        <td>{{ $producto->nombre_producto }}</td>
                        <td>{{ $producto->presentacion }}</td>
                        <td>{{ $producto->stock }}</td>
                        <td>${{ number_format($producto->precio, 2) }}</td>
                        <td>{{ $producto->materia ?? 'No definida' }}</td>
                        <td style="max-width: 200px;">{{ $producto->descripcion ?? 'Sin descripción' }}</td>
                        <td>
                            @if ($producto->imagen)
                                <img src="{{ asset('storage/' . $producto->imagen) }}" alt="Imagen" width="60" class="img-thumbnail">
                            @else
                                <span class="text-muted">Sin imagen</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('productos.edit', $producto->id_producto) }}" class="btn btn-warning btn-sm shadow">
                                <i class="fa-solid fa-edit"></i> Editar
                            </a>
                            <form action="{{ route('productos.destroy', $producto->id_producto) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm shadow" onclick="return confirm('¿Seguro que quieres eliminar este producto?');">
                                    <i class="fa-solid fa-trash"></i> Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="9" class="text-center">No hay productos registrados.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="text-center mt-4">
            <a href="{{ route('home') }}" class="btn btn-secondary shadow">
                <i class="fa-solid fa-arrow-left"></i> Volver
            </a>
        </div>
    </div>
</div>
@endsection
