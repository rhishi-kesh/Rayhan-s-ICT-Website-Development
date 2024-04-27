<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function courseData(){
        $data = Course::get();
        return response($data);
    }
}
