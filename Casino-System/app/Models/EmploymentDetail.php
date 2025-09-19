<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmploymentDetail extends Model
{
    use HasFactory;

    protected $table = 'employment_details';

    protected $fillable = [
        'member_id',
        'employer_name',
        'nature_of_work',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}