<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Arsip>
 */
class ArsipFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'admin_id' => fake()->numberBetween(1, 3),
            'nama' => fake()->sentence(),
            'deskripsi' => fake()->paragraph(),
            'pdf' => fake()->numberBetween(1, 2) . '.pdf',
        ];
    }
}