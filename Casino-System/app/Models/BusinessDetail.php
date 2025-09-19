<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BusinessDetail extends Model
{
    use HasFactory;

    protected $table = 'business_details';

    protected $fillable = [
        'member_id',
        'business_name',
        'business_nature',
        'id_presented',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}
