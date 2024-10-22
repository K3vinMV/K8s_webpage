<?php

namespace Database\Factories;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class BlogFactory extends Factory
{
    protected $model = Blog::class;

    public function definition()
    {
        return [
            'titulo' => $this->faker->sentence(),
            'contenido' => $this->faker->paragraphs(rand(3, 6), true), // Generar entre 3 y 6 párrafos
            'imagen' => 'imagenes/default_blog.jpg', 
            'user_id' => User::factory(), // Asocia a un usuario existente
        ];
    }
}
