<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Condition extends Model
{
    use HasFactory;

    protected $fillable = ['name','index','color'];

    public function facilities(): HasMany {
        return $this->HasMany(Facility::class, 'condition_id');
    }
}
