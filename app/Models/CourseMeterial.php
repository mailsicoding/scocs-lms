<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CourseMeterial extends Model
{
    use HasFactory;
     
    protected $guarded = [];

    public function assignCourse()
    {
        return $this->hasOne(AssignClassCourses::class,'id','assign_course_id');
    }
}
