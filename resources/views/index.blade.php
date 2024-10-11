@extends('layouts.template')

@section('content')
    <!-- Banner Principal -->
    <div id="bannerPrincipal" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('images/banner1.jpg') }}" class="d-block w-100" alt="Promoción 1">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Bienvenido a Tienda Tenis&Pádel</h5>
                    <p>Encuentra todo lo que necesitas para tu juego.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/banner2.jpg') }}" class="d-block w-100" alt="Promoción 2">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Ofertas Especiales</h5>
                    <p>Descuentos en raquetas y accesorios seleccionados.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="{{ asset('images/banner3.jpg') }}" class="d-block w-100" alt="Promoción 3">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Nuevas Llegadas</h5>
                    <p>Explora nuestros nuevos productos de pádel.</p>
                </div>
            </div>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#bannerPrincipal" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Anterior</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#bannerPrincipal" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Siguiente</span>
        </button>
    </div>

    <!-- Productos Destacados -->
    <div class="container mt-5">
        <h2 class="text-center mb-4">Productos Destacados</h2>
        <div class="row">
            @foreach ($productosDestacados as $producto)
                <div class="col-md-4 mb-4">
                    <div class="card h-100">
                        <img src="{{ asset('storage/' . $producto->imagen) }}" class="card-img-top" alt="{{ $producto->nombre }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $producto->nombre }}</h5>
                            <p class="card-text">${{ number_format($producto->precio, 2) }}</p>
                            {{-- <a href="{{ route('productos.show', $producto->id) }}" class="btn btn-primary">Ver Detalles</a> --}}
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <!-- Categorías -->
    <div class="container mt-5">
        <h2 class="text-center mb-4">Categorías</h2>
        <div class="row">
            <div class="col-md-3 mb-4">
                <div class="card text-center">
                    <img src="{{ asset('images/categoria_raquetas.jpg') }}" class="card-img-top" alt="Raquetas">
                    <div class="card-body">
                        <h5 class="card-title">Raquetas</h5>
                        <a href="#" class="btn btn-secondary">Ver Raquetas</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card text-center">
                    <img src="{{ asset('images/categoria_pelotas.jpg') }}" class="card-img-top" alt="Pelotas">
                    <div class="card-body">
                        <h5 class="card-title">Pelotas</h5>
                        <a href="#" class="btn btn-secondary">Ver Pelotas</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card text-center">
                    <img src="{{ asset('images/categoria_accesorios.jpg') }}" class="card-img-top" alt="Accesorios">
                    <div class="card-body">
                        <h5 class="card-title">Accesorios</h5>
                        <a href="#" class="btn btn-secondary">Ver Accesorios</a>
                    </div>
                </div>
            </div>
            <div class="col-md-3 mb-4">
                <div class="card text-center">
                    <img src="{{ asset('images/categoria_padel.jpg') }}" class="card-img-top" alt="Pádel">
                    <div class="card-body">
                        <h5 class="card-title">Pádel</h5>
                        <a href="#" class="btn btn-secondary">Ver Pádel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection