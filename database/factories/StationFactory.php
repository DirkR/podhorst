<?php

namespace Database\Factories;

use App\Models\Station;
use Illuminate\Database\Eloquent\Factories\Factory;

class StationFactory extends Factory
{
    protected $model = Station::class;

    public function definition()
    {
        return [
            'label' => $this->faker->name,
            'slug' => $this->faker->word,
            'description' => $this->faker->paragraph,
            'homepage_url' => $this->faker->unique()->url,
            'stream_url' => $this->faker->unique()->url,
            'icon_url' => $this->faker->unique()->url,
        ];
    }
}
