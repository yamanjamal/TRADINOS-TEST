<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'description'=>$this->faker->text(50),
            'assign'=>rand(2,4),
            'user_id'=>rand(2,5),
        ];
    }
}
