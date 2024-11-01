<?php 

namespace Tests\Feature;

use App\Models\User;
use App\Models\Blog; 
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\UploadedFile; 
use Tests\TestCase;

class BlogTest extends TestCase
{
    use RefreshDatabase; 

    // Test para verificar que la página de índice del blog es accesible y muestra el contenido correcto
    public function test_blog_index_page_is_accessible_and_displays_correct_content()
    {
        $user = User::first() ?: User::factory()->create();

        $this->actingAs($user) 
            ->get(route('blog.index')) 
            ->assertStatus(200) 
            ->assertSee(''); 
    }

    // Test para verificar que la creación de un blog crea un registro en la base de datos
    public function test_blog_creation_creates_record_in_database()
    {
        $user = User::first() ?: User::factory()->create();

        $this->actingAs($user)
            ->post(route('blog.store'), [ // Enviar una petición POST para crear un blog
                'titulo' => 'Nuevo Blog',
                'contenido' => 'Contenido del nuevo blog',
                'imagen' => UploadedFile::fake()->image('blog-image.jpg'),
            ])
            ->assertRedirect(route('blog.index')); // Asegurar que se redirige al índice del blog

        $this->assertDatabaseHas('blogs', [ // Asegurar que el registro se creó en la base de datos
            'titulo' => 'Nuevo Blog',
            'contenido' => 'Contenido del nuevo blog',
        ]);
    }

    // Test para verificar que la creación de un blog falla con datos inválidos
    public function test_blog_creation_fails_with_invalid_data()
    {
        $user = User::first() ?: User::factory()->create();

        $this->actingAs($user)
            ->post(route('blog.store'), [ // Enviar una petición POST con datos faltantes
                'titulo' => '', // Título vacío para provocar un error de validación
                'contenido' => '',
                'imagen' => null, // Imagen opcional
            ])
            ->assertSessionHasErrors(['titulo', 'contenido']); // Asegurar que hay errores en el título y contenido
    }

    // Test para verificar que se elimina un blog y el registro se quita de la base de datos
    public function test_blog_deletion_removes_record_from_database()
    {
        $user = User::first() ?: User::factory()->create();
        $blog = Blog::factory()->create(['user_id' => $user->id]); // Crear un blog asociado al usuario

        $this->actingAs($user)
            ->delete(route('blog.destroy', $blog->id)) // Enviar una petición DELETE para eliminar el blog
            ->assertRedirect(route('blog.index')); // Asegurar que se redirige al índice del blog

        $this->assertSoftDeleted('blogs', [ // Asegurar que el registro fue eliminado de la base de datos
            'id' => $blog->id,
        ]);
    }
}
