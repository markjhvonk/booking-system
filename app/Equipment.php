<?php

namespace App;
use Illuminate\Database\Eloquent\Model;


class Equipment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
        'name', 'description', 'data', 'price', 'category_id'
    ];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}