<?php

namespace App;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'caption', 'file_name', 'url', 'studio_id'
    ];
    
    public function studio()
    {
        return $this->belongsTo(Studio::class);
    }
}
