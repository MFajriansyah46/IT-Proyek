<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Facility extends Model
{
    use HasFactory;

    protected $fillable = ['room_id','condition_id','name','image'];

    public function room(): BelongsTo {
        return $this->BelongsTo(Room::class,'room_id');
    }

    public function condition(): BelongsTo {
        return $this->BelongsTo(Condition::class,'condition_id');
    }
}