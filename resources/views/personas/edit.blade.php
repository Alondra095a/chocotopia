@extends('layouts.barra_dash')

@section('content')
<div class="container mt-5">
    <div class="card shadow-lg p-4 rounded-lg">
        <h1 class="bg-warning text-dark p-4 rounded-top text-center" style="font-family: 'Fenix', serif; font-size: 2.5rem;">Editar Persona</h1>
        
        <div class="card shadow-lg rounded p-4" style="background-color: #d2b48c;">
            <form action="{{ route('personas.update', $persona->id_persona) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-3">
                    <label for="nombre" class="form-label fw-bold">Nombre</label>
                    <input type="text" class="form-control shadow-sm" id="nombre" name="nombre" value="{{ $persona->nombre }}" required>
                </div>
                <div class="mb-3">
                    <label for="a_paterno" class="form-label fw-bold">Apellido Paterno</label>
                    <input type="text" class="form-control shadow-sm" id="a_paterno" name="a_paterno" value="{{ $persona->a_paterno }}" required>
                </div>
                <div class="mb-3">
                    <label for="a_materno" class="form-label fw-bold">Apellido Materno</label>
                    <input type="text" class="form-control shadow-sm" id="a_materno" name="a_materno" value="{{ $persona->a_materno }}">
                </div>
                <div class="mb-3">
                    <label for="telefono" class="form-label fw-bold">Teléfono</label>
                    <input type="text" class="form-control shadow-sm" id="telefono" name="telefono" value="{{ $persona->telefono }}">
                </div>
                
                <div class="d-flex justify-content-between">
                    <a href="{{ route('personas.index') }}" class="btn btn-secondary">Volver</a>
                    <button type="submit" class="btn btn-warning"> <i class="fa-solid fa-user-edit"></i> Actualizar Persona</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

