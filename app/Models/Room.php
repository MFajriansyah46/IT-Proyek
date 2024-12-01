<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Room extends Model
{
    protected $table = 'rooms';
    protected $primaryKey = 'id_kamar';
    public $timestamps = true;

    use HasFactory;

    protected $fillable = ['no_kamar','id_bangunan', 'harga_kamar', 'kecepatan_internet', 'gambar_kamar','deskripsi','token'];

    protected static function boot()
    {
        parent::boot();

        static::creating(fn($value) => History::log($value, 'room','roomms','create'));
        static::updating(fn($value) => History::log($value, 'room','roomms' ,'update'));
        static::deleting(fn($value) => History::log($value, 'room','roomms','delete'));
    }

    public function building(): BelongsTo {
        return $this->BelongsTo(Building::class,'id_bangunan');
    }

    public function rents(): HasMany {
        return $this->HasMany(Rent::class,'id_kamar');
    }

    public function transaction(): HasMany {
        return $this->HasMany(Transaction::class,'room_id');
    }
    
    public function rates(): HasMany {
        return $this->HasMany(Rate::class,'id_kamar');
    }

    public function facilities(): HasMany {
        return $this->HasMany(Facility::class, 'room_id');
    }
}