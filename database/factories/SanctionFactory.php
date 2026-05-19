<?php

namespace Database\Factories;

use App\Models\Acteur;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Sanction>
 */
class SanctionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => $this->faker->randomElement(['retard', 'absence', 'comportement']),
            'date' => $this->faker->date(),
            'description' => $this->faker->sentence(),
            'id_acteur' => Acteur::inRandomOrder()->first()->id_acteur
        ];
    }
}
