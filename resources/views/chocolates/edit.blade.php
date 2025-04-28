@extends('layouts.barra_dash')

@section('content')
<div class="container-fluid bg-light p-4">
    @if(session('success'))
    <div class="alert text-center" style="background-color: rgb(39, 26, 7); color: white; font-family: 'Fenix', serif; font-size: 1.5rem;">
        {{ session('success') }}
    </div>
    @endif

    <div class="card shadow-lg rounded p-4" style="background-color: #d2b48c;">
        <h1 class="bg-warning text-dark p-4 rounded-top text-center" style="font-family: 'Fenix', serif; font-size: 2.5rem;">Editar Chocolate</h1>

        <form action="{{ route('chocolates.update', $chocolate->id_chocolate) }}" method="POST">
            @csrf
            @method('PUT')

            <!-- Relleno -->
            <div class="mb-3">
                <label for="relleno" class="form-label fw-bold">Relleno:</label>
                <input type="text" name="relleno" class="form-control shadow-sm" value="{{ $chocolate->relleno }}" required>
            </div>

            <!-- Producto relacionado -->
            <div class="mb-3">
                <label for="id_producto" class="form-label fw-bold">Producto:</label>
                <select name="id_producto" class="form-select shadow-sm" required>
                    @foreach ($productos as $producto)
                        <option value="{{ $producto->id_producto }}" {{ $chocolate->id_producto == $producto->id_producto ? 'selected' : '' }}>
                            {{ $producto->nombre_producto }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Botones -->
            <div class="d-flex justify-content-between">
                <a href="{{ route('chocolates.index') }}" class="btn btn-secondary shadow">Volver</a>
                <button type="submit" class="btn btn-warning shadow">
                    <i class="fa-solid fa-user-edit"></i> Actualizar Chocolate
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
