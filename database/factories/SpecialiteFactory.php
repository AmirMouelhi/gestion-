<?php

namespace Database\Factories;

use App\Models\Specialite;
use Illuminate\Database\Eloquent\Factories\Factory;

class SpecialiteFactory extends Factory
{
    protected $model = Specialite::class;

    public function definition()
    {
        $specialites = [
            'Informatique',
            'Génie Civil',
            'Génie Mécanique',
            'Génie Électrique',
            'Architecture',
            'Médecine',
            'Pharmacie',
            'Droit',
            'Économie',
            'Gestion',
        ];

        return [
            'codeSp' => $this->faker->unique()->numberBetween(1000, 9999),
            'designationSp' => $this->faker->randomElement($specialites),
        ];
    }
}
