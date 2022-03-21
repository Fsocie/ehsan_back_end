<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class contactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'audio' => $this->faker->text(200),
            'user_id' => $this->faker->numberBetween(1,5)
        ];
    }
}
