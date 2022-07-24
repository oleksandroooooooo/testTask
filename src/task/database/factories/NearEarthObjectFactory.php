<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\NearEarthObject>
 */
class NearEarthObjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'reference' => random_int(1000000, 9999999),
            'name' => $this->faker->name,
            'speed' => $this->faker->randomFloat(1000, 100000),
            'is_hazardous' => $this->faker->boolean(50),
            'date' => $this->faker->date
        ];
    }
}
