<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table = 'rooms'; // Nama tabel jika tidak sesuai konvensi Eloquent
    
    protected $primaryKey = 'id_kamar'; // Kolom primary key yang digunakan
    
    public $timestamps = true; // Jika tabel memiliki kolom timestamps (created_at, updated_at)
}

// class Room extends Model
// {
//     use HasFactory;

//     // Kolom-kolom yang bisa diisi secara massal
//     protected $fillable = ['no_kamar', 'harga_kamar', 'kecepatan_internet', 'rating_kamar'];


// }