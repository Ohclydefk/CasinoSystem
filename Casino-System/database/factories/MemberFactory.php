<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MemberFactory extends Factory
{
    protected $model = \App\Models\Member::class;

    public function definition()
    {
        return [
            'id_no' => $this->faker->unique()->numerify('ID###'),
            'first_name' => $this->faker->firstName,
            'middle_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'alt_name' => $this->faker->userName,
            'present_address' => $this->faker->address,
            'permanent_address' => $this->faker->address,
            'birthdate' => $this->faker->date(),
            'birthplace' => $this->faker->city,
            'civil_status' => $this->faker->randomElement(['Single', 'Married', 'Divorced']),
            'nationality' => $this->faker->country,
            'email' => $this->faker->unique()->safeEmail,
            'mobile_no' => $this->faker->phoneNumber,
            'source_of_fund_self' => $this->faker->boolean,
            'source_of_fund_employed' => $this->faker->boolean,
        ];
    }
}
