<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuccessStory extends Model
{
    use HasFactory;

    protected $table = 'success_stories';

    protected $fillable = [
        'thumbnail',
        'video_link'
    ];
}
