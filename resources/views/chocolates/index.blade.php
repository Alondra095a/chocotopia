@extends('layouts.barra_dash')

@section('content')
<div class="container-fluid bg-light p-4">
    <!-- Mostrar el mensaje de éxito si está presente -->
    @if(session('success'))
    <div class="alert text-center" style="background-color: rgb(39, 26, 7); color: white; font-family: 'Fenix', serif; font-size: 1.5rem;">
        {{ session('success') }}
    </div>
    @endif

    <div class="card shadow-lg rounded p-4" style="background-color: #d2b48c;">
        <h1 class="bg-primary text-white p-4 rounded-top text-center" style="font-family: 'Fenix', serif; font-size: 2.5rem;">Lista de Chocolates</h1>

        <div class="text-end mb-3">
            <a href="{{ route('chocolates.create') }}" class="btn btn-success shadow">
                <i class="fa-solid fa-plus-circle"></i> Nuevo Chocolate
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-bordered shadow-sm">
                <thead class="bg-primary text-white text-center">
                    <tr>
                        <th>ID</th>
                        <th>Relleno</th>
                        <th>Producto</th>
                        <th>Precio</th> <!-- ✅ NUEVA COLUMNA -->
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($chocolates as $choc)
                    <tr class="text-center">
                        <td>{{ $choc->id_chocolate }}</td>
                        <td>{{ $choc->relleno }}</td>
                        <td>{{ $choc->producto->nombre_producto ?? 'N/A' }}</td>
                        <td>
                            ${{ number_format($choc->producto->precio ?? 0, 2) }}
                        </td>
                        <td>
                            <a href="{{ route('chocolates.edit', $choc->id_chocolate) }}" class="btn btn-warning btn-sm shadow">
                                <i class="fa-solid fa-edit"></i> Editar
                            </a>
                            <form action="{{ route('chocolates.destroy', $choc->id_chocolate) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm shadow" onclick="return confirm('¿Seguro que deseas eliminar este chocolate?')">
                                    <i class="fa-solid fa-trash"></i> Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center">No hay chocolates registrados.</td>
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
 