@extends('layouts.barra_dash')

@section('content')
<div class="container-fluid bg-light p-4">
    @if(session('success'))
    <div class="alert text-center" style="background-color: rgb(39, 26, 7); color: white; font-family: 'Fenix', serif; font-size: 1.5rem;">
        {{ session('success') }}
    </div>
    @endif

    <div class="card shadow-lg rounded p-4" style="background-color: #d2b48c;">
        <h1 class="bg-primary text-white p-4 rounded-top text-center" style="font-family: 'Fenix', serif; font-size: 2.5rem;">Lista de Promociones</h1>

        <div class="text-end mb-3">
            <a href="{{ route('promociones.create') }}" class="btn btn-success shadow">
                <i class="fa-solid fa-plus-circle"></i> Nueva Promoción
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-bordered shadow-sm text-center align-middle">
                <thead class="bg-primary text-white">
                    <tr>
                        <th>Imagen</th>
                        <th>Título</th>
                        <th>Descripción</th>
                        <th>Valor</th>
                        <th>Producto</th>
                        <th>Fechas</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($promociones as $promo)
                    <tr>
                        <td>
                            @if($promo->imagen_producto)
                                <img src="{{ asset('storage/' . $promo->imagen_producto) }}" alt="Imagen" class="img-thumbnail" style="max-height: 80px;">
                            @else
                                <span class="text-muted">Sin imagen</span>
                            @endif
                        </td>
                        <td>{{ $promo->titulo }}</td>
                        <td>{{ $promo->descripcion }}</td>
                        <td><span class="badge bg-success">${{ number_format($promo->valor, 2) }}</span></td>
                        <td>{{ $promo->nombre_producto }}</td>
                        <td>
                            <span class="text-muted">{{ $promo->fecha_inicio }}</span><br>
                            <strong>→</strong> {{ $promo->fecha_fin }}
                        </td>
                        <td>
                            <a href="{{ route('promociones.edit', $promo->id_promocion) }}" class="btn btn-warning btn-sm shadow">
                                <i class="fa-solid fa-edit"></i> Editar
                            </a>
                            <form action="{{ route('promociones.destroy', $promo->id_promocion) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger btn-sm shadow" onclick="return confirm('¿Eliminar promoción?')">
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
            <a href="{{ route('productos.create') }}" class="btn btn-secondary float-end ms-2">
                Agregar Producto
            </a>
        </div>
    </div>
</div>
@endsection
