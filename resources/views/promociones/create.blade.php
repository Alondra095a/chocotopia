@extends('layouts.barra_dash')

@section('content')
<div class="container-fluid bg-light p-4">
    <div class="card shadow-lg rounded p-4" style="background-color: #d2b48c;">
        <h1 class="bg-primary text-white p-4 rounded-top text-center" style="font-family: 'Fenix', serif; font-size: 2.5rem;">
            Nueva Promoción
        </h1>

        <form action="{{ route('promociones.store') }}" method="POST" class="p-4">
            @csrf

            <div class="mb-3">
                <label class="form-label fw-bold">Título</label>
                <input type="text" name="titulo" class="form-control shadow-sm" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Descripción</label>
                <textarea name="descripcion" class="form-control shadow-sm" rows="3" required></textarea>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Valor</label>
                <input type="number" step="0.01" name="valor" class="form-control shadow-sm" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Producto</label>
                <select name="id_producto" class="form-select shadow-sm" required>
                    <option value="">-- Selecciona --</option>
                    @foreach($productos as $producto)
                        <option value="{{ $producto->id_producto }}">{{ $producto->nombre_producto }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Fecha de inicio</label>
                <input type="date" name="fecha_inicio" class="form-control shadow-sm" required>
            </div>

            <div class="mb-3">
                <label class="form-label fw-bold">Fecha de fin</label>
                <input type="date" name="fecha_fin" class="form-control shadow-sm" required>
            </div>

            <div class="text-center mt-4">
                <button class="btn btn-success px-5 shadow">
                    <i class="fa-solid fa-save"></i> Guardar
                </button>
                <a href="{{ route('promociones.index') }}" class="btn btn-secondary px-4 ms-3 shadow">
                    <i class="fa-solid fa-arrow-left"></i> Cancelar
                </a>
            </div>
        </form>
    </div>
</div>
@endsection
