<?php

namespace Database\Factories;

use App\Models\Matiere;
use App\Models\Specialite;
use Illuminate\Database\Eloquent\Factories\Factory;

class MatiereFactory extends Factory
{
    protected $model = Matiere::class;

    public function definition()
    {
        $matieres = [
            'Mathématiques',
            'Physique',
            'Chimie',
            'Informatique',
            'Algorithmique',
            'Base de Données',
            'Réseaux',
            'Programmation Web',
            'Intelligence Artificielle',
            'Système d\'Exploitation',
            'Architecture des Ordinateurs',
            'Génie Logiciel',
        ];

        return [
            'codeMat' => $this->faker->unique()->numberBetween(1000, 99999),
            'codeSp' => Specialite::inRandomOrder()->first()->codeSp ?? 1000,
            'coef' => $this->faker->randomFloat(1, 1, 5),
            'credit' => $this->faker->numberBetween(1, 6),
            'niveau' => $this->faker->numberBetween(1, 5),
        ];
    }
}
