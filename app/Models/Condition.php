<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Condition extends Model
{
    use HasFactory;

    protected $fillable = ['name','index','color'];

    protected static function boot()
    {
        parent::boot();

        static::creating(fn($value) => History::log($value, 'condition','conditions','create'));
        static::updating(fn($value) => History::log($value, 'condition','conditions' ,'update'));
        static::deleting(fn($value) => History::log($value, 'condition','conditions','delete'));
    }

    public function facilities(): HasMany {
        return $this->HasMany(Facility::class, 'condition_id');
    }
}
