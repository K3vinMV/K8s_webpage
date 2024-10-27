<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        if (Auth::check() && Auth::user()->role == 'admin') {
            // Si el usuario es un administrador
            $blogs = Blog::with('user')->withTrashed()->latest()->get();
        } else {
            //No muestra soft deletes
            $blogs = Blog::with('user')->latest()->get();
        }
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
        $this->authorize('create', Blog::class);

        $request->validate([
            'titulo' => 'required|string|min:5|max:255',
            'contenido' => 'required|string|min:10|max:1000',
            'imagen' => 'required|image|mimes:jpeg,png,jpg|max:2048', 
        ]);

        $imagenPath = $request->file('imagen')->store('blogs', 'public');

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
        $this->authorize('update', $blog);

        if (Auth::id() !== $blog->user_id) {
            abort(403); // Prohibido
        }
    
        return view('blog.edit', compact('blog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        //
        $this->authorize('update', $blog);

        $request->validate([
            'titulo' => 'required|string|min:5|max:255',
            'contenido' => 'required|string|min:10|max:1000',
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
        $this->authorize('delete', $blog);

        if (Auth::id() !== $blog->user_id) {
            abort(403); // Prohibido, devuelve un error 403 si no es el dueño
        }

        if ($blog->imagen) {
            Storage::delete($blog->imagen);
        }

        $blog->delete();

        return redirect()->route('blog.index')->with('success', 'Blog eliminado exitosamente.');
    }

    /**
     * Restore the specified resource from storage.
     */
    public function restore($id)
    {
        //
        $blog = Blog::withTrashed()->findOrFail($id);
        $this->authorize('restore', $blog);
        $blog->restore();

        return redirect()->route('blog.index')->with('success', 'Blog restaurado exitosamente.');
    }
}
