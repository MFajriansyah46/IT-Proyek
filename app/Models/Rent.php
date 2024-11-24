<?php

namespace App\Models;

use Illuminate\Support\Carbon;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Rent extends Model
{
    use HasFactory;

    protected $guard = ['id'];

    public static function boot()
    {
        parent::boot();

        // Event yang dijalankan saat record akan dibuat
        static::creating(function ($rent) {
            if ($rent->tanggal_masuk) {
                // Set tanggal_keluar menjadi satu bulan setelah tanggal_masuk
                $rent->tanggal_keluar = Carbon::parse($rent->tanggal_masuk)->addMonth();
            }
        });

        // Event yang dijalankan saat record akan dibuat
        static::updating(function ($rent) {
            if ($rent->tanggal_masuk) {
                // Set tanggal_keluar menjadi satu bulan setelah tanggal_masuk
                $rent->tanggal_keluar = Carbon::parse($rent->tanggal_masuk)->addMonth();
            }
        });
    }

    public function room(): BelongsTo {
        return $this->BelongsTo(Room::class,'id_kamar');
    }

    public function tenant(): BelongsTo {
        return $this->BelongsTo(Tenant::class,'id_penyewa');
    }
    
}

