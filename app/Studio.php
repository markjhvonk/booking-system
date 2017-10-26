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
        'name', 'info', 'specs', 'cover_photo', 'location', 'assistance', 'visible'
    ];

    public function equipment()
    {
        return $this->belongsToMany(Equipment::class);
    }

    public function package()
    {
        return $this->belongsToMany(Package::class);
    }
    
    public function photo()
    {
        return $this->hasMany(Photo::class);
    }
    
}