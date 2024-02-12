<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Course extends Model
{
    use HasFactory;
    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class);
    }
    public function courseDetails(): HasOne
    {
        return $this->hasOne(CourseDetails::class,'course_id','id');
    }
    public function courseLearnings(): HasMany
    {
        return $this->hasMany(CourseLearnings::class,'course_id','id');
    }
    public function courseForThoose(): HasMany
    {
        return $this->hasMany(CourseForThose::class,'course_id','id');
    }
    public function courseBenifits(): HasMany
    {
        return $this->hasMany(BenefitsOfCourse::class,'course_id','id');
    }
    public function coursestudentprojects(): HasMany
    {
        return $this->hasMany(CreativeProject::class,'course_id','id');
    }
    public function courseModuls(): HasMany
    {
        return $this->hasMany(CourseModule::class,'course_id','id');
    }
    public function courseFaq(): HasMany
    {
        return $this->hasMany(CourseFAQ::class,'course_id','id');
    }
}
