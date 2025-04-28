@extends('layouts.barra_dash')

@section('content')
<div class="container-fluid bg-light p-4">
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ups...</strong> Hubo algunos errores al guardar:<br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-lg rounded p-4" style="background-color: #d2b48c;">
        <h1 class="bg-success text-white p-4 rounded-top text-center" style="font-family: 'Fenix', serif; font-size: 2.5rem;">
            Registrar Dulce
        </h1>

        <form action="{{ route('dulces.store') }}" method="POST">
            @csrf

            

            <div class="mb-3">
                <label for="dureza" class="form-label fw-bold">Dureza:</label>
                <input type="text" name="dureza" class="form-control shadow-sm" required>
            </div>

            <div class="mb-3">
                <label for="colorante" class="form-label fw-bold">Colorante:</label>
                <input type="text" name="colorante" class="form-control shadow-sm" required>
            </div>

            <div class="mb-3">
                <label for="id_producto" class="form-label fw-bold">Producto relacionado:</label>
                <select name="id_producto" class="form-select shadow-sm" required>
                    <option value="" disabled selected>Selecciona un producto</option>
                    @foreach ($productos as $producto)
                        <option value="{{ $producto->id_producto }}">{{ $producto->nombre_producto }}</option>
                    @endforeach
                </select>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('dulces.index') }}" class="btn btn-secondary shadow">
                    <i class="fa-solid fa-arrow-left"></i> Volver
                </a>
                <button type="submit" class="btn btn-success shadow">
                    <i class="fa-solid fa-check-circle"></i> Registrar Dulce
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
