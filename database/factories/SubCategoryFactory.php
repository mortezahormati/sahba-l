<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class SubCategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */

    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'link' => $this->faker->slug,
            'title' => $this->faker->persianWord(),
            'status' => rand(0,1),
            'parent' => null,
            'img' => $this->faker->imageUrl,
        ];
    }
}
