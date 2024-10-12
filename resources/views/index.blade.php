@extends('layouts.template')

@section('content')

    <!-- Introducción -->
    <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <h2>¡Bienvenido a <strong>Game Set Match!</h2>
                        <span>Tu tienda online especializada en todo lo necesario para el tenis y el pádel.</span>
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
                            <a href="#" class="btn">Comprar Ahora</a>
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
                            <a href="#" class="btn">Comprar Ahora</a>
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
                            <a href="#" class="btn">Comprar Ahora</a>
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
                                <a href="{{ route('productos.show', $producto->id) }}" class="add-cart">+ Ver Detalles</a>
                                <div class="rating">
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </div>
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
                        <span>Latest News</span>
                        <h2>Fashion New Trends</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-1.jpg"></div>
                        <div class="blog__item__text">
                            <span><img src="img/icon/calendar.png" alt=""> 16 February 2020</span>
                            <h5>What Curling Irons Are The Best Ones</h5>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-2.jpg"></div>
                        <div class="blog__item__text">
                            <span><img src="img/icon/calendar.png" alt=""> 21 February 2020</span>
                            <h5>Eternity Bands Do Last Forever</h5>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6">
                    <div class="blog__item">
                        <div class="blog__item__pic set-bg" data-setbg="img/blog/blog-3.jpg"></div>
                        <div class="blog__item__text">
                            <span><img src="img/icon/calendar.png" alt=""> 28 February 2020</span>
                            <h5>The Health Benefits Of Sunglasses</h5>
                            <a href="#">Read More</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Latest Blog Section End -->
@endsection
