<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Clinic extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'owner_id',
        'status',
        'name',
        'address',
        'about',
        'languages',
        'location',
        'country',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'owner_id' => 'integer',
    ];


    public function treatments()
    {
        return $this->hasMany(\App\Treatment::class);
    }

    public function comments()
    {
        return $this->hasMany(\App\Comment::class);
    }

    public function badges()
    {
        return $this->hasMany(\App\Badge::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\User::class);
    }

    public function owner()
    {
        return $this->belongsTo(\App\User::class);
    }
}
