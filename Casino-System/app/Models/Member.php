<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    protected $table = 'members';

    protected $fillable = [
        'id_no',
        'first_name',
        'middle_name',
        'last_name',
        'alt_name',
        'present_address',
        'permanent_address',
        'birthdate',
        'birthplace',
        'civil_status',
        'nationality',
        'email',
        'mobile_no',
        'source_of_fund_self',
        'source_of_fund_employed',
    ];

    protected $casts = [
        'birthdate' => 'date',
        'source_of_fund_self' => 'boolean',
        'source_of_fund_employed' => 'boolean',
    ];

    public function businessDetail()
    {
        return $this->hasOne(BusinessDetail::class);
    }

    public function employmentDetail()
    {
        return $this->hasOne(EmploymentDetail::class);
    }

    public function emergencyContact()
    {
        return $this->hasOne(EmergencyContact::class);
    }
    
    public function politicalExposure()
    {
        return $this->hasOne(PoliticalExposure::class);
    }
}