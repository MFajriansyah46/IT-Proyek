<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Criteria extends Model
{
    use HasFactory;
    protected $table = 'criteries';
    protected $fillable = ['owner_id','criteria_name','weight'];

    public function owner(): BelongsTo {
        return $this->belongsTo(Owner::class);
    }
}