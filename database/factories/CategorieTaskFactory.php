<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class CategorieTaskFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'task_id'=>rand(1,5),
            'categorie_id'=>rand(1,5)
        ];
    }
}
