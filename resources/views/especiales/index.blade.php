<<<<<<< HEAD
=======
@extends('layouts.barra_dash')

@section('content')
<div class="container-fluid bg-light p-4">
    <!-- Mensaje de éxito -->
    @if(session('success'))
    <div class="alert text-center" style="background-color: rgb(39, 26, 7); color: white; font-family: 'Fenix', serif; font-size: 1.5rem;">
        {{ session('success') }}
    </div>
    @endif

    <div class="card shadow-lg rounded p-4" style="background-color: #d2b48c;">
        <h1 class="text-white p-4 rounded-top text-center mb-4" style="background-color: rgb(39, 26, 7); font-family: 'Fenix', serif; font-size: 2.5rem;">
            Lista de Especiales
        </h1>

        <!-- Botón nuevo -->
        <div class="text-end mb-3">
            <a href="{{ route('especiales.create') }}" class="btn btn-success shadow">
                <i class="fa-solid fa-plus-circle"></i> Nuevo Especial
            </a>
        </div>

        <!-- Tabla -->
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover shadow-sm align-middle text-center">
                <thead class="text-white" style="background-color: rgb(49, 23, 9);">
                    <tr>
                        <th>ID</th>
                        <th>Descripción</th>
                        <th>Tipo</th>
                        <th>Producto</th>
                        <th>Precio</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($especiales as $especial)
                    <tr>
                        <td>{{ $especial->id_especial }}</td>
                        <td>{{ $especial->descripcion }}</td>
                        <td>{{ $especial->tipo }}</td>
                        <td>{{ $especial->nombre_producto ?? 'N/A' }}</td>
                        <td>${{ number_format($especial->precio ?? 0, 2) }}</td>
                        <td>
                            <a href="{{ route('especiales.edit', $especial->id_especial) }}" class="btn btn-warning btn-sm shadow">
                                <i class="fa-solid fa-pen-to-square"></i> Editar
                            </a>
                            <form action="{{ route('especiales.destroy', $especial->id_especial) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm shadow" onclick="return confirm('¿Eliminar este especial?')">
                                    <i class="fa-solid fa-trash"></i> Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="text-center">No hay especiales registrados.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Botón volver -->
        <div class="text-center mt-4">
            <a href="{{ route('home') }}" class="btn btn-secondary shadow">
                <i class="fa-solid fa-arrow-left"></i> Volver
            </a>
        </div>
    </div>
</div>
@endsection
>>>>>>> 9da4b99e490aa56f894f0e5eb7cbebe3ecd37fe2
