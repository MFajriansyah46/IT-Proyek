<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tenant extends User
{
    use HasFactory;

    protected $guarded = ['id'];
}
