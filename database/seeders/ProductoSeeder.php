<?php

namespace Database\Seeders;

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
        // Crear 20 productos de prueba
        Producto::factory()->count(20)->create();
    }
}