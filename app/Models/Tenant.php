<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Tenant extends User
{
    use HasFactory;

    protected $guarded = ['id'];

    protected $fillable = ['name','phone_number','image','username','password'];

    public function rent(): HasMany {
        return $this->HasMany(Rent::class,'id_kamar');
    }

    public function transaction(): HasMany {
        return $this->HasMany(Transaction::class);
    }

    public function rates(): HasMany {
        return $this->HasMany(Rate::class,'id_kamar');
    }

    public function roommate(): HasOne
    {
        return $this->hasOne(Roommate::class);
    }

}
