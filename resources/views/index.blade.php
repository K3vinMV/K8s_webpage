@extends('layouts.template')

@section('content')
    <!-- Introducción -->
    <div class="container mt-5">
        <div class="text-center">
            <h1 class="display-4">¡Bienvenido a <strong>Game Set Match!</strong></h1>
            <p class="lead">Tu tienda online especializada en todo lo necesario para el tenis y el pádel. Aquí encontrarás las mejores raquetas, pelotas, accesorios y mucho más. Estamos dedicados a ofrecerte productos de calidad para que lleves tu juego al siguiente nivel.</p>
            <hr class="my-4">
            <p>Descubre nuestras categorías destacadas y productos exclusivos para hacer de tu experiencia deportiva algo inigualable.</p>
        </div>
    </div>

    <!-- Productos Destacados -->
    <div class="container mt-5">
        <h2 class="text-center mb-4">Productos Destacados</h2>
        <div class="row">
            @foreach ($productosDestacados as $producto)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 shadow">
                        <img src="{{ asset('storage/' . $producto->imagen) }}" class="card-img-top" alt="{{ $producto->nombre }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $producto->nombre }}</h5>
                            <p class="card-text">${{ number_format($producto->precio, 2) }}</p>
                            <a href="{{ route('productos.show', $producto->id) }}" class="btn btn-primary">Ver Detalles</a>
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
            <div class="col-md-4 mb-4">
                <div class="card text-center shadow">
                    <img src="{{ asset('images/categoria_raquetas.jpg') }}" class="card-img-top" alt="Raquetas">
                    <div class="card-body">
                        <h5 class="card-title">Raquetas</h5>
                        <a href="#" class="btn btn-secondary">Ver Raquetas</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-center shadow">
                    <img src="{{ asset('images/categoria_accesorios.jpg') }}" class="card-img-top" alt="Accesorios">
                    <div class="card-body">
                        <h5 class="card-title">Accesorios</h5>
                        <a href="#" class="btn btn-secondary">Ver Accesorios</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4 mb-4">
                <div class="card text-center shadow">
                    <img src="{{ asset('images/categoria_padel.jpg') }}" class="card-img-top" alt="Pádel">
                    <div class="card-body">
                        <h5 class="card-title">Pádel</h5>
                        <a href="#" class="btn btn-secondary">Ver Pádel</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Llamado a la acción -->
    <div class="container mt-5 text-center">
        <h3 class="mb-4">¿Listo para mejorar tu juego?</h3>
        <a href="{{ route('productos.index') }}" class="btn btn-lg btn-success">Explora todo nuestro catálogo</a>
    </div>
@endsection
