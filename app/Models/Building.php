<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Building extends Model
{
    use HasFactory;

    protected $table = 'buildings';
    protected $primaryKey = 'id_bangunan';
    public $timestamps = true;

    protected $fillable = ['unit', 'address', 'latitude', 'longitude'];

    // public function rooms()
    // {
    //     return $this->hasMany(Room::class, 'id_bangunan'); 
    // }
}