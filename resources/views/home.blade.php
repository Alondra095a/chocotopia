@extends('layouts.barra_dash')

@section('content')
<div class="row gx-4">
    <!-- CONTENIDO PRINCIPAL -->
    <div class="col-9">
        <input type="text" class="form-control mb-4 border-0 shadow-sm" placeholder="Buscar">

        <h3 class="text-white p-3 rounded-top" style="background-color: #3c1f0e;">Categorías</h3>
        <div class="row gap-3">
            <div class="col p-3 card text-center shadow-sm bg-light rounded">
                <h5 class="text-dark fw-bold"><i class="fa-solid fa-boxes-stacked"></i> Stock de productos</h5>
                <ul class="list-unstyled mt-2 text-start" style="font-size: 0.9rem;">
                <ul class="list-unstyled mt-2 text-start small" style="font-family: 'Tahoma';">
                @foreach($productos as $producto)
                    @php
                        $alerta = $producto->stock < 20 ? 'text-danger' : '';
                    @endphp
                    <li class="{{ $alerta }}">
                        {{ $producto->nombre_producto }}: <strong>{{ $producto->stock }}</strong> unidades
                    </li>
                @endforeach
                </ul>
            </div>
            <div class="col p-3 card text-center shadow-sm bg-light rounded">
                <h5 class="text-dark fw-bold"><i class="fa-solid fa-dollar-sign"></i> Total ventas</h5>
                
            </div>
            <div class="col p-3 card text-center shadow-sm bg-light rounded">
                <h5 class="text-dark fw-bold"><i class="fa-solid fa-box-open"></i> Pedidos pendientes</h5>
                <ul class="list-unstyled mt-2">
            @forelse($pedidosPendientes as $pedido)
                <li><strong>#{{ $pedido->id_pedido }}</strong> — {{ $pedido->descripcion ?? 'Sin descripción' }}</li>
            @empty
                <li class="text-muted">No hay pedidos pendientes</li>
            @endforelse
        </ul>
            </div>
        </div>

        <h3 class="text-white p-3 rounded-top mt-4" style="background-color: #3c1f0e;">Productos</h3>
        <div class="row gap-3">
            <div class="col p-3 card text-center shadow-sm bg-light rounded">
                <h5 class="text-dark fw-bold"><i class="fa-solid fa-gift"></i> Chocolates</h5>
                <ul class="list-unstyled mt-2 text-start small" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
        @foreach($chocolates as $choc)
            <li>
                {{ $choc->relleno }} — 
                <strong>${{ number_format($choc->producto->precio ?? 0, 2) }}</strong>
            </li>
        @endforeach
    </ul>
            </div>
            <div class="col p-3 card text-center shadow-sm bg-light rounded">
                <h5 class="text-dark fw-bold"><i class="fa-solid fa-candy-cane"></i> Dulces</h5>
                <ul class="list-unstyled mt-2 text-start small" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
        @foreach($dulces as $dulce)
            <li>
                {{ $dulce->producto->nombre_producto ?? 'N/A' }} —
                <strong>${{ number_format($dulce->producto->precio ?? 0, 2) }}</strong>
            </li>
        @endforeach
    </ul>
            </div>
            <div class="col p-3 card text-center shadow-sm bg-light rounded">
                <h5 class="text-dark fw-bold"><i class="fa-solid fa-star"></i> Especiales</h5>
                <ul class="list-unstyled mt-2 text-start small" style="font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;">
        @foreach($especiales as $esp)
            <li>
                {{ $esp->producto->nombre_producto ?? 'N/A' }} —
                
                <strong>${{ number_format($esp->producto->precio ?? 0, 2) }}</strong>
            </li>
        @endforeach
    </ul>
            </div>
        </div>

        <h3 class="text-white p-3 rounded-top mt-4" style="background-color: #3c1f0e;">Personas</h3>
        <div class="row gap-3">
            <div class="col p-3 card text-center shadow-sm bg-light rounded">
                <h5 class="text-dark fw-bold"><i class="fa-solid fa-person"></i> <i class="fa-solid fa-person-dress"></i> Clientes</h5>
                    <ul class="list-unstyled mt-2 text-start small">
                    @foreach($clientes as $c)
                    <li>{{ $c->nombre }} {{ $c->a_paterno }} {{ $c->a_materno }}</li>
                    @endforeach
                    </ul>
            </div>
            <div class="col p-3 card text-center shadow-sm bg-light rounded">
                <h5 class="text-dark fw-bold"><i class="fa-solid fa-people-group"></i> Empleados</h5>
                <ul class="list-unstyled mt-2 text-start small">
                    @foreach($empleados as $e)
                    <li>{{ $e->nombre }} {{ $e->a_paterno }} {{ $e->a_materno }}</li>
                    @endforeach
                </ul>

            </div>
            <div class="col p-3 card text-center shadow-sm bg-light rounded">
                <h5 class="text-dark fw-bold"><i class="fa-solid fa-truck-moving"></i> Proveedores</h5>
                <ul class="list-unstyled mt-2 text-start small">
                    @foreach($proveedores as $p)
                     <li>{{ $p->nombre }} {{ $p->a_paterno }} {{ $p->a_materno }}</li>
                    @endforeach
                </ul>

            </div>
        </div>

        <h3 class="text-white p-3 rounded-top mt-4" style="background-color: #3c1f0e;">Más</h3>
        <div class="row gap-3">
            <div class="col p-3 card text-center shadow-sm bg-light rounded">
                <h5 class="text-dark fw-bold"><i class="fa-solid fa-cube"></i> Materias Primas</h5>
                <ul class="list-unstyled mt-2 text-start small">
                    @foreach($materias as $m)
                    <li>{{ $m->nombre_materia }} — <strong>{{ $m->cantidad }}</strong> unidades</li>
                    @endforeach
                </ul>

            </div>
            <div class="col p-3 card text-center shadow-sm bg-light rounded">
                <h5 class="text-dark fw-bold"><i class="fa-solid fa-cart-flatbed"></i> Producciones</h5>
                <ul class="list-unstyled mt-2 text-start small">
                    @foreach($producciones as $prod)
                    <li>{{ $prod->nombre_producto }} ({{ $prod->fecha }}) — <strong>{{ $prod->cantidad }}</strong></li>
                    @endforeach
                </ul>

            </div>
            
        </div>
    </div>

    <!-- BARRA DE OPCIONES A LA DERECHA -->
    <div class="col-3">
        <div class="border p-3 text-center bg-light shadow-sm rounded">
            <h3 class="text-white p-2 rounded-top" style="background-color: #3c1f0e;">Opciones</h3>
        </div>

        <div class="card p-3 mt-3">
            <h5><i class="fa-solid fa-plus"></i> Agregar Producto</h5>
            <div class="dropdown mt-2">
                <button class="btn dropdown-toggle w-100 text-white" style="background-color: #3c1f0e;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Selecciona
                </button>
                <ul class="dropdown-menu w-100" style="background-color: #d2b29e;">
                    <li><a class="dropdown-item" href="{{ route('chocolates.index') }}">Chocolate</a></li>
                    <li><a class="dropdown-item" href="{{ route('dulces.index') }}">Dulces</a></li>
                    <li><a class="dropdown-item" href="{{ route('especiales.index') }}">Especiales</a></li>
                </ul>
            </div>
        </div>

        <div class="card p-3 mt-3">
            <h5><i class="fa-solid fa-plus"></i> Agregar una persona</h5>
            <div class="dropdown mt-2">
                <button class="btn dropdown-toggle w-100 text-white" style="background-color: #3c1f0e;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Selecciona
                </button>
                <ul class="dropdown-menu w-100" style="background-color: #d2b29e;">
                    <li><a class="dropdown-item" href="{{ route('empleados.index') }}">Empleados</a></li>
                    <li><a class="dropdown-item" href="{{ route('clientes.index') }}">Clientes</a></li>
                    <li><a class="dropdown-item" href="{{ route('proveedores.index') }}">Proveedores</a></li>
                </ul>
            </div>
        </div>

        <div class="card p-3 mt-3">
            <h5><i class="fa-solid fa-plus"></i> Agregar otra acción</h5>
            <div class="dropdown mt-2">
                <button class="btn dropdown-toggle w-100 text-white" style="background-color: #3c1f0e;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Selecciona
                </button>
                <ul class="dropdown-menu w-100" style="background-color: #d2b29e;">
                    <li><a class="dropdown-item" href="{{ route('materias.index') }}">Materias Primas</a></li>
                    <li><a class="dropdown-item" href="{{ route('producciones.index')}}">Producciones</a></li>
                   
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
