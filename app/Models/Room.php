<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    protected $table = 'rooms';
    protected $primaryKey = 'id_kamar';
    public $timestamps = true;

    use HasFactory;

    protected $fillable = ['no_kamar','id_bangunan', 'harga_kamar', 'kecepatan_internet', 'rating_kamar'];

    public function building(): BelongsTo {
        return $this->BelongsTo(Building::class,'id_bangunan');
    }
}
