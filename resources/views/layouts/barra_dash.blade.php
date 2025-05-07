<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
     <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Dashboard</title>
    <title>{{ config('app.name', 'Laravel') }}</title>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.bunny.net">
<link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

<!-- Scripts -->
@vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>

<div class="container-fluid">
    <div class="row" style="height: 100vh;">

        <!-- Barra lateral izquierda -->
        <div class="col-2 p-4 text-light rounded-start shadow-lg d-flex flex-column" style="background-color:rgb(49, 23, 9);">

            <img src="{{ asset('img/log2.jpg') }}" class="rounded-circle mx-auto d-block mb-3" style="width: 150px; height: 150px;" alt="Fotografía">
            
            <div class="text-center text-white mt-2 mb-4" style="font-family: 'Fenix', serif; font-size: 24px;">
                <p>{{ Auth::user()->name }}</p>
            </div>

            <div class="mt-4">
                <h5 class="p-2"><a href="{{url('ventas')}}" class="btn text-decoration-none {{request()->routeIs('ventas')?'active_custom':''}} text-white"><i class="fa-solid fa-cart-shopping"></i> Ventas</a></h5>
                <h5 class="p-2"><a href="{{route('productos.index')}}" class="btn text-decoration-none {{request()->routeIs('productos.index')?'active_custom':''}} text-white"><i class="fa-solid fa-barcode"></i> Productos</a></h5>
                <h5 class="p-2"><a href="{{ route('pedidos.index') }}" class="btn text-decoration-none {{ request()->routeIs('pedidos.index') ? 'active_custom' : '' }} text-white"><i class="fa-solid fa-box"></i> Pedidos</a></h5>
                <h5 class="p-2"><a href="{{ route('personas.index') }}" class="btn text-decoration-none {{ request()->routeIs('personas.index') ? 'active_custom' : '' }} text-white"><i class="fa-solid fa-users"></i> Personas</a></h5>
            </div>

            <div class="mt-4 border-top pt-4">
                <h5 class="p-2"><a href="{{url('configuracion')}}" class="btn text-decoration-none {{request()->routeIs('configuracion')?'active_custom':''}} text-white"><i class="fa-solid fa-gear"></i> Configuración</a></h5>
                <h5 class="p-2">
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button type="submit" class="btn text-decoration-none text-white"><i class="fa-solid fa-right-from-bracket"></i> Salir</button>
                    </form>
                </h5>
            </div>
        </div>

        <!-- Contenido de las vistas -->
        <div class="col-10 p-4 overflow-auto">
            @yield('content')
        </div>

    </div>
</div>


</body>
</html>
