<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ProductoFactory extends Factory
{
    /**
     * El nombre del modelo que corresponde al factory.
     *
     * @var string
     */
    protected $model = \App\Models\Producto::class;

    /**
     * Define el estado predeterminado del modelo.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nombre' => $this->faker->words(3, true),
            'descripcion' => $this->faker->paragraph,
            'precio' => $this->faker->randomFloat(2, 10, 500),
            'imagen' => 'imagenes/bladev8.jpg', 
            'destacado' => $this->faker->boolean(50),
            'stock' => $this->faker->numberBetween(0, 100),
        ];
    }
}