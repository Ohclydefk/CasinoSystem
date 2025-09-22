<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Carbon\Carbon;

class Member extends Model
{
    use HasFactory, SoftDeletes;

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
        'status'
    ];

    protected $casts = [
        'birthdate' => 'date',
        'source_of_fund_self' => 'boolean',
        'source_of_fund_employed' => 'boolean',
    ];

    protected $dates = [
        'birthdate',
        'deleted_at',  
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

    public function getBirthdateAttribute($value)
    {
        return $value ? Carbon::parse($value)->format('Y-m-d') : null;
    }
}