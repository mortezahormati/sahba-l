<?php

namespace Database\Factories;

use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

class GalleryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'product_id' => Product::find(1) ,
            'img' => $this->faker->imageUrl,
            'status' => 1 ,
            'name' => $this->faker->streetName ,
            'position' => rand(1,6)
        ];
    }
}
