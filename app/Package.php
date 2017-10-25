<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    use Searchable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
     protected $fillable = [
        'name', 'description', 'category_id'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function equipment()
    {
        return $this->belongsToMany(Equipment::class);
    }
}
