@extends('layouts.template')

@section('content')

    <!-- Blog Edit Section Begin -->
    <section class="blog-edit spad">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-8">
                    <h2 class="text-center">Editar Blog</h2>
                    <form action="{{ route('blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label for="titulo">Título</label>
                            <input type="text" class="form-control @error('titulo') is-invalid @enderror" id="titulo" name="titulo" value="{{ old('titulo', $blog->titulo) }}" required>
                            @error('titulo')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="contenido">Contenido</label>
                            <textarea class="form-control @error('contenido') is-invalid @enderror" id="contenido" name="contenido" rows="5" required>{{ old('contenido', $blog->contenido) }}</textarea>
                            @error('contenido')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="imagen">Imagen</label>
                            <input type="file" class="form-control @error('imagen') is-invalid @enderror" id="imagen" name="imagen">
                            <small class="form-text text-muted">Deja este campo vacío si no deseas cambiar la imagen.</small>
                            @error('imagen')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Actualizar Blog</button>
                            <a href="{{ route('blog.index') }}" class="btn btn-secondary">Regresar</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Edit Section End -->

@endsection
