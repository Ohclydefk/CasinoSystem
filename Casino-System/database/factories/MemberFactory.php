<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Crypt;

class MemberFactory extends Factory
{
    protected $model = \App\Models\Member::class;

    public function definition()
    {
        $source = $this->faker->randomElement(['self', 'employed']);
        return [
            'id_no' => Crypt::encryptString($this->faker->unique()->numerify('###-###-###')), // Encrypting the ID number
            'first_name' => $this->faker->firstName,
            'middle_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'alt_name' => $this->faker->userName,
            'present_address' => $this->faker->address,
            'permanent_address' => $this->faker->address,
            'birthdate' => $this->faker->date('Y-m-d'),
            'birthplace' => $this->faker->city,
            'civil_status' => $this->faker->randomElement(['Single', 'Married', 'Divorced']),
            'nationality' => $this->faker->country,
            'email' => $this->faker->unique()->safeEmail,
            'mobile_no' => $this->faker->phoneNumber,
            'source_of_fund_self' => $source === 'self' ? 1 : 0,
            'source_of_fund_employed' => $source === 'employed' ? 1 : 0,
            'valid_id_type' => $this->faker->randomElement(['Driver License', 'Passport', 'SSS ID', 'Voter ID', 'UMID', 'TIN ID', 'National ID']),
        ];
    }
}
