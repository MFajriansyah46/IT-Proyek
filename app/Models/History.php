<?php

namespace App\Models;

use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class History extends Model
{
    use HasFactory;

    protected $table = 'histories';

    protected $fillable = ['user','as','action','entity','description','before_data','after_data','created_at','updated_at'];

    public static function log($value, $type, $entity,  $action)
    {

        if(auth('owner')->user()) {
            $as = 'owner';
            $username = auth('owner')->user()->username;
        } else if(auth('tenant')->user()) {
            $as = 'tenant';
            $username = auth('tenant')->user()->username;
        } else {
            $as = 'guest';
            $username = 'Guest';
        }

        \DB::table('histories')->insert([
            'user' => $username ?? 'Guest',
            'as' => $as,
            'action' => $action,
            'entity' => $entity,
            'description' => "{$username} has been {$action} {$type}.",
            'before_data' => in_array($action, ['delete', 'update']) ? json_encode($value->getOriginal()) : '',
            'after_data' => $action !== 'delete' ? json_encode($value->getAttributes()) : '',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(fn($value) => History::log($value, 'history','histories','create'));
        static::updating(fn($value) => History::log($value, 'history','histories' ,'update'));
        static::deleting(fn($value) => History::log($value, 'history','histories','delete'));
    }

}
