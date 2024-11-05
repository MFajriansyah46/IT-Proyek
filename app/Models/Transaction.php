<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
    use HasFactory;

    protected $fillable = ['room_id', 'tenant_id', 'price', 'status', 'snap_token'];

    public function room(): BelongsTo {
        return $this->BelongsTo(Room::class,'room_id');
    }

    public function tenant(): BelongsTo {
        return $this->BelongsTo(Tenant::class,'tenant_id');
    }
}