<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $productos = Producto::with('categorias')->get();
        return view('admin.productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $categorias = Categoria::all();
        return view('admin.productos.create', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre' => 'required|string|max:255|min:3',
            'descripcion' => 'required|string|min:5',
            'precio' => 'required|numeric|min:1',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'destacado' => 'required|boolean',
            'stock' => 'required|integer|min:1',
            'categorias' => 'required|array',
        ]);
    
        $producto = new Producto();
        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;

        if ($request->hasFile('imagen')) {
            $producto->imagen = $request->file('imagen')->store('imagenes', 'public');
        }

        $producto->destacado = $request->destacado;
        $producto->stock = $request->stock;

        $producto->save();

        $producto->categorias()->attach($request->categorias);

        return redirect()->route('admin.productos.index')->with('success', 'Producto creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Producto $producto)
    {
        //
        $producto->load('categorias');
        return view('admin.productos.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Producto $producto)
    {
        //
        $categorias = Categoria::all();
        return view('admin.productos.edit', compact('producto', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Producto $producto)
    {
        //
        $request->validate([
            'nombre' => 'required|string|max:255|min:3',
            'descripcion' => 'required|string|min:5',
            'precio' => 'required|numeric|min:1',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'destacado' => 'required|boolean',
            'stock' => 'required|integer|min:1',
            'categorias' => 'required|array',
        ]);

        $producto->nombre = $request->nombre;
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;

        if ($request->hasFile('imagen')) {
            // reemplazar la imagen anterior
            // \Storage::delete('public/' . $producto->imagen);

            $producto->imagen = $request->file('imagen')->store('imagenes', 'public');
        }

        $producto->destacado = $request->destacado;
        $producto->stock = $request->stock;
        $producto->save();

        $producto->categorias()->sync($request->categorias);
        return redirect()->route('admin.productos.index')->with('success', 'Producto actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Producto $producto)
    {
        //
        $producto->delete();
        return redirect()->route('admin.productos.index')->with('success', 'Producto eliminado correctamente.');
    }
}
