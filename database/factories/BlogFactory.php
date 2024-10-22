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
            'contenido' => $this->faker->paragraph(),
            'imagen' => 'imagenes/default_blog.jpg', // Puedes cambiarlo por una imagen real si lo deseas
            'user_id' => User::factory(), // Asocia a un usuario existente
        ];
    }
}
