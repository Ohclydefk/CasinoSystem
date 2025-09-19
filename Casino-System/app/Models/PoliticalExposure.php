<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PoliticalExposure extends Model
{
    use HasFactory;

    protected $table = 'political_exposures';

    protected $fillable = [
        'member_id',
        'is_exposed',
        'relationship',
    ];

    protected $casts = [
        'is_exposed' => 'boolean',
    ];

    public function member()
    {
        return $this->belongsTo(Member::class);
    }
}