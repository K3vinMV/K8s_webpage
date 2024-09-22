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
            'imagen' => 'default-product.png', // Asegúrate de tener una imagen por defecto
            'destacado' => $this->faker->boolean(30), // 30% de probabilidad de ser destacado
            'stock' => $this->faker->numberBetween(0, 100),
        ];
    }
}