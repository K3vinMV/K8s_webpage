@extends('layouts.template')

@section('content')

<div class="container">
    <h1>Crear una nueva Sugerencia</h1>
    
    <form action="{{ route('sugerencias.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        
        <div class="mb-3">
            <label for="titulo">Título:</label>
            <input type="text" class="form-control" name="titulo" value="{{ old('titulo') }}" required>
            @error('titulo')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="justificacion">Justificación:</label>
            <textarea class="form-control" name="justificacion" required>{{ old('justificacion') }}</textarea>
            @error('justificacion')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="archivos">Archivos (solo PDF):</label>
            <input type="file" class="form-control" name="archivos[]" accept="application/pdf" multiple required>
            @error('archivos.*')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>
</div>

@endsection
