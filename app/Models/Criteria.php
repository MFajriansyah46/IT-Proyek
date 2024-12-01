<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Criteria extends Model
{
    use HasFactory;
    protected $table = 'criteries';
    protected $fillable = ['owner_id','criteria_name','weight'];

    public function owner(): BelongsTo {
        return $this->belongsTo(Owner::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(fn($value) => History::log($value, 'criteria','criteries','create'));
        static::updating(fn($value) => History::log($value, 'criteria','criteries' ,'update'));
        static::deleting(fn($value) => History::log($value, 'criteria','criteries','delete'));
    }
}