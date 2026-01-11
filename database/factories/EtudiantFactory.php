<?php

namespace Database\Factories;

use App\Models\Etudiant;
use App\Models\Ville;
use Illuminate\Database\Eloquent\Factories\Factory;

class EtudiantFactory extends Factory
{
    protected $model = Etudiant::class;

    public function definition()
    {
        return [
            'nce' => 'NCE' . $this->faker->unique()->numberBetween(10000, 99999),
            'nci' => 'NCI' . $this->faker->unique()->numberBetween(100000, 999999),
            'nom' => $this->faker->lastName(),
            'prenom' => $this->faker->firstName(),
            'datenaissance' => $this->faker->dateTimeBetween('-25 years', '-18 years')->format('Y-m-d'),
            'cpLieuNaissance' => Ville::inRandomOrder()->first()->cpVilles ?? '75000',
            'adresse' => $this->faker->streetAddress(),
            'cpadresse' => Ville::inRandomOrder()->first()->cpVilles ?? '75000',
        ];
    }
}
