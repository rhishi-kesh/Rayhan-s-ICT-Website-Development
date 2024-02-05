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
}
