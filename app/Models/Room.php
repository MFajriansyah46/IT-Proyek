<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Room extends Model
{
    protected $table = 'rooms'; // Nama tabel jika tidak sesuai konvensi Eloquent
    
    protected $primaryKey = 'id_kamar'; // Kolom primary key yang digunakan
    
    public $timestamps = true; // Jika tabel memiliki kolom timestamps (created_at, updated_at)

    use HasFactory;

    // Kolom-kolom yang bisa diisi secara massal
    protected $fillable = ['no_kamar', 'harga_kamar', 'kecepatan_internet', 'rating_kamar'];

    public function building(): BelongsTo {
        return $this->belongsTo(Building::class);
    }
}