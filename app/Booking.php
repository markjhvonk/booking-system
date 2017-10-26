<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    
    public function studio()
    {
        return $this->belongsTo(Studio::class);
    }

}
