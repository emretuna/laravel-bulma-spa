<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'desc',
        'country',
        'city',
        'features',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];


    public function features()
    {
        return $this->hasMany(\App\Feature::class);
    }
}
