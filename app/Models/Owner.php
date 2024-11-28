<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Owner extends User implements JWTSubject
{
    use HasFactory;

    protected $guarded = ['id'];

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
