<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms';
    protected $primaryKey = 'id_kamar';
    public $timestamps = true;

    use HasFactory;

    protected $fillable = ['gambar_kamar', 'no_kamar', 'harga_kamar', 'kecepatan_internet', 'rating_kamar'];

    // public function building()
    // {
    //     return $this->belongsTo(Building::class, 'id_bangunan');
    // }
}
