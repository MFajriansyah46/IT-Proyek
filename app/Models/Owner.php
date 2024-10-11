<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Owner extends User
{
    use HasFactory;

    // protected $fillable = [
    //     'id',
    //     'name',
    //     'rekening_number',
    //     'phone_number',
    //     'username',
    //     'password'
    // ];

    public function owner(): HasMany {
        return $this->HasMany(Building::class, 'owner_id');
    }
}
