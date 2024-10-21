<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $blogs = Blog::with('user')->latest()->paginate(10);
        return view('blog.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('blog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validación de imagen opcional
        ]);

        $imagenPath = $request->file('imagen') ? $request->file('imagen')->store('blogs') : null;

        Blog::create([
            'titulo' => $request->titulo,
            'contenido' => $request->contenido,
            'imagen' => $imagenPath,
            'user_id' => Auth::id(),
        ]);

        return redirect()->route('blog.index')->with('success', 'Blog creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
        return view('blog.show', compact('blog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        //
        return view('blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        //
        $request->validate([
            'titulo' => 'required|string|max:255',
            'contenido' => 'required',
            'imagen' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validación de imagen opcional
        ]);

        // Procesar la nueva imagen si se ha subido
        if ($request->hasFile('imagen')) {
            // Eliminar la imagen anterior si existe
            if ($blog->imagen) {
                Storage::delete($blog->imagen);
            }

            // Guardar la nueva imagen
            $imagenPath = $request->file('imagen')->store('blogs');
            $blog->imagen = $imagenPath;
        }

        // Actualizar el blog con los nuevos datos
        $blog->update([
            'titulo' => $request->titulo,
            'contenido' => $request->contenido,
            'imagen' => $blog->imagen,
        ]);

        return redirect()->route('blog.index')->with('success', 'Blog actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
        if ($blog->imagen) {
            Storage::delete($blog->imagen);
        }

        $blog->delete();

        return redirect()->route('blog.index')->with('success', 'Blog eliminado exitosamente.');
    }
}
