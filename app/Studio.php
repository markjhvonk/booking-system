<?php

namespace App;


class Studio extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
        'name', 'info', 'specs', 'cover_photo', 'location', 'assistance'
    ];

    public function equipment()
    {
        return $this->belongsToMany(Equipment::class);
    }
    
}