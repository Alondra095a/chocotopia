@extends('layouts.app')

@section('content')
<div class="container-fluid bg-light p-4">
    <!-- Mostrar el mensaje de éxito si está presente -->
    @if(session('success'))
    <div class="alert text-center" style="background-color: rgb(39, 26, 7); color: white; font-family: 'Fenix', serif; font-size: 1.5rem;">
        {{ session('success') }}
    </div>
    @endif

    <div class="row" style="height: 100vh;">
        <!-- Barra de navegación izquierda con botones -->
        <div class="col-2 bg-primary p-4 text-light rounded-start shadow-lg d-flex flex-column">
            <img src="{{ asset('img/log2.jpg') }}" class="rounded-circle mx-auto d-block mb-3" style="width: 150px; height: 150px;" alt="Fotografía">
            
            <div class="text-center text-white mt-2 mb-4" style="font-family: 'Fenix', serif; font-size: 24px;">
                <p>{{ Auth::user()->name }}</p>
            </div>

            <div class="mt-4">
                <h5 class="p-2"><a href="{{ route('empleados.index') }}" class="btn text-decoration-none text-white"><i class="fa-solid fa-users"></i> Empleados</a></h5>
                <h5 class="p-2"><a href="{{ route('materias.index') }}" class="btn text-decoration-none text-white"><i class="fa-solid fa-box"></i> Materias</a></h5>
                <h5 class="p-2"><a href="{{ route('pedidos.index') }}" class="btn text-decoration-none text-white"><i class="fa-solid fa-box"></i> Pedidos</a></h5>
                <h5 class="p-2"><a href="{{ route('personas.index') }}" class="btn text-decoration-none text-white"><i class="fa-solid fa-users"></i> Personas</a></h5>
            </div>

            <div class="mt-4 border-top pt-4">
                <h5 class="p-2"><a href="{{ url('configuracion') }}" class="btn text-decoration-none text-white"><i class="fa-solid fa-gear"></i> Configuración</a></h5>
                <h5 class="p-2">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn text-decoration-none text-white"><i class="fa-solid fa-right-from-bracket"></i> Salir</button>
                    </form>
                </h5>
            </div>
        </div>

        <!-- Contenido principal (Lista de proveedores) -->
        <div class="col-10 p-4">
            <div class="card shadow-lg rounded p-4" style="background-color: #d2b48c;">
                <h1 class="bg-primary text-white p-4 rounded-top text-center" style="font-family: 'Fenix', serif; font-size: 2.5rem;">Lista de Proveedores</h1>

                <div class="text-end mb-3">
                    <a href="{{ route('proveedores.create') }}" class="btn btn-success shadow"><i class="fa-solid fa-plus-circle"></i> Nuevo Proveedor</a>
                </div>

                <div class="table-responsive">
                    <table class="table table-hover table-bordered shadow-sm">
                        <thead class="bg-primary text-white text-center">
                            <tr>
                                <th>ID</th>
                                <th>Persona</th>
                                <th>Tipo de Materia</th>
                                <th>Cantidad</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($proveedores as $proveedor)
                            <tr class="text-center">
                                <td>{{ $proveedor->id_proveedor }}</td>
                                <td>{{ $proveedor->persona->nombre }}</td>
                                <td>{{ $proveedor->tipo_materia }}</td>
                                <td>{{ $proveedor->cantidad }}</td>
                                <td>
                                    <a href="{{ route('proveedores.edit', $proveedor->id_proveedor) }}" class="btn btn-warning btn-sm shadow"><i class="fa-solid fa-edit"></i> Editar</a>
                                    <form action="{{ route('proveedores.destroy', $proveedor->id_proveedor) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm shadow" onclick="return confirm('¿Eliminar proveedor?')">
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
