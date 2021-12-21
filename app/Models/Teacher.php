<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    public function courses(){
        return $this->hasMany(Course::class);
    }
    public function lessons(){
        return $this->hasManyThrough(Lesson::class, Course::class);
    }
    public function department(){
        return $this->belongsTo(Department::class);
    }
}
