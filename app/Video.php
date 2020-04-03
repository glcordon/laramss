<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Video extends Model
{
    protected $guarded = [];

    public function videoable()
    {
        return $this->morphTo();
    }
}
