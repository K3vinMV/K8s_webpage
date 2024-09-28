<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ClienteProductoController extends Controller
{
    //
    public function index()
    {
        $productos = Producto::where('destacado', true)->get();
        return view('cliente.productos.listado', compact('productos'));
    }
}
