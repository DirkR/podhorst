<?php

namespace Database\Factories;

use App\Models\Show;
use Illuminate\Database\Eloquent\Factories\Factory;

class ShowFactory extends Factory
{
    protected $model = Show::class;

    public function definition()
    {
        return [
            'label' => $this->faker->name,
            'slug' => $this->faker->name,
            'description' => $this->faker->paragraph,

            'homepage_url' => $this->faker->unique()->url,
            'icon_url' => $this->faker->unique()->url,

            'duration' => $this->faker->numberBetween(10, 117),
            'day' => $this->faker->numberBetween(1, 7),
            'hour' => $this->faker->numberBetween(0, 23),
            'minute' => $this->faker->numberBetween(3, 45),
            'active' => $this->faker->boolean(95),
        ];
    }
}
