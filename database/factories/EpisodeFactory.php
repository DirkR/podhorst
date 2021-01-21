<?php

namespace Database\Factories;


use App\Models\Episode;
use Illuminate\Database\Eloquent\Factories\Factory;

class EpisodeFactory extends Factory
{
    protected $model = Episode::class;

    public function definition()
    {
        return [
            'label' => $this->faker->name,
            'slug' => $this->faker->name,
            'description' => $this->faker->paragraph,
            'status' => Episode::PENDING,
        ];
    }
}
