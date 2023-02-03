<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Voiture;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Trajet>
 */
class TrajetFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'date_depart' => $this->faker->dateTimeAD($max = 'now', $timezone = null) ,
            'ville_depart' => $this->faker->city(),
            'ville_dest' => $this->faker->city(),
            'point_depart' => $this->faker->address(),
            'place_initial' => $this->faker->randomDigit(),
            'prix' => $this->faker->numberBetween($min = 10, $max = 15) * 100,
            'place_occupe' => $this->faker->randomDigit(),
            'voiture_id' => Voiture::factory(),
            'user_id' => User::factory(),

            ];
    }
}
