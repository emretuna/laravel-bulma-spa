<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Treatment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'icon',
        'desc',
        'duration',
        'procedure',
        'accommodation',
        'transport',
        'extra',
        'assistance',
        'guidance',
        'doctors',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];


    public function doctors()
    {
        return $this->hasMany(\App\Doctor::class);
    }

    public function clinic()
    {
        return $this->belongsTo(\App\Clinic::class);
    }
}
