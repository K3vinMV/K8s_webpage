@extends('layouts.template')

@section('content')
    <div class="container">
        <h1>Editar Producto</h1>

        <form action="{{ route('productos.update', $producto->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Producto</label>
                <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{ old('nombre', $producto->nombre) }}" required>
                @error('nombre')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="categorias" class="form-label">Seleccionar Categorías</label>
                <div>
                    @foreach($categorias as $categoria)
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="categoria{{ $categoria->id }}" name="categorias[]" value="{{ $categoria->id }}" 
                                {{ $producto->categorias->contains($categoria->id) ? 'checked' : '' }}>
                            <label class="form-check-label" for="categoria{{ $categoria->id }}">
                                {{ $categoria->nombre }}
                            </label>
                        </div>
                    @endforeach
                </div>
                @error('categorias')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" rows="3" required>{{ old('descripcion', $producto->descripcion) }}</textarea>
                @error('descripcion')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" class="form-control @error('precio') is-invalid @enderror" id="precio" name="precio" step="0.01" value="{{ old('precio', $producto->precio) }}" required>
                @error('precio')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen del Producto</label>
                <input type="file" class="form-control @error('imagen') is-invalid @enderror" id="imagen" name="imagen">
                <img src="{{ asset('storage/' . $producto->imagen) }}" alt="Imagen del Producto" class="img-fluid mt-3">
                @error('imagen')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="destacado" class="form-label">¿Producto Destacado?</label>
                <select class="form-select @error('destacado') is-invalid @enderror" id="destacado" name="destacado" required>
                    <option value="0" {{ !$producto->destacado ? 'selected' : '' }}>No</option>
                    <option value="1" {{ $producto->destacado ? 'selected' : '' }}>Sí</option>
                </select>
                @error('destacado')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="stock" class="form-label">Cantidad en Stock</label>
                <input type="number" class="form-control @error('stock') is-invalid @enderror" id="stock" name="stock" value="{{ old('stock', $producto->stock) }}" required>
                @error('stock')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Actualizar Producto</button>
        </form>
    </div>
@endsection
