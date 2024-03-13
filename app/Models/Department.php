<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Department extends Model
{
    use HasFactory;
    protected $fillable = [
        'image',
        'departmentName'
    ];

    public function course(): HasMany
    {
        return $this->hasMany(Course::class,'department_id','id');
    }
}
