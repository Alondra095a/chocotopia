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
        <h1 class="bg-primary text-white p-4 rounded-top text-center" style="font-family: 'Fenix', serif; font-size: 2.5rem;">Lista de Pedidos</h1>

        <div class="text-end mb-3">
            <a href="{{ route('pedidos.create') }}" class="btn btn-success shadow">
                <i class="fa-solid fa-plus-circle"></i> Nuevo Pedido
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-bordered shadow-sm">
                <thead class="bg-primary text-white text-center">
                    <tr>
                        <th>ID</th>
                        <th>Fecha</th>
                        <th>Monto</th>
                        <th>Descripción</th>
                        <th>Cliente</th>
                        <th>Estado</th> 
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($pedidos as $pedido)
                    <tr class="text-center">
                        <td>{{ $pedido->id_pedido }}</td>
                        <td>{{ $pedido->fecha }}</td>
                        <td>${{ number_format($pedido->monto, 2) }}</td>
                        <td>{{ $pedido->descripcion }}</td>
                        <td>{{ $pedido->nombre_cliente ?? 'Sin cliente' }}</td>
                        <td>
                            @if ($pedido->estado == 'entregado')
                                <span class="badge bg-success">{{ ucfirst($pedido->estado) }}</span>
                            @else
                                <span class="badge bg-warning text-dark">{{ ucfirst($pedido->estado) }}</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{ route('pedidos.edit', $pedido->id_pedido) }}" class="btn btn-warning btn-sm shadow">
                                <i class="fa-solid fa-edit"></i> Editar
                            </a>
                            <form action="{{ route('pedidos.destroy', $pedido->id_pedido) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm shadow" onclick="return confirm('¿Eliminar pedido?')">
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
