<?php

namespace Database\Factories;

use App\Models\Spectacle;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Evenement>
 */
class EvenementFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'date_debut' => $this->faker->date(),
            'date_fin' => $this->faker->date(),
            'frequence' => $this->faker->randomElement(['Hebdomadaire', 'Mensuel']),
            'saison' => $this->faker->randomElement(['Été', 'Hiver']),
            'statut' => $this->faker->randomElement(['Planifie', 'En cours', 'Termine', 'Annule']),
            // kidir relation m3a id dyl spectecle 
            'id_spectacle' => Spectacle::inRandomOrder()->first()->id_spectacle 
        ];
    }
}
