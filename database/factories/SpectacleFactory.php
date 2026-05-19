<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Spectacle>
 */
class SpectacleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
  return [
            'titre' => $this->faker->sentence(3),
            'type' => $this->faker->randomElement(['Théâtre', 'Musique', 'Danse']),
            'description' => $this->faker->paragraph(),
            'langue' => $this->faker->randomElement(['Français', 'Arabe']),
            'public_cible' => $this->faker->randomElement(['Adultes', 'Enfants']),
            'duree' => $this->faker->numberBetween(30, 180),
            'nb_representations' => $this->faker->numberBetween(1, 20),
            'equipements' => $this->faker->sentence(),
            'caractere' => $this->faker->randomElement(['Gratuit', 'Chapeau', 'Contribution libre', 'Payant']),
            'classification' => $this->faker->randomElement(['Traditionnel', 'Contemporain', 'Fusion']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
