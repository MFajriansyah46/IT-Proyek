<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rate extends Model
{
    use HasFactory;

    protected $fillable = ['id_kamar','id_penyewa','rate','commentary'];

    public function room(): BelongsTo {
        return $this->BelongsTo(Room::class,'id_kamar');
    }

    public function tenant(): BelongsTo {
        return $this->BelongsTo(Tenant::class,'id_penyewa');
    }
}