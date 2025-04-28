@extends('layouts.barra_dash')

@section('content')
<div class="container-fluid bg-light p-4">
    @if(session('success'))
    <div class="alert text-center" style="background-color: rgb(39, 26, 7); color: white; font-family: 'Fenix', serif; font-size: 1.5rem;">
        {{ session('success') }}
    </div>
    @endif

   
            <div class="card shadow-lg rounded p-4" style="background-color: #d2b48c;">
                <h1 class="bg-warning text-dark p-4 rounded-top text-center" style="font-family: 'Fenix', serif; font-size: 2.5rem;">Editar Empleado</h1>
                
                <div class="card-body">
                    <form action="{{ route('empleados.update', $empleado->id_empleado) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="mb-3">
                            <label for="cargo" class="form-label fw-bold">Cargo</label>
                            <input type="text" name="cargo" class="form-control shadow-sm" id="cargo" value="{{ old('cargo', $empleado->cargo) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="turno" class="form-label fw-bold">Turno</label>
                            <input type="text" name="turno" class="form-control shadow-sm" id="turno" value="{{ old('turno', $empleado->turno) }}" required>
                        </div>

                        <div class="mb-3">
                            <label for="id_persona" class="form-label fw-bold">Persona</label>
                            <select name="id_persona" class="form-control shadow-sm" id="id_persona" required>
                                <option value="">Selecciona una persona</option>
                                @foreach ($personas as $persona)
                                    <option value="{{ $persona->id_persona }}" {{ $empleado->id_persona == $persona->id_persona ? 'selected' : '' }}>
                                        {{ $persona->nombre }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="d-flex justify-content-between">
                            <a href="{{ route('empleados.index') }}" class="btn btn-secondary shadow">Volver</a>
                            <button type="submit" class="btn btn-warning shadow">
                                <i class="fa-solid fa-pencil-alt"></i> Actualizar Empleado
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


