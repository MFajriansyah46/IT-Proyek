<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Owner extends User implements JWTSubject
{
    use HasFactory;

    protected $guarded = ['id'];

    protected static function boot()
    {
        parent::boot();

        static::creating(fn($value) => History::log($value, 'owner account','owners','create'));
        static::updating(fn($value) => History::log($value, 'owner account','owners' ,'update'));
        static::deleting(fn($value) => History::log($value, 'owner account','owners','delete'));
    }

    // Implementasi JWTSubject
    public function getJWTIdentifier()
    {
        return $this->getKey(); // Mengembalikan primary key (id) sebagai identifier token
    }

    public function getJWTCustomClaims()
    {
        return []; // Custom claims (opsional, kosongkan jika tidak diperlukan)
    }

    public function buildings()
    {
        return $this->hasMany(Building::class, 'owner_id');
    }

    public function criteries()
    {
        return $this->hasMany(Criteria::class, 'owner_id');
    }
}
