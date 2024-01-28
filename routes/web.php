<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SuccessStoryController;
use App\Http\Controllers\Admin\MeetOurMentorsController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\AuthorisedController;
use App\Http\Controllers\Admin\FAQController;
use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;


//frontend
Route::get('/',[FrontendController::class, 'index'])->name('index');
Route::get('/about-us',[FrontendController::class, 'about'])->name('about');
Route::get('/our-courses',[FrontendController::class, 'course'])->name('course');
Route::get('/our-success',[FrontendController::class, 'success'])->name('success');
Route::get('/career',[FrontendController::class, 'career'])->name('career');
Route::get('/contact-us',[FrontendController::class, 'contact'])->name('contact');
Route::get('/free-seminer',[FrontendController::class, 'seminer'])->name('seminer');
Route::get('/our-course/department',[FrontendController::class, 'singleDepartment'])->name('singleDepartment');
Route::get('/our-course/course-name',[FrontendController::class, 'singleCourse'])->name('singleCourse');


//admin and users
Route::get('/admin',[AuthController::class, 'login'])->name('login');
Route::post('/admin-login',[AuthController::class, 'loginPost'])->name('loginPost');
Route::get('/register',[AuthController::class, 'register'])->name('register');
Route::post('/register-post',[AuthController::class, 'registerPost'])->name('registerPost');
Route::post('/logout',[AuthController::class, 'logout'])->name('logout');


// dashboard
Route::group(['prefix' => 'admin','middleware'=> 'isLoggedIn'], function () {
    Route::get('/dashboard',[DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile',[ProfileController::class, 'profile'])->name('profile');

    //about-us CRUD
    Route::get('/about',[AboutController::class, 'adminAbout'])->name('adminAbout');
    Route::post('/about-post',[AboutController::class, 'aboutPost'])->name('aboutPost');

    //hero-Information
    Route::get('/hero',[AboutController::class, 'hero'])->name('hero');
    Route::post('/hero-post',[AboutController::class, 'heroPost'])->name('heroPost');

    //Company-Information
    Route::get('/company-information',[AboutController::class, 'companyInformation'])->name('companyInformation');
    Route::post('/company-information-post',[AboutController::class, 'companyInformationPost'])->name('companyInformationPost');

    //Workspace-CRUD
    Route::get('/workspace',[AboutController::class, 'workspace'])->name('workspace');
    Route::post('/workspace-post',[AboutController::class, 'workspacePost'])->name('workspacePost');
    Route::post('/workspace-edit',[AboutController::class, 'workspaceEdit'])->name('workspaceEdit');
    Route::get('/workspace-delete/{id}',[AboutController::class, 'workspaceDelete'])->name('workspaceDelete');

    // Success Story
    Route::get('/success-story', [SuccessStoryController::class, 'successStory'])->name('successStory');
    Route::post('/success-story-post', [SuccessStoryController::class, 'successStoryPost'])->name('successStoryPost');
    Route::post('/success-story-edit', [SuccessStoryController::class, 'successStoryEdit'])->name('successStoryEdit');
    Route::get('/success-story-delete/{id}',[SuccessStoryController::class, 'successStoryDelete'])->name('successStoryDelete');

    // Meet Our Mentors
    Route::get('/meet-our-mentors', [MeetOurMentorsController::class, 'meetOurMentors'])->name('meetOurMentors');
    Route::post('/meet-our-mentors-post', [MeetOurMentorsController::class, 'meetOurMentorsPost'])->name('meetOurMentorsPost');
    Route::post('/meet-our-mentors-edit', [MeetOurMentorsController::class, 'meetOurMentorsEdit'])->name('meetOurMentorsEdit');
    Route::get('/meet-our-mentors-delete/{id}', [MeetOurMentorsController::class, 'meetOurMentorsDelete'])->name('meetOurMentorsDelete');

    // Review
    Route::get('/review', [ReviewController::class, 'review'])->name('review');
    Route::post('/review-post', [ReviewController::class, 'reviewPost'])->name('reviewPost');
    Route::post('/review-edit', [ReviewController::class, 'reviewEdit'])->name('reviewEdit');
    Route::get('/review-delete/{id}', [ReviewController::class, 'reviewDelete'])->name('reviewDelete');

    // Authorised
    Route::get('/authorised', [AuthorisedController::class, 'authorised'])->name('authorised');
    Route::post('/authorised-post', [AuthorisedController::class, 'authorisedPost'])->name('authorisedPost');
    Route::post('/authorised-edit', [AuthorisedController::class, 'authorisedEdit'])->name('authorisedEdit');
    Route::get('/authorised-delete/{id}', [AuthorisedController::class, 'authorisedDelete'])->name('authorisedDelete');

    //Department
    Route::get('/department', [CourseController::class, 'department'])->name('department');
    Route::post('/department-post', [CourseController::class, 'departmentPost'])->name('departmentPost');
    Route::post('/department-edit', [CourseController::class, 'departmentEdit'])->name('departmentEdit');
    Route::get('/department-delete/{id}', [CourseController::class, 'departmentDelete'])->name('departmentDelete');

    // FAQ
    Route::get('/faq', [FAQController::class, 'faq'])->name('faq');
    Route::post('/faq-post', [FAQController::class, 'faqPost'])->name('faqPost');
    Route::post('/faq-edit', [FAQController::class, 'faqEdit'])->name('faqEdit');
    Route::get('/faq-delete/{id}', [FAQController::class, 'faqDelete'])->name('faqDelete');
    //Department
    Route::get('/courses', [CourseController::class, 'courses'])->name('courses');
    Route::post('/course-post', [CourseController::class, 'coursePost'])->name('coursePost');
    Route::post('/course-edit', [CourseController::class, 'courseEdit'])->name('courseEdit');
    Route::get('/course-delete/{id}', [CourseController::class, 'courseDelete'])->name('courseDelete');

});

