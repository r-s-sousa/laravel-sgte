<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PositionFactory extends Factory
{
    public function definition(): array
    {
        return [
            'shortName' => fake()->unique()->text(5),
            'name' => fake()->unique()->text(20),
            'priority' => fake()->randomNumber(3)
        ];
    }
}
