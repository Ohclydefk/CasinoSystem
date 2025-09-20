<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Member;

class MemberSeeder extends Seeder
{
    public function run()
    {
        Member::factory()
            ->count(20)
            ->hasBusinessDetail()
            ->hasEmploymentDetail()
            ->hasPoliticalExposure()
            ->hasEmergencyContact()
            ->create();
    }
}
