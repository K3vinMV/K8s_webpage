<?php

namespace Database\Seeders;

use App\Models\Categoria;
use Illuminate\Database\Seeder;
use App\Models\Producto;

class ProductoSeeder extends Seeder
{
    /**
     * Ejecutar el seeder.
     *
     * @return void
     */
    public function run()
    {
        // Crear 20 productos de prueba y almacenarlos en la variable $productos
        $productos = Producto::factory()->count(20)->create();

        // Obtener todas las categorías
        $categorias = Categoria::all();

        // Asignar cada producto a una o más categorías
        foreach ($productos as $producto) {
            // Asigna entre 1 y 2 categorías aleatorias a cada producto
            $producto->categorias()->attach(
                $categorias->random(rand(1, 2))->pluck('id')->toArray()
            );
        }
    }
}
