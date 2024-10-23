<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class ClienteProductoController extends Controller
{
    //
    public function index(Request $request)
    {
        $query = Producto::query();
        $categoriaSeleccionada = null;

        // Filtrar por búsqueda
        if ($request->has('search')) {
            $query->where('nombre', 'like', '%' . $request->search . '%');
        }

        // Filtrar por categoría 
        if ($request->has('categoria')) {
            $categoriaSeleccionada = Categoria::find($request->categoria);
            $query->whereHas('categorias', function ($q) use ($request) {
                $q->where('categorias.id', $request->categoria);
            });
        }

        $productos = $query->where('stock', '>', 0)->get();

        // Obtener todas las categorías con la cantidad de productos.
        $categorias = Categoria::withCount('productos')->get();

        return view('cliente.productos.index', compact('productos', 'categorias', 'categoriaSeleccionada'));
    }

    public function show(Producto $producto)
    {
        return view('cliente.productos.show', compact('producto'));
    }
}
