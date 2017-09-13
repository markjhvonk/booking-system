<?php

namespace App;

use Illuminate\Database\Eloquent\Model as Eloquent;

class Model extends Eloquent
{
    // globally allow all field data
    protected $guarded = [];
}
