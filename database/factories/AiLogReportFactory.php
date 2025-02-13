<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class AiLogReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $rand_action = [
            'حذف' ,
            'ویرایش' ,
            'به روز رسانی' ,
            'ایجاد'
        ];
        return [
            'section' => $this->faker->domainName ,
            'action' =>array_rand($rand_action) ,
            'user_id' => rand(1,7) ,
        ];
    }
}
