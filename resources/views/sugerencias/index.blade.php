@extends('layouts.template')

@section('content')

<div class="container">
    <h1>Lista de Sugerencias</h1>
    <a href="{{ route('sugerencias.create') }}" class="btn btn-primary mb-3">Crear Nueva Sugerencia</a>

    @foreach ($sugerencias as $sugerencia)
        <div class="card mb-3">
            <div class="card-body">
                <h3 class="card-title">{{ $sugerencia->titulo }}</h3>
                <p class="card-text">{{ $sugerencia->justificacion }}</p>
                <h5>Archivos adjuntos:</h5>
                @if ($sugerencia->archivos->isEmpty())
                    <p>No hay archivos adjuntos.</p>
                @else
                    @foreach ($sugerencia->archivos as $archivo)
                        <a href="{{ asset('storage/' . $archivo->archivo) }}" target="_blank" class="btn btn-link">Ver archivo</a><br>
                    @endforeach
                @endif

                @if (Auth::check() && Auth::user()->role == 'admin')
                    <form action="{{ route('sugerencias.destroy', $sugerencia->id) }}" method="POST" class="mt-2">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de que deseas eliminar esta sugerencia?')">Eliminar Sugerencia</button>
                    </form>
                @endif

            </div>
        </div>
    @endforeach

</div>

@endsection
