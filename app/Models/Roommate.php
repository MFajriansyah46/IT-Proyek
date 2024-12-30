<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Roommate extends Model
{
    use HasFactory;

    protected $fillable = [
        'tenant_id', 'name', 'phone_number', 'profile_photo'
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(fn($value) => History::log($value, 'roommate','roommates','create'));
        static::updating(fn($value) => History::log($value, 'roommate','roommates' ,'update'));
        static::deleting(fn($value) => History::log($value, 'roommate','roommates','delete'));
    }

    public function tenant()
    {
        return $this->belongsTo(Tenant::class);
    }
}
