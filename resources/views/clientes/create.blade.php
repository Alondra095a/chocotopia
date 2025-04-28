@extends('layouts.barra_dash')

@section('content')
<div class="container-fluid bg-light p-4">
    @if(session('success'))
    <div class="alert text-center" style="background-color: rgb(39, 26, 7); color: white; font-family: 'Fenix', serif; font-size: 1.5rem;">
        {{ session('success') }}
    </div>
    @endif

    
            <div class="card shadow-lg rounded p-4" style="background-color: #d2b48c;">
                <h1 class="bg-primary text-white p-4 rounded-top text-center" style="font-family: 'Fenix', serif; font-size: 2.5rem;">Crear Cliente</h1>

                <div class="card-body">
                    <form action="{{ route('clientes.store') }}" method="POST">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="id_persona" class="form-label fw-bold">Persona:</label>
                            <select name="id_persona" class="form-select shadow-sm" required>
                                <option value="">Seleccione una persona</option>
                                @foreach ($personas as $persona)
                                <option value="{{ $persona->id_persona }}">{{ $persona->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="tipo" class="form-label fw-bold">Tipo:</label>
                            <input type="text" name="tipo" class="form-control shadow-sm" required>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('clientes.index') }}" class="btn btn-secondary shadow">Volver</a>
                            <button type="submit" class="btn btn-success shadow">
                                <i class="fa-solid fa-user-plus"></i> Guardar Cliente
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection



