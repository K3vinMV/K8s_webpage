<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\Producto;

class HomeController extends Controller
{
    /**
     * Muestra la página principal.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Obtiene los productos destacados (puedes definir una columna 'destacado' en tu tabla 'products')
        $productosDestacados = Producto::where('destacado', true)->take(6)->get();
        $blogs = Blog::latest()->take(3)->get();
        
        return view('index', compact('productosDestacados', 'blogs'));
    }
}
