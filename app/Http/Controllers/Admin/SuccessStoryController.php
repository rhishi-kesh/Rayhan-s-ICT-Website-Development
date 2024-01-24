<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SuccessStoryController extends Controller
{
    public function successStory(){

        return view('backend.pages.successStory.successStory');
    }
    
}
