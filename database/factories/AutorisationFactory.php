<?php

namespace Database\Factories;

use App\Models\Acteur;
use App\Models\Autorisation;
use Illuminate\Database\Eloquent\Factories\Factory;

class AutorisationFactory extends Factory
{
    protected $model = Autorisation::class;

    public function definition(): array
    {
        return [
            'date_debut' => $this->faker->date(),
            'date_fin' => $this->faker->date(),
            'statut' => $this->faker->randomElement(['valide', 'refuse']),
            'id_acteur' => Acteur::inRandomOrder()->first()->id_acteur
        ];
    }
}