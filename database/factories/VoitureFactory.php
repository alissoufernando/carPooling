<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Voiture>
 */
class VoitureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'marque' => $this->faker->company(),
            'immatriculation' => fake()->unique()->numerify('RB: GR ####'),
            'model' => $this->faker->asciify('V6 ***'),
            'couleur' => $this->faker->colorName(),
            'annee' => $this->faker->monthName($max = 'now'),
            'prix' => $this->faker->numberBetween($min = 10, $max = 15) * 100,
            'images' => $this->faker->imageUrl($width = 640, $height = 480),
            'place' => $this->faker->randomDigit(),
            'user_id' => User::factory(),
            ];
    }
}
