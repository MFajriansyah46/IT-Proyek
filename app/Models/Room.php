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

    protected $fillable = ['no_kamar','id_bangunan', 'harga_kamar', 'kecepatan_internet', 'gambar_kamar','token'];

    public function building(): BelongsTo {
        return $this->BelongsTo(Building::class,'id_bangunan');
    }

    public function rent(): HasMany {
        return $this->HasMany(Rent::class,'id_kamar');
    }

    public function transaction(): HasMany {
        return $this->HasMany(Transaction::class,'id_kamar');
    }
}
