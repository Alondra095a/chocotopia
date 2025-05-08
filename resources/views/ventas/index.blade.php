@extends('layouts.barra_dash')

@section('content')
<div class="container-fluid bg-light p-4">
    @if(session('success'))
        <div class="alert text-center" style="background-color: rgb(39, 26, 7); color: white; font-size: 1.2rem;">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-lg rounded p-4" style="background-color: #d2b48c;">
        <h1 class="text-white p-4 rounded-top text-center mb-4" style="background-color: rgb(39, 26, 7); font-family: 'Fenix', serif; font-size: 2.5rem;">
            Ventas Registradas
        </h1>

        <div class="text-end mb-3">
            <a href="{{ route('ventas.create') }}" class="btn btn-success shadow">
                <i class="fa-solid fa-plus-circle"></i> Nueva Venta
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-bordered shadow-sm text-center align-middle">
                <thead class="text-white" style="background-color: rgb(49, 23, 9);">
                    <tr>
                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Total</th>
                        <th>Pedido</th>
                        <th>Empleado</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($ventas as $venta)
                        <tr>
                            <td>{{ $venta->id_venta }}</td>
                            <td>{{ $venta->fecha }}</td>
                            <td>${{ number_format($venta->total, 2) }}</td>
                            <td>{{ $venta->pedido }}</td>
                            <td>{{ $venta->empleado }} {{ $venta->a_paterno }} {{ $venta->a_materno }}</td>
                            <td>
                                <a href="{{ route('ventas.edit', $venta->id_venta) }}" class="btn btn-warning btn-sm shadow">
                                    <i class="fa-solid fa-pen-to-square"></i> Editar
                                </a>
                                <form action="{{ route('ventas.destroy', $venta->id_venta) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm shadow" onclick="return confirm('¿Eliminar esta venta?')">
                                        <i class="fa-solid fa-trash"></i> Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6">No hay ventas registradas.</td>
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
