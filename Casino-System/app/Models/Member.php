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
}