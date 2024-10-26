<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tenant extends User
{
    use HasFactory;

    protected $guarded = ['id'];

    public function rent(): HasMany {
        return $this->HasMany(Rent::class,'id_kamar');
    }

    public function transaction(): HasMany {
        return $this->HasMany(Transaction::class);
    }
}