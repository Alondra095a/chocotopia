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
            
            <!-- Nombre del usuario logueado con fuente Fenix -->
            <div class="text-center text-white mt-2 mb-4" style="font-family: 'Fenix', serif; font-size: 24px;">
                <p>{{ Auth::user()->name }}</p> <!-- Mostrar el nombre del usuario -->
            </div>

            <div class="mt-4">
                <h5 class="p-2"><a href="{{url('ventas')}}" class="btn text-decoration-none {{request()->routeIs('ventas')?'active_custom':''}} text-white"><i class="fa-solid fa-cart-shopping"></i> Ventas</a></h5>
                
                <h5 class="p-2"><a href="{{url('ventas')}}" class="btn text-decoration-none {{request()->routeIs('ventas')?'active_custom':''}} text-white"><i class="fa-solid fa-barcode"></i> Productos</a></h5>
                
                <h5 class="p-2"><a href="{{ route('pedidos.index') }}" class="btn text-decoration-none {{ request()->routeIs('pedidos.index') ? 'active_custom' : '' }} text-white"><i class="fa-solid fa-box"></i> Pedidos</a></h5>

                <h5 class="p-2"><a href="{{ route('personas.index') }}" class="btn text-decoration-none {{ request()->routeIs('personas.index') ? 'active_custom' : '' }} text-white"><i class="fa-solid fa-users"></i> Personas</a></h5>
            </div>

            <div class="mt-4 border-top pt-4">
                <h5 class="p-2"><a href="{{url('configuración')}}" class="btn text-decoration-none {{request()->routeIs('configuración')?'active_custom':''}} text-white"><i class="fa-solid fa-gear"></i> Configuración</a></h5>
                
                <h5 class="p-2">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn text-decoration-none text-white"><i class="fa-solid fa-right-from-bracket"></i> Salir</button>
                    </form>
                </h5>
            </div>
        </div>

        <!-- Contenido principal (Formulario de edición de materia) -->
        <div class="col-10 p-4">
            <div class="card shadow-lg rounded p-4" style="background-color: #d2b48c;">
                <h1 class="bg-warning text-dark p-4 rounded-top text-center" style="font-family: 'Fenix', serif; font-size: 2.5rem;">Editar Materia</h1>
                
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
