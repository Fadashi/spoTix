<?php

namespace Database\Factories;

use App\Models\Event;
use Illuminate\Database\Eloquent\Factories\Factory;

class EventFactory extends Factory
{
    protected $model = Event::class;

    public function definition()
    {
        return [
            'thumbnail' => 'thumbnails/default.png',
            'name' => $this->faker->sentence(3),
            'description' => $this->faker->paragraph,
            'category' => $this->faker->word,
            'date' => $this->faker->dateTimeBetween('now', '+1 month'),
            'location' => $this->faker->address,
            'price' => $this->faker->randomFloat(2, 10, 100),
        ];
    }
}