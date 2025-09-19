<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmergencyContact extends Model
{
    use HasFactory;

    protected $table = 'emergency_contacts';

    protected $fillable = [
        'member_id',
        'name',
        'relationship',
        'contact_number',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}