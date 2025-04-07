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

        <!-- Contenido principal (Formulario de edición de proveedor) -->
        <div class="col-10 p-4">
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
