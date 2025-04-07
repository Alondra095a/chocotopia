@extends('layouts.app')

@section('content')
<div class="container-fluid bg-light">
    <div class="row" style="height: 100vh;">
        
        <!-- Barra de navegación izquierda con botones -->
        <div class="col-2 bg-primary p-4 text-light rounded-start shadow-lg h-100">
            <img src="{{ asset('img/logo.jpg') }}" class="rounded-circle mx-auto d-block mb-3" style="width: 150px; height: 150px;" alt="Fotografía">
            
            <div class="mt-4">
            <h5 class="p-2"><a href="{{url('ventas')}}" class=" btn text-decoration-none {{request()->routeIs('ventas')?'active_custom':''}} text-white"><i class="fa-solid fa-cart-shopping"></i> Ventas</a></h5>
                
                
                <h5 class="p-2"><a href="{{url('chocotopia')}}" class=" btn text-decoration-none {{request()->routeIs('chocotopia')?'active_custom':''}} text-white"><i class="fa-solid fa-user-group"></i> Regresar</a></h5>
                <h5 class="p-2"><a href="{{url('pedidos')}}" class=" btn text-decoration-none {{request()->routeIs('pedidos')?'active_custom':''}} text-white"><i class="fa-solid fa-box"></i> Pedidos
                    </a></h5>
            </div>

            <div class="mt-4 border-top pt-4">
                <h5 class="p-3 text-uppercase"><i class="fa-solid fa-gear"></i> Configuración</h5>
                <h5 class="p-3 text-uppercase"><i class="fa-solid fa-right-from-bracket"></i> Salir</h5>
            </div>
        </div>
        <div class="col-7 p-5">
            <input type="text" class="form-control mb-4 border-0 shadow-sm" placeholder="Buscar">
            
            <h3 class="bg-primary text-white p-3 rounded-top">Clientes registrados</h3>
            
        </div>
        @endsection