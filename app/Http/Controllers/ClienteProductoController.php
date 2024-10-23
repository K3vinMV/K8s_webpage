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

        // Filtrar por búsqueda si hay un término de búsqueda.
        if ($request->has('search')) {
            $query->where('nombre', 'like', '%' . $request->search . '%');
        }

        // Filtrar por categoría si se seleccionó una.
        if ($request->has('categoria')) {
            $query->whereHas('categorias', function ($q) use ($request) {
                $q->where('categorias.id', $request->categoria);
            });
        }

        // Obtener todos los productos sin paginación.
        $productos = $query->where('stock', '>', 0)->get();

        // Obtener todas las categorías con la cantidad de productos.
        $categorias = Categoria::withCount('productos')->get();

        return view('cliente.productos.index', compact('productos', 'categorias'));
    }

    public function show(Producto $producto)
    {
        return view('cliente.productos.show', compact('producto'));
    }
}
