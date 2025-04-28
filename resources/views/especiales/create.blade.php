@extends('layouts.barra_dash')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg p-4 rounded-lg">
        <h1 class="bg-success text-white p-4 rounded-top text-center" style="font-family: 'Fenix', serif; font-size: 2.5rem;">
            Registrar Especial
        </h1>

        <div class="card shadow-lg rounded p-4" style="background-color: #d2b48c;">
            @if ($errors->any())
                <div class="alert alert-danger shadow-sm">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('especiales.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="descripcion" class="form-label fw-bold">Descripción:</label>
                    <input type="text" name="descripcion" class="form-control shadow-sm" value="{{ old('descripcion') }}" required>
                </div>

                <div class="mb-3">
                    <label for="tipo" class="form-label fw-bold">Tipo:</label>
                    <input type="text" name="tipo" class="form-control shadow-sm" value="{{ old('tipo') }}" required>
                </div>

                <div class="mb-3">
                    <label for="id_producto" class="form-label fw-bold">Producto relacionado:</label>
                    <select name="id_producto" class="form-select shadow-sm" required>
                        <option value="" disabled selected>Selecciona un producto</option>
                        @foreach ($productos as $producto)
                            <option value="{{ $producto->id_producto }}" {{ old('id_producto') == $producto->id_producto ? 'selected' : '' }}>
                                {{ $producto->nombre_producto }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('especiales.index') }}" class="btn btn-secondary shadow">
                        <i class="fa-solid fa-arrow-left"></i> Volver
                    </a>
                    <button type="submit" class="btn btn-success shadow">
                        <i class="fa-solid fa-check-circle"></i> Guardar Especial
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
