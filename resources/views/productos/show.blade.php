@extends('layouts.template')

@section('content')
    <div class="container">
        <h1>Detalles del Producto</h1>

        <div class="card">
            <div class="card-body">
                <h3 class="card-title">{{ $producto->nombre }}</h3>
                <!-- Mostrar categorías -->
                <p class="card-text"><strong>Categorías:</strong> 
                    @if($producto->categorias->isEmpty())
                        Sin categorías
                    @else
                        {{ $producto->categorias->pluck('nombre')->implode(', ') }}
                    @endif
                </p>
                <p class="card-text"><strong>Descripción:</strong> {{ $producto->descripcion }}</p>
                <p class="card-text"><strong>Precio:</strong> ${{ $producto->precio }}</p>
                <p class="card-text"><strong>Destacado:</strong> {{ $producto->destacado ? 'Sí' : 'No' }}</p>
                <p class="card-text"><strong>Stock:</strong> {{ $producto->stock }}</p>
                <img src="{{ asset('storage/' . $producto->imagen) }}" alt="Imagen del Producto" class="img-fluid">
            </div>
        </div>

        <a href="{{ route('productos.index') }}" class="btn btn-secondary mt-3">Regresar</a>
    </div>
@endsection