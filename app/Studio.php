<?php

namespace App;


class Studio extends Model
{
    public function colorama(){
        return $this->belongsToMany(Colorama::class);
    }
    public function equipmentKits(){
        return $this->belongsToMany(Equipment_kit::class);
    }
    public function lunchKits(){
        return $this->belongsToMany(Lunch_kit::class);
    }
    public function minibarContents(){
        return $this->belongsToMany(Minibar_content::class);
    }
}