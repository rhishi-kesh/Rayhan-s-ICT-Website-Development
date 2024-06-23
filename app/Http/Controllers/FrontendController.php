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
use App\Models\PopUp;
use App\Models\Review;
use App\Models\Seminar;
use App\Models\SuccessStory;
use App\Models\Webinar;
use App\Models\WorkSpaceImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FrontendController extends Controller
{
    public function index(){
        $heroInformations = HeroInformation::first();
        $departments = Department::orderBy('created_at', 'asc')->get();
        $successStorys = SuccessStory::take('6')->get();
        $reviews = Review::get();
        $mentor = MeetOurMentors::with('department')->get();
        $auth_logo = Authorised::get();
        $faq = FAQ::get();
        // $course = [];
        $courses = Course::with(['courseDetails:id,course_id,price,thumbnail,duration,lecture,project,mentor_id','courseDetails.mentor:name,id'])
        ->where('is_active', '0')
        ->get();
        $bestSelling = Course::with(['courseDetails:id,course_id,price,thumbnail,duration,lecture,project,mentor_id','courseDetails.mentor:name,id'])
        ->where('is_active', '0')
        ->where('is_bestSelling', '0')
        ->get();
        $popup = PopUp::where('is_active','0')->first();
        return view('frontend.pages.main', compact('heroInformations','departments','successStorys','reviews','mentor','auth_logo','faq','courses','popup','bestSelling'));
    }
    public function about(){
        $about = About::first();
        $mentor = MeetOurMentors::get();
        $departments = Department::get();
        $workSpaceImage = WorkSpaceImage::get();
        $auth_logo = Authorised::get();
        return view('frontend.pages.about.about', compact('about','mentor','departments','workSpaceImage', 'auth_logo'));
    }
    public function course(){
        $courses = Course::with(['courseDetails:id,course_id,price,thumbnail,duration,lecture,project,mentor_id','courseDetails.mentor:name,id'])
        ->where('is_active', '0')
        ->orderBy('created_at', 'asc')
        ->get();

        $reviews = Review::get();
        return view('frontend.pages.course.course', compact('reviews','courses'));
    }
    public function success(){
        $successStorys = SuccessStory::get();
        $reviews = Review::get();
        return view('frontend.pages.success.success', compact('successStorys','reviews'));
    }
    public function contact(){
        $courses = Course::get();
        return view('frontend.pages.contact.contact', compact('courses'));
    }
    public function seminer(){
        $seminer = Seminar::get();
        $wabinars = Webinar::get();
        return view('frontend.pages.seminer.seminer', compact('seminer','wabinars'));
    }
    public function singleDepartment($slug){
        $departments = Department::select('id','departmentName')
        ->where('slug',$slug)->first();

        $courses = Course::with(['courseDetails:id,course_id,price,thumbnail,duration,lecture,project,mentor_id','courseDetails.mentor:name,id'])
        ->where('department_id',$departments->id)
        ->where('is_active', '0')
        ->get();

        $title = $departments->departmentName;
        return view('frontend.pages.singleDepartment.singleDepartment', compact('departments','courses','title'));
    }
    public function singleCourse($slug){
        $courses = Course::with(['department','courseDetails','courseDetails.mentor','courseLearnings','courseForThoose','courseBenifits','coursestudentprojects','courseModuls','courseFaq'])
        ->where('slug',$slug)
        ->where('is_active', '0')
        ->latest('created_at')
        ->first();
        $title = $courses->name;
        return view('frontend.pages.singleCourse.singleCourse', compact('courses','title'));
    }
    public function privacyPolicy(){
        return view('frontend.pages.privacyPolicy.privacyPolicy');
    }
    public function admission(){
        // $courses = Course::get();
        $courses = Http::get('http://management.interiorbangladesh.com/api/courses')->json();

        return view('frontend.pages.admisionform.admision', compact('courses'));
    }
    public function demoClass(){
        $courses = Course::get();
        return view('frontend.pages.democlassform.demoClass', compact('courses'));
    }
    public function singleSeminer($slug){
        $seminer = Seminar::where('slug', $slug)->first();
        $title = $seminer->title;
        return view('frontend.pages.singleSeminr.singleSeminer', compact('seminer', 'title'));
    }
    public function singleWebiner($slug){
        $webinar = Webinar::where('slug', $slug)->first();
        $title = $webinar->title;
        return view('frontend.pages.singleWebiner.singleWebinger', compact('webinar','title'));
    }
    public function certificate($id){
        $bestSelling = Course::with(['courseDetails:id,course_id,price,thumbnail,duration,lecture,project,mentor_id','courseDetails.mentor:name,id'])
        ->where('is_active', '0')
        ->where('is_bestSelling', '0')
        ->get();
        $data = Http::get("http://management.interiorbangladesh.com/api/user/$id")->json();
        return view('frontend.pages.certificate.certificate', compact('bestSelling', 'data'));
    }
}
