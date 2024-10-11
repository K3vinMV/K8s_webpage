@extends('layouts.template')

@section('content')
    <div class="container">
        <h1>Editar Producto</h1>

        <form action="{{ route('productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Producto</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $producto->nombre }}" required>
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required>{{ $producto->descripcion }}</textarea>
            </div>

            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" class="form-control" id="precio" name="precio" step="0.01" value="{{ $producto->precio }}" required>
            </div>

            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen del Producto</label>
                <input type="file" class="form-control" id="imagen" name="imagen">
                <img src="{{ asset('storage/' . $producto->imagen) }}" alt="Imagen del Producto" class="img-fluid mt-3">
            </div>

            <div class="mb-3">
                <label for="destacado" class="form-label">¿Producto Destacado?</label>
                <select class="form-select" id="destacado" name="destacado" required>
                    <option value="0" {{ !$producto->destacado ? 'selected' : '' }}>No</option>
                    <option value="1" {{ $producto->destacado ? 'selected' : '' }}>Sí</option>
                </select>
            </div>

            <div class="mb-3">
                <label for="stock" class="form-label">Cantidad en Stock</label>
                <input type="number" class="form-control" id="stock" name="stock" value="{{ $producto->stock }}" required>
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Producto</button>
        </form>
    </div>
@endsection