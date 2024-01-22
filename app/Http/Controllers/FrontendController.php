<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        return view('frontend.pages.main');
    }
    public function about(){
        return view('frontend.pages.about.about');
    }
    public function course(){
        return view('frontend.pages.department.department');
    }
    public function success(){
        return view('frontend.pages.success.success');
    }
    public function career(){
        return view('frontend.pages.career.career');
    }
    public function contact(){
        return view('frontend.pages.contact.contact');
    }
    public function seminer(){
        return view('frontend.pages.seminer.seminer');
    }
    public function singleDepartment(){
        return view('frontend.pages.singleDepartment.singleDepartment');
    }
    public function singleCourse(){
        return view('frontend.pages.singleCourse.singleCourse');
    }
}
