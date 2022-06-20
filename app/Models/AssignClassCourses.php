<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AssignClassCourses extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function class()
    {
        return $this->hasOne(Classes::class,'id','class_id');
    }

    public function course()
    {
        return $this->hasOne(Course::class,'id','course_id');
    }

    public function semester()
    {
        return $this->hasOne(Semester::class,'id','semester_id');
    }
    
    public function meterial()
    {
        return $this->hasMany(CourseMeterial::class,'assign_course_id','id');
    }

}
