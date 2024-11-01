<?php

namespace App\Http\Controllers;

use App\Models\Sugerencia;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SugerenciaController extends Controller
{
    //
    public function index()
    {
        $sugerencias = Sugerencia::with('archivos')->get();
        return view('sugerencias.index', compact('sugerencias'));
    }

    public function create()
    {
        return view('sugerencias.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|min:5|max:255',
            'justificacion' => 'required|string|min:5',
            'archivos.*' => 'required|mimes:pdf|max:2048',
        ]);

        // Crear la sugerencia
        $sugerencia = Sugerencia::create([
            'titulo' => $request->titulo,
            'justificacion' => $request->justificacion,
        ]);

        // Guardar los archivos relacionados
        if ($request->hasFile('archivos')) {
            foreach ($request->file('archivos') as $file) {
                $path = $file->store('archivos', 'public');
                $sugerencia->archivos()->create(['archivo' => $path]);
            }
        }

        return redirect()->route('sugerencias.index')->with('success', 'Sugerencia creada con éxito.');
    }

    public function destroy($id)
    {
        // Verificar si el usuario autenticado es un admin
        if (Auth::check() && Auth::user()->role == 'admin') {
            $sugerencia = Sugerencia::findOrFail($id);

            // Eliminar la sugerencia
            $sugerencia->archivos()->delete(); // Eliminar archivos relacionados
            $sugerencia->delete(); // Eliminar la sugerencia

            return redirect()->route('sugerencias.index')->with('success', 'Sugerencia eliminada con éxito.');
        }

        // Redirigir si no es admin
        return redirect()->route('sugerencias.index')->with('error', 'No tienes permiso para eliminar esta sugerencia.');
    }
}
