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
                <h1 class="bg-warning text-dark p-4 rounded-top text-center" style="font-family: 'Fenix', serif; font-size: 2.5rem;">Editar Materia Prima</h1>
                
                <div class="card-body">
                    <form action="{{ route('materias.update', $materia->id_materia) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <!-- Nombre Materia -->
                        <div class="mb-3">
                            <label for="nombre_materia" class="form-label fw-bold">Nombre</label>
                            <input type="text" name="nombre_materia" class="form-control shadow-sm" value="{{ old('nombre_materia', $materia->nombre_materia) }}" required>
                        </div>

                        <!-- Cantidad -->
                        <div class="mb-3">
                            <label for="cantidad" class="form-label fw-bold">Cantidad</label>
                            <input type="number" name="cantidad" class="form-control shadow-sm" value="{{ old('cantidad', $materia->cantidad) }}" required>
                        </div>

                        <!-- Proveedor -->
                        <div class="mb-3">
                            <label for="id_proveedor" class="form-label fw-bold">Proveedor</label>
                            <select name="id_proveedor" class="form-control shadow-sm" required>
                                @foreach ($proveedores as $proveedor)
                                    <option value="{{ $proveedor->id_proveedor }}" {{ $materia->id_proveedor == $proveedor->id_proveedor ? 'selected' : '' }}>
                                        {{ $proveedor->persona->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <!-- Botones -->
                        <div class="d-flex justify-content-between">
                            <a href="{{ route('materias.index') }}" class="btn btn-secondary shadow">Volver</a>
                            <button type="submit" class="btn btn-warning shadow">
                                <i class="fa-solid fa-pencil-alt"></i> Actualizar Materia
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
