<?php

namespace Database\Seeders;

use App\Models\Blog;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $userIds = User::pluck('id')->toArray();

        foreach (range(1, 20) as $index) {
            Blog::create([
                'titulo' => 'Título del Blog ' . $index,
                'contenido' => 'Contenido del Blog ' . $index,
                'imagen' => null, // O asigna una imagen si deseas
                'user_id' => $userIds[array_rand($userIds)], // Asigna un ID de usuario aleatorio existente
            ]);
        }
    }
}
