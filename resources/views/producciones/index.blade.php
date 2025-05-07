@extends('layouts.barra_dash')

@section('content')
<div class="container-fluid bg-light p-4">
    @if(session('success'))
    <div class="alert text-center" style="background-color: rgb(39, 26, 7); color: white; font-family: 'Fenix', serif; font-size: 1.5rem;">
        {{ session('success') }}
    </div>
    @endif

    <div class="card shadow-lg rounded p-4" style="background-color: #d2b48c;">
        <h1 class="bg-primary text-white p-4 rounded-top text-center" style="font-family: 'Fenix', serif; font-size: 2.5rem;">Lista de Producciones</h1>

        <div class="text-end mb-3">
            <a href="{{ route('producciones.create') }}" class="btn btn-success shadow">
                <i class="fa-solid fa-plus-circle"></i> Nueva Producción
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-bordered shadow-sm">
                <thead class="bg-primary text-white text-center">
                    <tr>
                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Cantidad</th>
                        <th>Producto</th>
                        <th>Empleado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($producciones as $produccion)
                    <tr class="text-center">
                        <td>{{ $produccion->id_produccion }}</td>
                        <td>{{ $produccion->fecha }}</td>
                        <td>{{ $produccion->cantidad }}</td>
                        <td>{{ $produccion->nombre_producto }}</td>
                        <td>{{ $produccion->nombre_empleado }}</td>
                        <td>
                            <a href="{{ route('producciones.edit', $produccion->id_produccion) }}" class="btn btn-warning btn-sm shadow">
                                <i class="fa-solid fa-edit"></i> Editar
                            </a>
                            <form action="{{ route('producciones.destroy', $produccion->id_produccion) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm shadow" onclick="return confirm('¿Eliminar producción?')">
                                    <i class="fa-solid fa-trash"></i> Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
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
