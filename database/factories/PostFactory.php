<?php

namespace Database\Factories;

use App\Models\Categoria;
use App\Models\Usuario;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => $this->faker->name,
            'cuerpo' => $this->faker->paragraph,
            'imagen' => $this->faker->imageUrl,
            'usuario_id' =>Usuario::inRandomOrder()->first()->id,
            'categoria_id' => Categoria::inRandomOrder()->first()->id,
        ];
    }
}
