@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg p-4 rounded-lg">
        <h1 class="bg-warning text-dark p-4 rounded-top text-center" style="font-family: 'Fenix', serif; font-size: 2.5rem;">Editar Chocolate</h1>

        <div class="card-body" style="background-color: #d2b48c;">
            @if ($errors->any())
                <div class="alert alert-danger shadow-sm">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('chocolates.update', ['id' => $chocolate->id_choc]) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="relleno" class="form-label fw-bold">Relleno</label>
                    <input type="text" class="form-control shadow-sm" id="relleno" name="relleno" value="{{ old('relleno', $chocolate->relleno) }}" required>
                </div>

                <div class="mb-3">
                    <label for="id_producto" class="form-label fw-bold">Producto Asociado</label>
                    <select name="id_producto" id="id_producto" class="form-select shadow-sm" required>
                        @foreach($productos as $producto)
                            <option value="{{ $producto->id_producto }}" {{ $chocolate->id_producto == $producto->id_producto ? 'selected' : '' }}>
                                {{ $producto->nombre_producto }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="d-flex justify-content-between mt-4">
                    <a href="{{ route('chocolates.index') }}" class="btn btn-secondary shadow-sm"><i class="fa-solid fa-arrow-left"></i> Volver</a>
                    <button type="submit" class="btn btn-warning shadow-sm"><i class="fa-solid fa-save"></i> Actualizar Chocolate</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
