<?php

namespace Database\Factories;

use App\Models\Note;
use App\Models\Etudiant;
use App\Models\Matiere;
use Illuminate\Database\Eloquent\Factories\Factory;

class NoteFactory extends Factory
{
    protected $model = Note::class;

    public function definition()
    {
        $noteControle = $this->faker->randomFloat(2, 0, 20);
        $noteExamen = $this->faker->randomFloat(2, 0, 20);
        $resultat = round(($noteControle * 0.4) + ($noteExamen * 0.6), 2);

        return [
            'nce' => Etudiant::inRandomOrder()->first()->nce ?? 'NCE00001',
            'codeMat' => Matiere::inRandomOrder()->first()->codeMat ?? 'MAT001',
            'DateResultat' => $this->faker->dateTimeBetween('-6 months', 'now')->format('Y-m-d'),
            'noteControle' => $noteControle,
            'noteExamen' => $noteExamen,
            'resultat' => $resultat,
        ];
    }
}
