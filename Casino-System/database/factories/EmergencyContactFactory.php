<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EmergencyContact>
 */
class EmergencyContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'relationship' => $this->faker->randomElement(['Parent', 'Sibling', 'Friend', 'Spouse']),
            'contact_number' => $this->faker->phoneNumber,
            'emergency_contact_address' => $this->faker->address,
        ];
    }
}
