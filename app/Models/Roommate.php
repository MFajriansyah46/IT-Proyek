<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roommate extends Model
{
    use HasFactory;

    protected $fillable = [
        'tenant_id', 'name', 'phone_number', 'profile_photo_url'
    ];

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}
