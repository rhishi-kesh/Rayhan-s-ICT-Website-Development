<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    use HasFactory;
    protected $fillable = [
        'chooseUs',
        'chooseUsImage',
        'missionVision',
        'missionVisionImage',
        'successfullStudent',
        'courseComplete',
        'successRatio',
    ];
}
