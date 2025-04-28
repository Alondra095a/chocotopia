@extends('layouts.barra_dash')

@section('content')
<div class="container-fluid bg-light p-4">
    <div class="row" style="height: 100vh;">
        <!-- Contenido principal (Formulario de creación de empleado) -->
        <div class="col-10 p-4">
            <div class="card shadow-lg rounded p-4" style="background-color: #d2b48c;">
                <h1 class="bg-primary text-white p-4 rounded-top text-center" style="font-family: 'Fenix', serif; font-size: 2.5rem;">Crear Nuevo Empleado</h1>
                
                <div class="card-body">
                    <form action="{{ route('empleados.store') }}" method="POST">
                        @csrf
                        
                        <!-- Cargo -->
                        <div class="mb-3">
                            <label for="cargo" class="form-label fw-bold">Cargo</label>
                            <input type="text" name="cargo" class="form-control shadow-sm" id="cargo" required>
                        </div>

                        <!-- Turno -->
                        <div class="mb-3">
                            <label for="turno" class="form-label fw-bold">Turno</label>
                            <input type="text" name="turno" class="form-control shadow-sm" id="turno" required>
                        </div>

                        <!-- Persona -->
                        <div class="mb-3">
                            <label for="id_persona" class="form-label fw-bold">Persona</label>
                            <select name="id_persona" class="form-control shadow-sm" id="id_persona" required>
                                <option value="">Selecciona una persona</option>
                                @foreach ($personas as $persona)
                                    <option value="{{ $persona->id_persona }}">{{ $persona->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('empleados.index') }}" class="btn btn-secondary">Volver</a>
                            <button type="submit" class="btn btn-primary">Crear Empleado</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
