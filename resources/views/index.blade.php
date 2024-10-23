@extends('layouts.template')

@section('content')

    <!-- Introducción -->
    <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>¡Bienvenido a <strong>Game Set Match!</h2>
                        <span>Tu tienda online especializada en todo lo necesario para el tennis y el pádel.</span>
                    </div>
                </div>
            </div>
    </div>

    <!-- Banner Section Begin -->
    <section class="banner spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 offset-lg-6 mb-5">
                    <div class="banner__item">
                        <div class="banner__item__pic">
                            <img src="images/categoria_raquetas.jpg" alt="Raquetas" class="img-fluid" style="height: 300px; object-fit: cover;">
                        </div>
                        <div class="banner__item__text mt-2 text-start">
                            <h2>Tennis</h2>
                            <a href="{{ route('cliente.productos.index', ['categoria' => 1]) }}" class="btn">Comprar Ahora</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 mb-2">
                    <div class="banner__item banner__item--middle">
                        <div class="banner__item__pic">
                            <img src="images/categoria_accesorios.jpg" alt="Accesorios" class="img-fluid" style="height: 300px; object-fit: cover;">
                        </div>
                        <div class="banner__item__text mt-2 text-end">
                            <h2>Accesorios</h2>
                            <a href="{{ route('cliente.productos.index', ['categoria' => 2]) }}" class="btn">Comprar Ahora</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-7 offset-lg-6 mb-1">
                    <div class="banner__item">
                        <div class="banner__item__pic">
                            <img src="images/categoria_padel.jpg" alt="Padel" class="img-fluid" style="height: 300px; object-fit: cover;">
                        </div>
                        <div class="banner__item__text mt-2 text-start">
                            <h2>Pádel</h2>
                            <a href="{{ route('cliente.productos.index', ['categoria' => 3]) }}" class="btn">Comprar Ahora</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Banner Section End -->

    <!-- Product Section Begin -->
    <section class="product spad">
        <div class="container mt-5">
            <h2 class="text-center mb-4">Productos Destacados</h2>
            <div class="row product__filter">
                @foreach ($productosDestacados as $producto)
                    <div class="col-lg-3 col-md-6 col-sm-6 mix hot-sales">
                        <div class="product__item">
                            <div class="product__item__pic set-bg" data-setbg="{{ asset('storage/' . $producto->imagen) }}">
                                <ul class="product__hover">
                                    <li><a href="#"><img src="img/icon/heart.png" alt=""></a></li>
                                </ul>
                            </div>
                            <div class="product__item__text">
                                <h6>{{ $producto->nombre }}</h6>
                                <a href="#" class="add-cart">+ Ver Detalles</a>
                                <h5>${{ number_format($producto->precio, 2) }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Product Section End -->


    <!-- Latest Blog Section Begin --> 
    <section class="latest spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>Blog</h2>
                        <span>Enterate de las novedades de la comunidad del Tennis y Pádel!</span>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach($blogs as $blog)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic set-bg" data-setbg="{{ asset('storage/' . $blog->imagen) }}"></div>
                            <div class="blog__item__text">
                                <span><img src="{{ asset('img/icon/calendar.png') }}" alt="">{{ $blog->created_at->format('d F Y') }}</span>
                                <h5>{{ $blog->titulo }}</h5>
                                <a href="{{ route('blog.show', $blog->id) }}">Read More</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Latest Blog Section End -->
@endsection
