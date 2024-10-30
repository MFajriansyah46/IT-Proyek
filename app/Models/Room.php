<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    protected $table = 'rooms';
    protected $primaryKey = 'room_id';
    public $timestamps = true;

    use HasFactory;

    protected $fillable = ['room_number','id_bangunan', 'price', 'internet_speed', 'images'];

    public function building(): BelongsTo {
        return $this->belongsTo(Building::class);
    }
}
