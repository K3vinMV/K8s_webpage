@extends('layouts.template')

@section('content')

    <!-- Blog Details Hero Begin -->
    <section class="blog-hero spad">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-9 text-center">
                    <div class="blog__hero__text">
                        <h2>{{ $blog->titulo }}</h2>
                        <ul>
                            <li>By {{ $blog->user->name }}</li>
                            <li>{{ $blog->created_at->format('F j, Y') }}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Hero End -->

    <!-- Blog Details Section Begin -->
    <section class="blog-details spad">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="col-lg-12">
                    <div class="blog__details__pic">
                        <img src="{{ asset($blog->imagen) }}" alt="Imagen del blog"> <!-- Cargar imagen del blog -->
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="blog__details__content">
                        <div class="blog__details__share">
                            <span>share</span>
                            <ul>
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#" class="youtube"><i class="fa fa-youtube-play"></i></a></li>
                                <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                        <div class="blog__details__text">
                            <p>{{ $blog->contenido }}</p> <!-- Contenido del blog -->
                        </div>

                        <!-- Opciones de edición y eliminación solo para el autor -->
                        @if (auth()->check() && auth()->user()->id === $blog->user_id)
                            <div class="blog__details__btns">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <a href="{{ route('blog.edit', $blog->id) }}" class="btn btn-warning">Editar</a>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <form action="{{ route('blog.destroy', $blog->id) }}" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este blog?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger">Eliminar</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Blog Details Section End -->

@endsection
