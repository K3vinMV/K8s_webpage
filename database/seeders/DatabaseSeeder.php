<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();

        User::factory()->create([
            'name' => 'admin',
            'email' => 'test@admin.com',
            'password' => bcrypt('admin'),
            'role' => 'admin',
        ]);
        
        //Llama a productoseeder para insertar productos
        $this->call([
            CategoriaSeeder::class,
            ProductoSeeder::class,
            BlogSeeder::class
        ]);
    }
    
}
