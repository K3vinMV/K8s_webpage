@extends('layouts.template')

@section('content')
<!-- Shop Section Begin -->
<h2 class="text-center">Productos</h2>
<section class="shop spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">
                <div class="shop__sidebar">
                    <div class="shop__sidebar__search">
                        <form action="{{ route('cliente.productos.index') }}" method="GET">
                            <input type="text" name="search" placeholder="Buscar..." value="{{ request('search') }}">
                            <button type="submit"><span class="icon_search"></span></button>
                        </form>
                    </div>
                    <div class="shop__sidebar__accordion">
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-heading">
                                    <a data-toggle="collapse" data-target="#collapseOne">Categorías</a>
                                </div>
                                <div id="collapseOne" class="collapse show" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <div class="shop__sidebar__categories">
                                            <ul class="nice-scroll">
                                                @foreach($categorias as $categoria)
                                                    <li>
                                                        <a href="{{ route('cliente.productos.index', ['categoria' => $categoria->id]) }}">
                                                            {{ $categoria->nombre }} ({{ $categoria->productos_count }})
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-9">
                <div class="row">
                    @forelse($productos as $producto)
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="product__item">
                                <div class="product__item__pic set-bg" data-setbg="{{ asset('storage/' . $producto->imagen) }}">
                                    @if($producto->destacado)
                                    <span class="label" style="background-color: black; color: white; padding: 5px; border-radius: 3px;">Destacado</span>
                                    @endif
                                    <ul class="product__hover">
                                        <li><a href="#"><img src="{{ asset('img/icon/heart.png') }}" alt=""></a></li>
                                        <li><a href="{{ route('cliente.productos.show', $producto->id) }}"><img src="{{ asset('img/icon/search.png') }}" alt=""></a></li>
                                    </ul>
                                </div>
                                <div class="product__item__text">
                                    <h6>{{ $producto->nombre }}</h6>
                                    <a href="{{ route('cliente.productos.show', $producto->id) }}" class="add-cart">+ Ver Detalles</a>
                                    <h5>${{ number_format($producto->precio, 2) }}</h5>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="col-12">
                            <p class="text-center">No se encontraron productos.</p>
                        </div>
                    @endforelse
                </div>
            </div>

        </div>
    </div>
</section>
<!-- Shop Section End -->
@endsection

