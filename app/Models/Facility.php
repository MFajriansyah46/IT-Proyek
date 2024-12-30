<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Facility extends Model
{
    use HasFactory;

    protected $fillable = ['room_id','condition_id','name','image'];

    protected static function boot()
    {
        parent::boot();

        static::creating(fn($value) => History::log($value, 'facility','facilities','create'));
        static::updating(fn($value) => History::log($value, 'facility','facilities' ,'update'));
        static::deleting(fn($value) => History::log($value, 'facility','facilities','delete'));
    }

    public function room(): BelongsTo {
        return $this->BelongsTo(Room::class,'room_id');
    }

    public function condition(): BelongsTo {
        return $this->BelongsTo(Condition::class,'condition_id');
    }
}