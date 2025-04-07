@extends('layouts.app')

@section('content')
<div class="container-fluid bg-light">
    <div class="row" style="height: 100vh;">
        
        <!-- Barra de navegación izquierda con botones -->
        <div class="col-2 bg-primary p-4 text-light rounded-start shadow-lg h-100">
            <img src="{{ asset('img/logo.jpg') }}" class="rounded-circle mx-auto d-block mb-3" style="width: 150px; height: 150px;" alt="Fotografía">
            
            <div class="mt-4">
                    <h5 class="p-2"><a href="{{url('ventas')}}" class=" btn text-decoration-none {{request()->routeIs('ventas')?'active_custom':''}} text-white"><i class="fa-solid fa-cart-shopping"></i> Ventas</a></h5>
                
               

                    <h5 class="p-2"><a href="{{url('clientes')}}" class=" btn text-decoration-none {{request()->routeIs('clientes')?'active_custom':''}} text-white"><i class="fa-solid fa-user-group"></i> Clientes
                    </a></h5>
              
                <h5 class="p-2"><a href="{{url('pedidos')}}" class=" btn text-decoration-none {{request()->routeIs('pedidos')?'active_custom':''}} text-white"><i class="fa-solid fa-box"></i> Pedidos
                    </a></h5>
            </div>

            <div class="mt-4 border-top pt-4">
                
                <h5 class="p-2"><a href="{{url('configuración')}}" class=" btn text-decoration-none {{request()->routeIs('configuración')?'active_custom':''}} text-white"><i class="fa-solid fa-gear"></i> Configuración
                    </a></h5>
                
                <h5 class="p-2"><a href="{{url('salida')}}" class=" btn text-decoration-none {{request()->routeIs('salida')?'active_custom':''}} text-white"><i class="fa-solid fa-right-from-bracket"></i> Salir
                    </a></h5>
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
                    <h5 class="text-muted">20 pendientes</h5>
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
        </div>

        <!-- Opciones de la barra derecha -->
        <div class="col-3 p-4">
            <div class="border p-3 text-center bg-light shadow-sm rounded">
                <h3 class="bg-primary text-white p-2 rounded-top">Opciones</h3>
            </div>
            <div class="card p-3 mt-3">
                <h5><i class="fa-solid fa-plus"></i> Agregar Producto</h5>
            </div>

            <div class="card p-3 mt-2">
                <h5><i class="fa-solid fa-chart-line"></i> Generar Reporte</h5>
            </div>

            <div class="card p-3 mt-2">
                <h5><i class="fa-solid fa-web-awesome"></i> Promociones</h5>
            </div>
        </div>
    </div>
</div>
@endsection
