<?php

namespace Database\Factories;

use App\Models\Acteur;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Activite>
 */
class ActiviteFactory extends Factory
{
    protected $model = \App\Models\Activite::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
              'type_performance' => $this->faker->word(),
            'mode_exercice' => $this->faker->randomElement([
                'Individuel',
                'Groupe',
                'Association'
            ]),
            'frequence' => $this->faker->randomElement([
                'Quotidienne',
                'Hebdomadaire',
                'Occasionnelle',
                'Saisonniere'
            ]),
            'lieu' => $this->faker->city(),
            'langue' => $this->faker->languageCode(),
// kidir relation m3a id dyl acteur 
            'id_acteur' => Acteur::inRandomOrder()->first()->id_acteur
        ];
      
        
    }
}
