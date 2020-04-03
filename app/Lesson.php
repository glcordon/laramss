<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Lesson extends Model
{
    protected $guarded = [];
    protected $with = ['video'];

    public function course()
    {
        return $this->belongsTo('App\Course', 'course_id', 'id');
    }

    public function video()
    {
        return $this->morphOne('App\Video', 'videoable');
    }
    
}
