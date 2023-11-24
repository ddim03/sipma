<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use function PHPSTORM_META\map;

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

        $paragraps = fake()->paragraphs();
        $deskripsi = [];
        for ($i = 0; $i < count($paragraps); $i++) {
            if ($i == 0) {
                array_push($deskripsi, "<h1>" . $paragraps[$i] . "</h1>");
            }
            array_push($deskripsi, "<p>" . $paragraps[$i] . "</p>");
        }
        $deskripsi = implode('', $deskripsi);

        return [
            'title' => fake()->sentence(),
            'slug' => fake()->slug(),
            'banner' => fake()->numberBetween(1, 2) . '.jpg',
            'deskripsi' => $deskripsi,
            'is_validated' => fake()->boolean(),
            'published at' => fake()->date,
            'admin_id' => fake()->numberBetween(1, 3),
            'category_id' => fake()->numberBetween(1, 3),
        ];
    }
}