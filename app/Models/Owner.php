<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Owner extends User
{
    use HasFactory;

    protected $guarded = ['id'];
    

    public function buildings(): HasMany {
        return $this->HasMany(Building::class, 'owner_id');
    }
}
