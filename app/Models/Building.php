<?php

namespace App\Models;

use App\Models\Owner;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Building extends Model
{
    use HasFactory;
    public function owner(): BelongsTo {
        return $this->belongsTo(Owner::class);
    }

    public function rooms(): HasMany {
        return $this->HasMany(Room::class, 'building_id');
    }
}