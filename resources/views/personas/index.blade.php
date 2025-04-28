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
    <h1 class="bg-primary text-white p-4 rounded-top text-center" style="font-family: 'Fenix', serif; font-size: 2.5rem;">Personas</h1>

        
        <div class="text-end mb-3">
            <a href="{{ route('personas.create') }}" class="btn btn-success shadow"><i class="fa-solid fa-user-plus"></i> Crear Persona</a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-bordered shadow-sm">
                <thead class="bg-primary text-white text-center">
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Apellido Paterno</th>
                        <th>Apellido Materno</th>
                        <th>Teléfono</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($personas as $persona)
                    <tr class="text-center">
                        <td>{{ $persona->id_persona }}</td>
                        <td>{{ $persona->nombre }}</td>
                        <td>{{ $persona->a_paterno }}</td>
                        <td>{{ $persona->a_materno }}</td>
                        <td>{{ $persona->telefono }}</td>
                        <td>
                            <a href="{{ route('personas.edit', $persona->id_persona) }}" class="btn btn-warning btn-sm shadow"><i class="fa-solid fa-edit"></i> Editar</a>
                            <form action="{{ route('personas.destroy', $persona->id_persona) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm shadow" onclick="return confirm('¿Seguro que quieres eliminar a esta persona?');">
                                    <i class="fa-solid fa-trash"></i> Eliminar
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
        <div class="text-center mt-4">
            <a href="{{ route('home') }}" class="btn btn-secondary shadow"><i class="fa-solid fa-arrow-left"></i> Volver</a>
        </div>
    </div>
</div>
@endsection
