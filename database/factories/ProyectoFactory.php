<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Proyecto>
 */
class ProyectoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'titulo' => fake()->text(),
            'descripcion' => fake()->paragraph(),
            'url_img' => 'https://picsum.photos/200/300',
            'isBorrador' => fake()->boolean(),
            'user_id' => User::inRandomOrder()->first()->id
        ];
    }
}
