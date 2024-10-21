@extends('layouts.template')

@section('content')
<div class="container">
    <h1>Crear un Nuevo Blog</h1>

    <form action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-3">
            <label for="titulo" class="form-label">Título</label>
            <input type="text" class="form-control" id="titulo" name="titulo" required>
            @error('titulo')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="contenido" class="form-label">Contenido</label>
            <textarea class="form-control" id="contenido" name="contenido" rows="5" required></textarea>
            @error('contenido')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="imagen" class="form-label">Imagen (opcional)</label>
            <input type="file" class="form-control" id="imagen" name="imagen" accept="image/*">
            @error('imagen')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Crear Blog</button>
        <a href="{{ route('blog.index') }}" class="btn btn-secondary">Regresar</a>
    </form>
</div>
@endsection
