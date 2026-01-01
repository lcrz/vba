<?php

namespace Tests\Feature;

// use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Models\User;
use App\Models\Macro;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class MacroTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;
    /**
     * A basic test example.
     *
     * @return void
     */
    public function test_necesita_autenticacion()
    {
        $this
            ->get('/macros')
            ->assertRedirect('/login');
    }

    public function test_crea_macro()
    {
        /** @var \App\Models\User */
        $user = User::factory()->create();

        $titulo = $this->faker->text(160);
        $response = $this
            ->actingAs($user)
            ->post('/macros', [
                'titulo' => $titulo,            
                'descripcion' => $this->faker->text(160),            
                'instruccion' => $this->faker->text(100),            
                'file' => $this->faker->text(255),            
                'slug' => $this->faker->text(255),            
                'codigo' => $this->faker->text(200),            
                'activa' => 1,            
                'categoria_id' => 1      
                
            ]);

        $response->assertRedirect('/macros');
        $this->assertDatabaseHas('macros', [
            'titulo' => $titulo
        ]);
    }

    public function test_modifica_macro()
    {
        $user = User::factory()->create();
        $titulo = 'Soy una macro!';
        $macro = Macro::factory()->create();

        $response = $this
            ->actingAs($user)
            ->patch("/macros/{$macro->id}", [
                'titulo' => $titulo = $this->faker->text(),        
                'descripcion' => '1'
            ]);

       // $response->dd();
        $response->assertRedirect('/macros');
        $this->assertDatabaseHas('macros', [             
            'titulo' => $titulo
        ]);
    }

    public function test_elimina_macro()
    {
        $user = User::factory()->create();
        $titulo = 'Soy una macro!';
        $macro = Macro::factory()->create();
       
        $response = $this
            ->actingAs($user)
            ->delete("/macros/{$macro->id}");

       // $response->dd();
        $response->assertRedirect('/macros');
       
        $this->assertDatabaseMissing('macros', [             
            'id' => $macro->id
        ]);
    }
}
