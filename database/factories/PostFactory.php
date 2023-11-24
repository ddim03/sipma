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
        $isi = [];
        for ($i = 0; $i < count($paragraps); $i++) {
            if ($i == 0) {
                array_push($isi, "<h1>" . $paragraps[$i] . "</h1>");
            }
            array_push($isi, "<p>" . $paragraps[$i] . "</p>");
        }
        $isi = implode('', $isi);

        return [
            'judul' => fake()->sentence(),
            'slug' => fake()->slug(),
            'gambar' => fake()->numberBetween(1, 2) . '.jpg',
            'isi' => $isi,
            'is_validated' => fake()->boolean(),
            'admin_id' => fake()->numberBetween(1, 3),
            'category_id' => fake()->numberBetween(1, 3),
        ];
    }
}
