<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmploymentDetail>
 */
class EmploymentDetailFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'employer_name' => $this->faker->company,
            'nature_of_work' => $this->faker->jobTitle,
        ];
    }
}
