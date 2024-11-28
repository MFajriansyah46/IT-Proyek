<?php

namespace App\Models;

use Tymon\JWTAuth\Contracts\JWTSubject;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tenant extends User implements JWTSubject
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = ['name', 'phone_number', 'image', 'username', 'password'];

    // Implementasi JWTSubject
    public function getJWTIdentifier()
    {
        return $this->getKey(); // Mengembalikan primary key (id) sebagai identifier token
    }

    public function getJWTCustomClaims()
    {
        return []; // Custom claims (opsional, kosongkan jika tidak diperlukan)
    }

    public function rent()
    {
        return $this->hasMany(Rent::class, 'id_kamar');
    }

    public function transaction()
    {
        return $this->hasMany(Transaction::class);
    }

    public function rates()
    {
        return $this->hasMany(Rate::class, 'id_kamar');
    }

    public function roommate()
    {
        return $this->hasOne(Roommate::class);
    }
}
