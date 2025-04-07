@extends('layouts.app')

@section('content')
<div class="container-fluid bg-light">
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
                
                <h5 class="p-2"><a href="{{route('productos.index')}}" class="btn text-decoration-none {{request()->routeIs('productos.index')?'active_custom':''}} text-white"><i class="fa-solid fa-barcode"></i> Productos</a></h5>
                
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

        <!-- Contenido principal -->
        <div class="col-7 p-5">
            <input type="text" class="form-control mb-4 border-0 shadow-sm" placeholder="Buscar">
            
            <h3 class="bg-primary text-white p-3 rounded-top">Categorías</h3>
            <div class="row gap-3">
                <div class="col p-3 card text-center shadow-sm bg-light rounded">
                    <h5 class="text-dark fw-bold"><i class="fa-solid fa-boxes-stacked"></i> Stock de productos</h5>
                    <h5 class="text-muted">5000 chocolates</h5>
                    <h5 class="text-muted">2000 chili gomi</h5>
                    <h5 class="text-muted">6000 dulces</h5>
                    <h5 class="text-muted">1000 especiales</h5>
                </div>
                <div class="col p-3 card text-center shadow-sm bg-light rounded">
                    <h5 class="text-dark fw-bold"><i class="fa-solid fa-dollar-sign"></i> Total ventas</h5>
                    <h5 class="text-muted">10500 realizadas</h5>
                </div>
                <div class="col p-3 card text-center shadow-sm bg-light rounded">
                    <h5 class="text-dark fw-bold"><i class="fa-solid fa-box-open"></i> Pedidos pendientes</h5>
                    
                </div>
            </div>

            <h3 class="bg-primary text-white p-3 rounded-top mt-4">Productos</h3>
            <div class="row gap-3">
                <div class="col p-3 card text-center shadow-sm bg-light rounded">
                    <h5 class="text-dark fw-bold"><i class="fa-solid fa-gift"></i> Chocolates</h5>
                </div>
                <div class="col p-3 card text-center shadow-sm bg-light rounded">
                    <h5 class="text-dark fw-bold"><i class="fa-solid fa-candy-cane"></i> Dulces</h5>
                </div>
                <div class="col p-3 card text-center shadow-sm bg-light rounded">
                    <h5 class="text-dark fw-bold"><i class="fa-solid fa-star"></i> Especiales</h5>
                </div>
            </div>
            
            <h3 class="bg-primary text-white p-3 rounded-top mt-4">Personas</h3>
            <div class="row gap-3">
                <div class="col p-3 card text-center shadow-sm bg-light rounded">
                    <h5 class="text-dark fw-bold"><i class="fa-solid fa-person"></i> <i class="fa-solid fa-person-dress"></i> Clientes</h5>
                </div>
                <div class="col p-3 card text-center shadow-sm bg-light rounded">
                    <h5 class="text-dark fw-bold"><i class="fa-solid fa-people-group"></i> Empleados</h5>
                </div>
                <div class="col p-3 card text-center shadow-sm bg-light rounded">
                    <h5 class="text-dark fw-bold"><i class="fa-solid fa-truck-moving"></i> Proveedores</h5>
                </div>
            </div>
            <h3 class="bg-primary text-white p-3 rounded-top mt-4">Más</h3>
            <div class="row gap-3">
                <div class="col p-3 card text-center shadow-sm bg-light rounded">
                    <h5 class="text-dark fw-bold"><i class="fa-solid fa-cube"></i> Materias</h5>
                </div>
                <div class="col p-3 card text-center shadow-sm bg-light rounded">
                    <h5 class="text-dark fw-bold"><i class="fa-solid fa-cart-flatbed"></i> Producciones</h5>
                </div>
                <div class="col p-3 card text-center shadow-sm bg-light rounded">
                    <h5 class="text-dark fw-bold"><i class="fa-solid fa-person-digging"></i> Maquinarias</h5>
                </div>
            </div>
        </div>

        <!-- Opciones de la barra derecha -->
        <div class="col-3 p-4">
            <div class="border p-3 text-center bg-light shadow-sm rounded">
                <h3 class="bg-primary text-white p-2 rounded-top">Opciones</h3>
            </div>
            <div class="card p-3 mt-3">
                <h5><i class="fa-solid fa-plus"></i> Agregar Producto</h5>
                <div class="dropdown mt-2">
                    <button class="btn btn-secondary dropdown-toggle w-100 bg-primary" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        Selecciona
                    </button>
                    <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton" style="background-color: #d2b29e;">
                    <li><a class="dropdown-item" href="{{ route('chocolates.index') }}">Chocolate</a></li>
                        <li><a class="dropdown-item" href="#">Dulces</a></li>
                        <li><a class="dropdown-item" href="#">Especiales</a></li>
                    </ul>
                </div>
            </div>

            <div class="card p-3 mt-2">
                <h5><i class="fa-solid fa-plus"></i> Agregar una persona</h5>
                <div class="dropdown mt-2">
                    <button class="btn btn-secondary dropdown-toggle w-100 bg-primary" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        Selecciona 
                    </button>
                    <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton" style="background-color: #d2b29e;">
                        
                        <li><a class="dropdown-item" href="{{ route('empleados.index') }}">Empleados</a></li>
                        <li><a class="dropdown-item" href="{{ route('clientes.index') }}">Clientes</a></li>
                        <li><a class="dropdown-item" href="{{ route('proveedores.index') }}">Proveedores</a></li>
                        
                    </ul>
                </div>
            </div>
            
            <div class="card p-3 mt-2">
                <h5><i class="fa-solid fa-plus"></i> Agregar otra acción</h5>
                <div class="dropdown mt-2">
                    <button class="btn btn-secondary dropdown-toggle w-100 bg-primary" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                        Selecciona 
                    </button>
                    <ul class="dropdown-menu w-100" aria-labelledby="dropdownMenuButton" style="background-color: #d2b29e;">
                        <li><a class="dropdown-item" href="{{ route('materias.index') }}">Materias</a></li>
                        <li><a class="dropdown-item" href="#">Producciones</a></li>
                        <li><a class="dropdown-item" href="#">Maquinarias</a></li>
                    </ul>
                </div>
            </div>
            
        </div>
    </div>
</div>
@endsection

