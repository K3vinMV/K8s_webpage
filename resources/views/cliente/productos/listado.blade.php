@extends('layouts.app') <!-- Usa el layout general -->

@section('title', 'Listado de Productos')

@section('content')
<div class="container">
    <h1 class="my-4 text-center">Listado de Productos</h1>
    
    <div class="row">
        @foreach($productos as $producto)
        <div class="col-md-4 mb-4">
            <div class="card h-100">
                <!-- Imagen del producto -->
                <img src="{{ asset('storage/' . $producto->imagen) }}" class="card-img-top" alt="{{ $producto->nombre }}">
                
                <div class="card-body">
                    <!-- Nombre del producto -->
                    <h5 class="card-title">{{ $producto->nombre }}</h5>

                    <!-- Descripción -->
                    <p class="card-text">{{ Str::limit($producto->descripcion, 100) }}</p>

                    <!-- Precio -->
                    <p class="card-text"><strong>Precio:</strong> ${{ number_format($producto->precio, 2) }}</p>

                    <!-- Stock -->
                    <p class="card-text">
                        <strong>Disponibilidad:</strong> 
                        {{ $producto->stock > 0 ? 'En stock (' . $producto->stock . ' disponibles)' : 'Agotado' }}
                    </p>

                    <!-- Producto destacado -->
                    @if($producto->destacado)
                    <span class="badge bg-warning text-dark">Destacado</span>
                    @endif
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection