@extends('layouts.template')

@section('content')
    <div class="container">
        <h1>Agregar Producto</h1>

        <form action="{{ route('productos.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <!-- Nombre -->
            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre del Producto</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" required>
                @error('nombre')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Descripción -->
            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripción</label>
                <textarea class="form-control" id="descripcion" name="descripcion" rows="3" required>{{ old('descripcion') }}</textarea>
                @error('descripcion')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Precio -->
            <div class="mb-3">
                <label for="precio" class="form-label">Precio</label>
                <input type="number" class="form-control" id="precio" name="precio" step="0.01" value="{{ old('precio') }}" required>
                @error('precio')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Imagen -->
            <div class="mb-3">
                <label for="imagen" class="form-label">Imagen del Producto</label>
                <input type="file" class="form-control" id="imagen" name="imagen" required>
                @error('imagen')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Destacado -->
            <div class="mb-3">
                <label for="destacado" class="form-label">¿Producto Destacado?</label>
                <select class="form-select" id="destacado" name="destacado" required>
                    <option value="0" {{ old('destacado') == '0' ? 'selected' : '' }}>No</option>
                    <option value="1" {{ old('destacado') == '1' ? 'selected' : '' }}>Sí</option>
                </select>
                @error('destacado')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <!-- Stock -->
            <div class="mb-3">
                <label for="stock" class="form-label">Cantidad en Stock</label>
                <input type="number" class="form-control" id="stock" name="stock" value="{{ old('stock') }}" required>
                @error('stock')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-success">Guardar Producto</button>
        </form>
    </div>
@endsection
