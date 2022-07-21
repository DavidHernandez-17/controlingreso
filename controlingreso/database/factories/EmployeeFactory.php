<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'identification' => $this->faker->text(),
            'fullname' => $this->faker->text(7),
            'area' => $this->faker->text(5),
            'site' => $this->faker->text(5),
            'email' => $this->faker->text(9),
            'nickname' => $this->faker->text(5)
        ];
    }
}