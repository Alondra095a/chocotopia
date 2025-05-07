<<<<<<< HEAD
=======
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
                <h1 class="bg-primary text-white p-4 rounded-top text-center" style="font-family: 'Fenix', serif; font-size: 2.5rem;">Lista de Materias Primas</h1>

                <div class="text-end mb-3">
                    <a href="{{ route('materias.create') }}" class="btn btn-success shadow"><i class="fa-solid fa-plus-circle"></i> Nueva Materia</a>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover table-bordered shadow-sm">
                        <thead class="bg-primary text-white text-center">
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Cantidad</th>
                                <th>Proveedor</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($materias as $materia)
                            <tr class="text-center">
                                <td>{{ $materia->id_materia }}</td>
                                <td>{{ $materia->nombre_materia }}</td>
                                <td>{{ $materia->cantidad }}</td>
                                <td>{{ $materia->nombre_proveedor ?? 'Sin proveedor' }}</td>
                                <td>
                                    <a href="{{ route('materias.edit', $materia->id_materia) }}" class="btn btn-warning btn-sm shadow"><i class="fa-solid fa-edit"></i> Editar</a>
                                    <form action="{{ route('materias.destroy', $materia->id_materia) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm shadow" onclick="return confirm('¿Eliminar materia?')">
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
    </div>
</div>
@endsection
>>>>>>> 9da4b99e490aa56f894f0e5eb7cbebe3ecd37fe2
