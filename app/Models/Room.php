<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    // Kolom-kolom yang bisa diisi secara massal
    protected $fillable = ['no_kamar', 'harga_kamar', 'kecepatan_internet', 'rating_kamar'];


}