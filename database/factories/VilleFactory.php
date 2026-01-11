<?php

namespace Database\Factories;

use App\Models\Ville;
use Illuminate\Database\Eloquent\Factories\Factory;

class VilleFactory extends Factory
{
    protected $model = Ville::class;

    public function definition()
    {
        return [
            'cpVilles' => $this->faker->unique()->numberBetween(10000, 99999),
            'designationVilles' => $this->faker->city(),
        ];
    }
}
