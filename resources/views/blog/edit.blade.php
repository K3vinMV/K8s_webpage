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
                            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $blog->titulo }}" required>
                        </div>

                        <div class="form-group">
                            <label for="contenido">Contenido</label>
                            <textarea class="form-control" id="contenido" name="contenido" rows="5" required>{{ $blog->contenido }}</textarea>
                        </div>

                        <div class="form-group">
                            <label for="imagen">Imagen</label>
                            <input type="file" class="form-control" id="imagen" name="imagen">
                            <small class="form-text text-muted">Deja este campo vacío si no deseas cambiar la imagen.</small>
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Actualizar Blog</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Edit Section End -->

@endsection
