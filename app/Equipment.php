<?php

namespace App;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;


class Equipment extends Model
{

    use Searchable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
        'name', 'description', 'data', 'price', 'category_id', 'visible'
    ];
    
    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}