<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class TopicFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'category_id' => null,
            'user_id' => 1,
            'title' => $faker->sentence,
            'body' => $faker->paragraph(7),
            'views' => $faker->numberBetween(0, 10000),
            'created_at' => $faker->datetimeBetween('-5 months'),
        ];
    }
}
