<?php

namespace App\Http\Controllers;

use App\Models\About;
use App\Models\Authorised;
use App\Models\CompanyInformation;
use App\Models\Course;
use App\Models\Department;
use App\Models\FAQ;
use App\Models\HeroInformation;
use App\Models\MeetOurMentors;
use App\Models\Review;
use App\Models\Seminar;
use App\Models\SuccessStory;
use App\Models\Webinar;
use App\Models\WorkSpaceImage;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){
        $heroInformations = HeroInformation::first();
        $departments = Department::get();
        $successStorys = SuccessStory::take('6')->get();
        $reviews = Review::get();
        $mentor = MeetOurMentors::get();
        $auth_logo = Authorised::get();
        $faq = FAQ::get();
        $course = [];
        $course = Course::with(['courseDetails:id,course_id,price,thumbnail,mentor_id','courseDetails.mentor:name,id'])->where('is_active', '0')->get();

        return view('frontend.pages.main', compact('heroInformations','departments','successStorys','reviews','mentor','auth_logo','faq','course'));
    }
    public function about(){
        $about = About::first();
        $mentor = MeetOurMentors::get();
        $departments = Department::get();
        $workSpaceImage = WorkSpaceImage::get();
        return view('frontend.pages.about.about', compact('about','mentor','departments','workSpaceImage'));
    }
    public function course(){
        $courses = Course::with(['department','courseDetails:id,course_id,price,thumbnail,mentor_id','courseDetails.mentor:name,id'])->where('is_active', '0')->get();
        $reviews = Review::get();
        return view('frontend.pages.course.course', compact('courses','reviews'));
    }
    public function success(){
        $successStorys = SuccessStory::get();
        $reviews = Review::get();
        return view('frontend.pages.success.success', compact('successStorys','reviews'));
    }
    public function contact(){
        return view('frontend.pages.contact.contact');
    }
    public function seminer(){
        $seminer = Seminar::get();
        $wabinars = Webinar::get();
        return view('frontend.pages.seminer.seminer', compact('seminer','wabinars'));
    }
    public function singleDepartment($slug){
        $departments = Department::select('id','departmentName')->where('slug',$slug)->first();
        $courses = Course::with(['courseDetails:id,course_id,price,thumbnail,mentor_id','courseDetails.mentor:name,id'])->where('department_id',$departments->id)->get();
        $title = $departments->departmentName;
        return view('frontend.pages.singleDepartment.singleDepartment', compact('departments','courses','title'));
    }
    public function singleCourse($slug){
        $courses = Course::with(['department','courseDetails','courseDetails.mentor'])->where('slug',$slug)->first();
        $title = $courses->name;
        return view('frontend.pages.singleCourse.singleCourse', compact('courses','title'));
    }
    public function privacyPolicy(){
        return view('frontend.pages.privacyPolicy.privacyPolicy');
    }
}
