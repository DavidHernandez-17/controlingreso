<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'identification' => $this->faker->text(5),
            'fullname' => $this->faker->text(10),
            'area' => $this->faker->text(5),
            'site' => $this->faker->text(5),
            'email' => $this->faker->text(10),
            'nickname' => $this->faker->text(5)
        ];
    }
}
