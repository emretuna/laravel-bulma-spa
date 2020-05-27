<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'owner_id',
        'comment',
        'star',
        'vote',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'owner_id' => 'integer',
        'star' => 'integer',
    ];


    public function clinic()
    {
        return $this->belongsTo(\App\Clinic::class);
    }

    public function owner()
    {
        return $this->belongsTo(\App\User::class);
    }
}
