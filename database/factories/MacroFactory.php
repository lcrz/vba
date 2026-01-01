<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Macro>
 */
class MacroFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'titulo' => $this->faker->text(160),            
            'descripcion' => $this->faker->text(160),            
            'instruccion' => $this->faker->text(255),            
            'file' => $this->faker->text(255),            
            'codigo' => $this->faker->text(200),            
            'activa' => 1,            
            'categoria_id' => 1,            
            'created_at' => $this->faker->dateTimeBetween(now()->subDays(10)),
        ];
    }
}
