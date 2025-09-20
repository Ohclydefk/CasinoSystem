<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PoliticalExposure>
 */
class PoliticalExposureFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'is_exposed' => $this->faker->boolean,
            'relationship' => $this->faker->randomElement(['Father', 'Mother', 'Sibling', 'Spouse']),
        ];
    }
}
