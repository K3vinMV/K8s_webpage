@extends('layouts.template')

@section('content')
    <!-- Blog Section Begin -->
    <h2 class="text-center">Blog</h2>
    <section class="blog spad">
        <div class="container">
            <div class="row">
                @foreach($blogs as $blog)
                    <div class="col-lg-4 col-md-6 col-sm-6">
                        <div class="blog__item">
                            <div class="blog__item__pic">
                                @if($blog->imagen)
                                    <img src="{{ asset('storage/' . $blog->imagen) }}" alt="{{ $blog->titulo }}" class="img-fluid">
                                @else
                                    <img src="{{ asset('img/blog/default.jpg') }}" alt="Default Image" class="img-fluid">
                                @endif
                            </div>
                            <div class="blog__item__text">
                                <span>
                                    <img src="{{ asset('img/icon/calendar.png') }}" alt="Fecha">
                                    {{ $blog->created_at->format('d M Y') }}
                                </span>
                                <div class="d-flex justify-content-between align-items-center">
                                    <h5>{{ $blog->titulo }}</h5>

                                    <!-- Botón de restaurar -->
                                    @if(auth()->check() && auth()->user()->role == 'admin' && $blog->trashed())
                                        <form action="{{ route('blog.restore', $blog->id) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-warning btn-sm">Restaurar</button>
                                        </form>
                                    @endif
                                </div>
                                <p><strong>Autor:</strong> {{ $blog->user->name }}</p>
                                <a href="{{ route('blog.show', $blog->id) }}">Leer más</a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Blog Section End -->
@endsection
