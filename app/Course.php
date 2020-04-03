<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    protected $guarded = [];
    protected $with = ['video', 'lesson'];

    public function video()
    {
        return $this->morphOne('App\Video', 'videoable');
    }
    
    public function lesson()
    {
        return $this->hasMany('App\Lesson', 'course_id', 'id');
    }
}
