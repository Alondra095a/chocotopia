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
                <h1 class="bg-primary text-white p-4 rounded-top text-center" style="font-family: 'Fenix', serif; font-size: 2.5rem;">Editar Proveedor</h1>

                <div class="card-body">
                    <form action="{{ route('proveedores.update', $proveedor->id_proveedor) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <!-- Tipo de Materia -->
                        <div class="mb-3">
                            <label for="tipo_materia" class="form-label fw-bold">Tipo de Materia</label>
                            <input type="text" name="tipo_materia" class="form-control shadow-sm" id="tipo_materia" value="{{ $proveedor->tipo_materia }}" required>
                        </div>

                        <!-- Cantidad -->
                        <div class="mb-3">
                            <label for="cantidad" class="form-label fw-bold">Cantidad</label>
                            <input type="number" name="cantidad" class="form-control shadow-sm" id="cantidad" value="{{ $proveedor->cantidad }}" required>
                        </div>

                        <!-- Persona -->
                        <div class="mb-3">
                            <label for="id_persona" class="form-label fw-bold">Persona</label>
                            <select name="id_persona" class="form-control shadow-sm" id="id_persona" required>
                                <option value="">Selecciona una persona</option>
                                @foreach ($personas as $persona)
                                    <option value="{{ $persona->id_persona }}" {{ $proveedor->id_persona == $persona->id_persona ? 'selected' : '' }}>{{ $persona->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('proveedores.index') }}" class="btn btn-secondary">Volver</a>
                            <button type="submit" class="btn btn-primary">Actualizar Proveedor</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
