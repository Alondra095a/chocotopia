@extends('layouts.barra_dash')

@section('content')
<div class="container-fluid bg-light p-4">
    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Ups...</strong> Hay errores en el formulario:<br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-lg rounded p-4" style="background-color: #d2b48c;">
        <h1 class="bg-warning text-dark p-4 rounded-top text-center" style="font-family: 'Fenix', serif; font-size: 2.5rem;">
            Editar Dulce
        </h1>

        <form action="{{ route('dulces.update', $dulce->id_dulce) }}" method="POST">
            @csrf
            @method('PUT')

           

            <div class="mb-3">
                <label for="dureza" class="form-label fw-bold">Dureza:</label>
                <input type="text" name="dureza" class="form-control shadow-sm" value="{{ $dulce->dureza }}" required>
            </div>

            <div class="mb-3">
                <label for="colorante" class="form-label fw-bold">Colorante:</label>
                <input type="text" name="colorante" class="form-control shadow-sm" value="{{ $dulce->colorante }}" required>
            </div>

            <div class="mb-3">
                <label for="id_producto" class="form-label fw-bold">Producto relacionado:</label>
                <select name="id_producto" class="form-select shadow-sm" required>
                    @foreach ($productos as $producto)
                        <option value="{{ $producto->id_producto }}" {{ $dulce->id_producto == $producto->id_producto ? 'selected' : '' }}>
                            {{ $producto->nombre_producto }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="d-flex justify-content-between">
                <a href="{{ route('dulces.index') }}" class="btn btn-secondary shadow">
                    <i class="fa-solid fa-arrow-left"></i> Volver
                </a>
                <button type="submit" class="btn btn-warning shadow">
                    <i class="fa-solid fa-edit"></i> Actualizar Dulce
                </button>
            </div>
        </form>
    </div>
</div>
@endsection