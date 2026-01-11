<?php

namespace Database\Factories;

use App\Models\Inscription;
use App\Models\Etudiant;
use App\Models\Specialite;
use Illuminate\Database\Eloquent\Factories\Factory;

class InscriptionFactory extends Factory
{
    protected $model = Inscription::class;

    public function definition()
    {
        $resultat = $this->faker->randomFloat(2, 5, 20);
        $mention = '';

        if ($resultat >= 16) $mention = 'Très Bien';
        elseif ($resultat >= 14) $mention = 'Bien';
        elseif ($resultat >= 12) $mention = 'Assez Bien';
        elseif ($resultat >= 10) $mention = 'Passable';
        else $mention = 'Échec';

        return [
            'nce' => Etudiant::inRandomOrder()->first()->nce ?? 'NCE00001',
            'codeSp' => Specialite::inRandomOrder()->first()->codeSp ?? 1000,
            'dateInscription' => $this->faker->dateTimeBetween('-3 years', 'now')->format('Y-m-d'),
            'niveauInscription' => $this->faker->numberBetween(1, 5),
            'resultatFinale' => $resultat,
            'mention' => $mention,
        ];
    }
}
