@extends('layouts.app')

@section('content')

    <!-- Barra de navegación encima del carrusel -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark position-relative" style="z-index: 10;">
        <div class="container">
            <!-- Logo dentro de un círculo pequeño -->
            <a class="navbar-brand" href="#">
                <img src="{{ asset('img/log2.jpg') }}" alt="Logo" style="width: 90px; height: 90px; border-radius: 50%;">
            </a>
            <!-- Enlaces de la barra de navegación -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="#products"><i class="fa-solid fa-cart-shopping"></i> Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#promotions"><i class="fa-solid fa-bag-shopping"></i> Promociones</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#contact"><i class="fa-solid fa-phone"></i> Contacto</a>
                    </li>
                    <!-- Opción para registrar -->
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}"><i class="fa-solid fa-user-plus"></i> Registrar </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"><i class="fa-solid fa-user"></i> Login </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <header class="hero">
        <div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
            <div class="carousel-inner">
                <!-- Primer Imagen -->
                <div class="carousel-item active">
                    <img src="{{ asset('img/choco.jpeg') }}" class="d-block w-100" alt="Imagen 1" style="height: 500px; object-fit: cover;">
                </div>
                <!-- Segunda Imagen -->
                <div class="carousel-item">
                    <img src="{{ asset('img/dul.jpeg') }}" class="d-block w-100" alt="Imagen 2" style="height: 500px; object-fit: cover;">
                </div>
                <!-- Tercer Imagen -->
                <div class="carousel-item">
                    <img src="{{ asset('img/chf.jpg') }}" class="d-block w-100" alt="Imagen 3" style="height: 500px; object-fit: cover;">
                </div>
                <!-- Cuarta Imagen -->
                <div class="carousel-item">
                    <img src="{{ asset('img/ccho.jpg') }}" class="d-block w-100" alt="Imagen 4" style="height: 500px; object-fit: cover;">
                </div>
            </div>
        </div>

        <!-- Contenedor de texto con fondo semi-transparente sobre el carrusel -->
        <div class="position-absolute top-50 start-50 translate-middle text-center" style="z-index: 2; width: 80%; max-width: 600px;">
            <div class="bg-dark bg-opacity-50 p-4 rounded">
                <h1 class="display-4 text-white" style="font-size: 2.5rem;">BIENVENIDO A CHOCOTOPIA</h1>
                <h3 class="text-white mb-4" style="font-size: 1.5rem;">El paraíso del chocolate y los dulces más exquisitos</h3>
            </div>
        </div>
    </header>
    
    <section id="about" class="container text-center my-5">
        <div class="d-flex align-items-center justify-content-center">
            <!-- Logo dentro de un círculo pequeño -->
            <img src="{{ asset('img/log2.jpg') }}" alt="Logo" class="rounded-circle" style="width: 200px; height: 200px; margin-right: 20px;">
            <div>
                <h2 class="fw-bold text-uppercase text-dark" >Sobre Nosotros</h2><br>
                <p class="fs-4  ">Empresa dedicada a la producción y comercialización de chocolates y dulces, combinando tradición, innovación y calidad en cada uno de sus productos. Chocotopía se ha distinguido por su compromiso con la excelencia, trabajando con productores locales para obtener el mejor cacao y materias primas naturales. Gracias a su enfoque en la calidad y la creatividad, ha logrado expandirse, consolidándose como una marca de referencia en el mercado de confitería.</p>
            </div>
        </div>
    </section>
    
    <section id="products" class="container text-center my-5">
    <h2 class="mb-4 bg-primary p-2 mb-4 text-white">Nuestros Productos</h2>

    <div id="carouselProductos" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            @foreach($productos->chunk(3) as $chunkIndex => $chunk)
            <div class="carousel-item {{ $chunkIndex == 0 ? 'active' : '' }}">
                <div class="row justify-content-center">
                    @foreach($chunk as $producto)
                    <div class="col-md-4 mb-4">
                        <div class="card h-100 shadow">
                            @if($producto->imagen)
                                <img src="{{ asset('storage/' . $producto->imagen) }}" class="card-img-top" alt="{{ $producto->nombre_producto }}" style="height: 300px; object-fit: cover;">
                            @else
                                <img src="{{ asset('img/sin_imagen.jpg') }}" class="card-img-top" alt="Sin imagen" style="height: 300px; object-fit: cover;">
                            @endif
                            <div class="card-body">
                                <h5 class="card-title">{{ $producto->nombre_producto }}</h5>
                                <p class="card-text">{{ $producto->descripcion ?? 'Sin descripción' }}</p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
            @endforeach
        </div>

        <!-- Controles -->
        <button class="carousel-control-prev" type="button" data-bs-target="#carouselProductos" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselProductos" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>
    </div>
</section>


    <!-- Nueva sección para las promociones dinámicas -->
<section id="promotions" class="container text-center my-5">
    <h2 class="mb-4 bg-primary p-2 text-white">Promociones</h2>
    <div class="row">
        @forelse($promociones as $promo)
            <div class="col-md-4 mb-4">
                <div class="card h-100 shadow-sm">
                    @if($promo->imagen_producto)
                        <img src="{{ asset('storage/' . $promo->imagen_producto) }}" class="card-img-top" alt="{{ $promo->titulo }}" style="height: 450px; object-fit: cover;">
                    @else
                        <img src="{{ asset('img/sin_imagen.jpg') }}" class="card-img-top" alt="Sin imagen" style="height: 450px; object-fit: cover;">
                    @endif

                    <div class="card-body">
                        <h5 class="card-title">{{ $promo->titulo }}</h5>
                        <p class="card-text">{{ $promo->descripcion }}</p>
                        <small class="text-muted">Válida del {{ $promo->fecha_inicio }} al {{ $promo->fecha_fin }}</small>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="text-muted">No hay promociones activas en este momento.</p>
            </div>
        @endforelse
    </div>
</section>

    
    <section id="contact" class="container text-center my-5">
        <h2 class="bg-primary text-white text-center py-3">Contacto</h2>
        <p><i class="fa-solid fa-location-dot"></i> Valle de Bravo Estado de México, Independencia No: 25</p>
        <p> <i class="fa-solid fa-envelope"></i><a href="zepedal005@gmail.com" class="text-decoration-none"> chocotecnico@chocotopia.com</a></p>
        <p><i class="fa-solid fa-phone"></i> +52 561 128 8992</p>
    </section>
    
    <footer class="bg-primary text-white text-center p-2">
        <p>&copy; 2025 Chocotopia. Todos los derechos reservados.</p>
    </footer>
    @if(session('status'))
    <div class="alert alert-info text-left" role="alert">
        {{ session('status') }}
    </div>
    @endif


@endsection
