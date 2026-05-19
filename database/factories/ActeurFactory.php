<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Acteur>
 */
class ActeurFactory extends Factory
{
    protected $model = \App\Models\Acteur::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            
            'nom_prenom' => $this->faker->name(),
            'date_naissance' => $this->faker->date(),
            'cin_passport' => strtoupper($this->faker->bothify('??######')),
            'nationalite' => 'Marocaine',
            'adresse' => $this->faker->address(),
            'telephone' => $this->faker->phoneNumber(),
            'email' => $this->faker->unique()->safeEmail(),
            'photo' => 'photos/default.jpg', 
            'date_inscription' => now(),
            'statut' => $this->faker->randomElement(['Actif', 'Suspendu', 'Archive']),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
