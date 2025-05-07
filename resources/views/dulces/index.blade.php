@extends('layouts.barra_dash')

@section('content')
<div class="container-fluid bg-light p-4">
    <!-- Mensaje de éxito -->
    @if(session('success'))
    <div class="alert text-center" style="background-color: rgb(39, 26, 7); color: white; font-family: 'Fenix', serif; font-size: 1.5rem;">
        {{ session('success') }}
    </div>
    @endif

    <!-- Tarjeta principal -->
    <div class="card shadow-lg rounded p-4" style="background-color: #d2b48c;">
        <h1 class="text-white p-4 rounded-top text-center mb-4" style="background-color: rgb(39, 26, 7); font-family: 'Fenix', serif; font-size: 2.5rem;">
            Lista de Dulces
        </h1>

        <!-- Botón nuevo -->
        <div class="text-end mb-3">
            <a href="{{ route('dulces.create') }}" class="btn btn-success shadow">
                <i class="fa-solid fa-plus-circle"></i> Nuevo Dulce
            </a>
        </div>

        <!-- Tabla -->
        <div class="table-responsive">
            <table class="table table-striped table-bordered table-hover shadow-sm align-middle text-center">
                <thead class="text-white" style="background-color: rgb(49, 23, 9);">
                    <tr>
                        <th>ID</th>
                        <th>Dureza</th>
                        <th>Colorante</th>
                        <th>Producto</th>
                        <th>Precio</th> 
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($dulces as $dulce)
                    <tr>
                        <td>{{ $dulce->id_dulce }}</td>
                        <td>{{ $dulce->dureza }}</td>
                        <td>{{ $dulce->colorante }}</td>
                        <td>{{ $dulce->nombre_dulce ?? 'N/A' }}</td>
                        <td>
                            ${{ number_format($dulce->precio ?? 0, 2) }}
                        </td>
                        <td>
                            <a href="{{ route('dulces.edit', $dulce->id_dulce) }}" class="btn btn-warning btn-sm shadow">
                                <i class="fa-solid fa-pen-to-square"></i> Editar
                            </a>
                            <form action="{{ route('dulces.destroy', $dulce->id_dulce) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm shadow" onclick="return confirm('¿Eliminar este dulce?')">
                                    <i class="fa-solid fa-trash"></i> Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6">No hay dulces registrados aún.</td>
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