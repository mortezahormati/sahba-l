<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class ChildSubCategoryFactory extends Factory
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
            'sub_parent' => rand(1,8),
            'img' => $this->faker->imageUrl,
        ];
    }
}
