@extends('layouts.template')

@section('content')
    <div class="container">
        <h1>Lista de Productos</h1>
        <a href="{{ route('admin.productos.create') }}" class="btn btn-primary mb-3">Agregar Producto</a>

        @if ($productos->isEmpty())
            <p>No hay productos disponibles.</p>
        @else
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio</th>
                        <th>Destacado</th>
                        <th>Stock</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($productos as $producto)
                        <tr>
                            <td>{{ $producto->id }}</td>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->descripcion }}</td>
                            <td>${{ $producto->precio }}</td>
                            <td>{{ $producto->destacado ? 'Sí' : 'No' }}</td>
                            <td>{{ $producto->stock }}</td>
                            <td>
                                <a href="{{ route('admin.productos.show', $producto->id) }}" class="btn btn-info">Ver</a>
                                <a href="{{ route('admin.productos.edit', $producto->id) }}" class="btn btn-warning">Editar</a>
                                <form action="{{ route('admin.productos.destroy', $producto->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('¿Seguro que deseas eliminar este producto?')">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
@endsection