@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg p-4 rounded-lg">
        <h1 class="bg-primary text-white p-4 rounded-top text-center" style="font-family: 'Fenix', serif; font-size: 2.5rem;">Crear Producto</h1>

        <div class="card-body">
            @if ($errors->any())
                <div class="alert alert-danger shadow-sm">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('productos.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="nombre_producto" class="form-label fw-bold">Nombre del Producto</label>
                    <input type="text" class="form-control shadow-sm" id="nombre_producto" name="nombre_producto" value="{{ old('nombre_producto') }}" required>
                </div>

                <div class="mb-3">
                    <label for="presentacion" class="form-label fw-bold">Presentación</label>
                    <input type="text" class="form-control shadow-sm" id="presentacion" name="presentacion" value="{{ old('presentacion') }}">
                </div>

                <div class="mb-3">
                    <label for="stock" class="form-label fw-bold">Stock</label>
                    <input type="number" class="form-control shadow-sm" id="stock" name="stock" value="{{ old('stock') }}" required>
                </div>

                <div class="mb-3">
                    <label for="id_materia" class="form-label fw-bold">Materia Prima</label>
                    <select name="id_materia" id="id_materia" class="form-select shadow-sm" required>
                        <option value="">Seleccione una materia</option>
                        @foreach($materias as $materia)
                            <option value="{{ $materia->id_materia }}" {{ old('id_materia') == $materia->id_materia ? 'selected' : '' }}>
                                {{ $materia->nombre_materia }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('productos.index') }}" class="btn btn-secondary shadow-sm">
                        <i class="fa-solid fa-arrow-left"></i> Volver
                    </a>
                    <button type="submit" class="btn btn-success shadow-sm">
                        <i class="fa-solid fa-boxes-packing"></i> Guardar Producto
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection


