@extends('layouts.barra_dash')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg p-4 rounded-lg">
        <h1 class="bg-warning text-dark p-4 rounded-top text-center" style="font-family: 'Fenix', serif; font-size: 2.5rem;">Editar Producto</h1>

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

            <form action="{{ route('productos.update', $producto->id_producto) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="nombre_producto" class="form-label fw-bold">Nombre del Producto</label>
                    <input type="text" class="form-control shadow-sm" id="nombre_producto" name="nombre_producto" value="{{ old('nombre_producto', $producto->nombre_producto) }}" required>
                </div>

                <div class="mb-3">
                    <label for="presentacion" class="form-label fw-bold">Presentación</label>
                    <input type="text" class="form-control shadow-sm" id="presentacion" name="presentacion" value="{{ old('presentacion', $producto->presentacion) }}">
                </div>

                <div class="mb-3">
                    <label for="stock" class="form-label fw-bold">Stock</label>
                    <input type="number" class="form-control shadow-sm" id="stock" name="stock" value="{{ old('stock', $producto->stock) }}" required>
                </div>

                <div class="mb-3">
                    <label for="precio" class="form-label fw-bold">Precio</label>
                    <input type="number" step="0.01" class="form-control shadow-sm" id="precio" name="precio" value="{{ old('precio', $producto->precio) }}" required>
                </div>

                <div class="mb-3">
                    <label for="id_materia" class="form-label fw-bold">Materia Prima</label>
                    <select name="id_materia" id="id_materia" class="form-select shadow-sm" required>
                        <option value="">Seleccione una materia</option>
                        @foreach($materias as $materia)
                            <option value="{{ $materia->id_materia }}" {{ $producto->id_materia == $materia->id_materia ? 'selected' : '' }}>
                                {{ $materia->nombre_materia }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="descripcion" class="form-label fw-bold">Descripción</label>
                    <textarea name="descripcion" id="descripcion" rows="3" class="form-control shadow-sm">{{ old('descripcion', $producto->descripcion) }}</textarea>
                </div>

                @if($producto->imagen)
                <div class="mb-3">
                    <label class="form-label fw-bold">Imagen actual:</label><br>
                    <img src="{{ asset('storage/' . $producto->imagen) }}" alt="Imagen actual" width="150" class="img-thumbnail">
                </div>
                @endif

                <div class="mb-3">
                    <label for="imagen" class="form-label fw-bold">Cambiar imagen:</label>
                    <input type="file" name="imagen" class="form-control shadow-sm" accept="image/*">
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('productos.index') }}" class="btn btn-secondary shadow-sm">
                        <i class="fa-solid fa-arrow-left"></i> Volver
                    </a>
                    <button type="submit" class="btn btn-warning shadow-sm">
                        <i class="fa-solid fa-box-open"></i> Actualizar Producto
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
