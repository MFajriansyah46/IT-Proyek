<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model {
    use HasFactory;
    protected $fillabel = ['name','email','email_verified_at'];
    protected $casts = ['email_verified_at' => 'datetime'];
}