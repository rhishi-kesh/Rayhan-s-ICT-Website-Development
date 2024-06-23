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
use App\Http\Controllers\Admin\SeminarController;
use App\Http\Controllers\Admin\UsersControllser;
use App\Http\Controllers\Admin\WebinarController;
use App\Http\Controllers\Admin\PopUpController;
use App\Http\Controllers\Admin\TopAdvertisingController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\Mail\MailController;
use App\Models\Seminar;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Artisan;

Route::get('/rrr', function () {
    Artisan::call('optimize:clear');
    return "Done";
});


//frontend
Route::get('/',[FrontendController::class, 'index'])->name('index');
Route::get('/about-us',[FrontendController::class, 'about'])->name('about');
Route::get('/our-courses',[FrontendController::class, 'course'])->name('course');
Route::get('/our-success',[FrontendController::class, 'success'])->name('success');
Route::get('/career',[FrontendController::class, 'career'])->name('career');
Route::get('/contact-us',[FrontendController::class, 'contact'])->name('contact');
Route::get('/seminer',[FrontendController::class, 'seminer'])->name('seminer');
Route::get('/our-department/{slug}',[FrontendController::class, 'singleDepartment'])->name('singleDepartment');
Route::get('/our-course/{slug}',[FrontendController::class, 'singleCourse'])->name('singleCourse');
Route::get('/privacy-policy',[FrontendController::class, 'privacyPolicy'])->name('privacyPolicy');
Route::get('/admission',[FrontendController::class, 'admission'])->name('admission');
Route::get('/demo-class',[FrontendController::class, 'demoClass'])->name('demoClass');
Route::get('/seminar/{slug}',[FrontendController::class, 'singleSeminer'])->name('singleSeminer');
Route::get('/webinar/{slug}',[FrontendController::class, 'singleWebiner'])->name('singleWebiner');
Route::get('/certificate/{id}',[FrontendController::class, 'certificate'])->name('certificate');

//send mail
Route::post('/admission-post',[MailController::class, 'admissionPost'])->name('admissionPost');
Route::post('/seminer-registation-post',[MailController::class, 'seminerRegistationPost'])->name('seminerRegistationPost');
Route::post('/webiner-registation-post',[MailController::class, 'webinerRegistationPost'])->name('webinerRegistationPost');
Route::post('/demo-class-post',[MailController::class, 'applyForDemoClassPost'])->name('applyForDemoClassPost');
Route::post('/contact-us-post',[MailController::class, 'ContactPost'])->name('ContactPost');


//admin and users
Route::get('/admin',[AuthController::class, 'login'])->name('login');
Route::post('/admin-login',[AuthController::class, 'loginPost'])->name('loginPost');

// dashboard
Route::group(['prefix' => 'admin','middleware'=> 'auth'], function () {
    Route::get('/dashboard',[DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/dashboard-admissionDelete/{id}',[DashboardController::class, 'admissionDelete'])->name('admissionDelete');
    Route::get('/dashboard-search', [DashboardController::class, 'AdmisionSearch'])->name('AdmisionSearch');
    Route::get('/profile',[ProfileController::class, 'profile'])->name('profile');
    Route::post('/profile-edit',[ProfileController::class, 'profileEdit'])->name('profileEdit');
    Route::post('/profile-image',[ProfileController::class, 'profileImagae'])->name('profileImagae');

    // Demo Class data Dashboard
    Route::get('/demo-class',[DashboardController::class, 'applyDemoClass'])->name('applyDemoClass');
    Route::get('/demo-class-delete/{id}',[DashboardController::class, 'demoClassDelete'])->name('demoClassDelete');
    Route::get('/demo-class-search', [DashboardController::class, 'DemoClsSearch'])->name('DemoClsSearch');

    // Contact Us data Dashboard
    Route::get('/contact-dashboard',[DashboardController::class, 'ContactUs'])->name('ContactUs');
    Route::get('/contact-us-delete/{id}',[DashboardController::class, 'ContactUsDelete'])->name('ContactUsDelete');
    Route::get('/contact-search',[DashboardController::class, 'ContactSearch'])->name('ContactSearch');

    //Seminer data Dashboard
    Route::get('/seminer-data',[DashboardController::class, 'seminerData'])->name('seminerData');
    Route::get('/seminer-data-delete/{id}',[DashboardController::class, 'seminarDataDelete'])->name('seminarDataDelete');

    //Seminer data Dashboard
    Route::get('/webinar-data',[DashboardController::class, 'webinarData'])->name('webinarData');
    Route::get('/webinar-data-delete/{id}',[DashboardController::class, 'webinarDataDelete'])->name('webinarDataDelete');

    // admin and user
    Route::get('/register',[AuthController::class, 'register'])->name('register')->middleware('profile');
    Route::post('/register-post',[AuthController::class, 'registerPost'])->name('registerPost')->middleware('profile');
    Route::post('/logout',[AuthController::class, 'logout'])->name('logout');
    Route::get('/change-password', [ProfileController::class, 'changePassword'])->name('changePassword');
    Route::post('/change-update-password', [ProfileController::class, 'updatePassword'])->name('updatePassword');

    // about-us CRUD
    Route::get('/about',[AboutController::class, 'adminAbout'])->name('adminAbout');
    Route::post('/about-post',[AboutController::class, 'aboutPost'])->name('aboutPost');

    // hero-Information
    Route::get('/hero',[AboutController::class, 'hero'])->name('hero');
    Route::post('/hero-post',[AboutController::class, 'heroPost'])->name('heroPost');

    // Company-Information
    Route::get('/company-information',[AboutController::class, 'companyInformation'])->name('companyInformation');
    Route::post('/company-information-post',[AboutController::class, 'companyInformationPost'])->name('companyInformationPost');

    // Workspace-CRUD
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

    // FAQ
    Route::get('/faq', [FAQController::class, 'faq'])->name('faq');
    Route::post('/faq-post', [FAQController::class, 'faqPost'])->name('faqPost');
    Route::post('/faq-edit', [FAQController::class, 'faqEdit'])->name('faqEdit');
    Route::get('/faq-delete/{id}', [FAQController::class, 'faqDelete'])->name('faqDelete');

    //Department
    Route::get('/department', [CourseController::class, 'department'])->name('department');
    Route::post('/department-post', [CourseController::class, 'departmentPost'])->name('departmentPost');
    Route::post('/department-edit', [CourseController::class, 'departmentEdit'])->name('departmentEdit');
    Route::get('/department-delete/{id}', [CourseController::class, 'departmentDelete'])->name('departmentDelete');

    //Seminar
    Route::get('/seminar',[SeminarController::class, 'seminar'])->name('seminar');
    Route::post('/seminar-post',[SeminarController::class, 'seminarPost'])->name('seminarPost');
    Route::post('/seminar-edit',[SeminarController::class, 'seminarEdit'])->name('seminarEdit');
    Route::get('/seminar-delete/{id}',[SeminarController::class, 'seminarDelete'])->name('seminarDelete');

    //Course
    Route::get('/courses', [CourseController::class, 'courses'])->name('courses');
    Route::post('/course-post', [CourseController::class, 'coursePost'])->name('coursePost');
    Route::post('/course-edit', [CourseController::class, 'courseEdit'])->name('courseEdit');
    Route::get('/course-delete/{id}', [CourseController::class, 'courseDelete'])->name('courseDelete');
    Route::post('/staus', [CourseController::class, 'staus'])->name('staus');
    Route::post('/is-footer', [CourseController::class, 'is_footer'])->name('is_footer');
    Route::post('/is-bestselling', [CourseController::class, 'is_bestSelling'])->name('is_bestSelling');

    //Course-Detailes
    Route::get('/course-detailes/{id}', [CourseController::class, 'courseDetailes'])->name('courseDetailes');
    Route::post('/course-detailes-edit/{id}', [CourseController::class, 'courseDetailesEdit'])->name('courseDetailesEdit');

    // Webinar
    Route::get('/webinar', [WebinarController::class, 'webinar'])->name('webinar');
    Route::post('/webinar-post', [WebinarController::class, 'webinarPost'])->name('webinarPost');
    Route::post('/webinar-edit', [WebinarController::class, 'webinarEdit'])->name('webinarEdit');
    Route::get('/webinar-delete/{id}', [WebinarController::class, 'webinarDelete'])->name('webinarDelete');

    //learning Form Course
    Route::get('/course-learnings/{id}', [CourseController::class, 'CourseLearnings'])->name('CourseLearnings');
    Route::post('/course-learnings-post/{id}', [CourseController::class, 'CourseLearningsPost'])->name('CourseLearningsPost');
    Route::post('/course-learnings-edit', [CourseController::class, 'CourseLearningsEdit'])->name('CourseLearningsEdit');
    Route::get('/course-learnings-delete/{id}', [CourseController::class, 'CourseLearningsDelete'])->name('CourseLearningsDelete');

    // Course For Those
    Route::get('/Course-for-those/{id}', [CourseController::class, 'courseForThose'])->name('courseForThose');
    Route::post('/Course-for-those-post/{id}', [CourseController::class, 'courseForThosePost'])->name('courseForThosePost');
    Route::post('/Course-for-those-edit', [CourseController::class, 'courseForThoseEdit'])->name('courseForThoseEdit');
    Route::get('/Course-for-those-delete/{id}', [CourseController::class, 'courseForThoseDelete'])->name('courseForThoseDelete');

    // Benefits of Course
    Route::get('/benefit-of-course/{id}', [CourseController::class, 'benefitsOfCourse'])->name('benefitsOfCourse');
    Route::post('/benefit-of-course-post/{id}', [CourseController::class, 'benefitsOfCoursePost'])->name('benefitsOfCoursePost');
    Route::post('/benefit-of-course-edit', [CourseController::class, 'benefitsOfCourseEdit'])->name('benefitsOfCourseEdit');
    Route::get('/benefit-of-course-delete/{id}', [CourseController::class, 'benefitsOfCourseDelete'])->name('benefitsOfCourseDelete');

    // Creative Projetcs
    Route::get('creative-project/{id}', [CourseController::class, 'creativeProject'])->name('creativeProject');
    Route::post('creative-project-post/{id}', [CourseController::class, 'creativeProjectPost'])->name('creativeProjectPost');
    Route::post('creative-project-edit', [CourseController::class, 'creativeProjectEdit'])->name('creativeProjectEdit');
    Route::get('creative-project-delete/{id}', [CourseController::class, 'creativeProjectDelete'])->name('creativeProjectDelete');

    // Course Module
    Route::get('/course-module/{id}', [CourseController::class, 'courseModule'])->name('courseModule');
    Route::post('/course-module-post/{id}', [CourseController::class, 'courseModulePost'])->name('courseModulePost');
    Route::post('/course-module-edit', [CourseController::class, 'courseModuleEdit'])->name('courseModuleEdit');
    Route::get('/course-module-delete/{id}', [CourseController::class, 'courseModuleDelete'])->name('courseModuleDelete');

    // Course FAQ
    Route::get('/course-faq/{id}', [CourseController::class, 'courseFAQ'])->name('courseFAQ');
    Route::post('/course-faq-post/{id}', [CourseController::class, 'courseFAQPost'])->name('courseFAQPost');
    Route::post('/course-faq-edit', [CourseController::class, 'courseFAQEdit'])->name('courseFAQEdit');
    Route::get('/course-faq-delete/{id}', [CourseController::class, 'courseFAQDelete'])->name('courseFAQDelete');

    // pop_up
    Route::get('/popUp', [PopUpController::class, 'popUp'])->name('popUp');
    Route::post('/popUp-post', [PopUpController::class, 'popUpPost'])->name('popUpPost');
    Route::post('/popUp-edit', [PopUpController::class, 'popUpEdit'])->name('popUpEdit');
    Route::get('/popUp-delete/{id}', [PopUpController::class, 'popUpDelete'])->name('popUpDelete');
    Route::post('/status', [PopUpController::class, 'status'])->name('status');

    // Top Advertising
    Route::get('/top-Advertising', [TopAdvertisingController::class, 'topAdvertising'])->name('topAdvertising');
    Route::post('/top-Advertising-post', [TopAdvertisingController::class, 'topAdvertisingPost'])->name('topAdvertisingPost');
    Route::post('/top-Advertising-edit', [TopAdvertisingController::class, 'topAdvertisingEdit'])->name('topAdvertisingEdit');
    Route::get('/top-Advertising-delete/{id}', [TopAdvertisingController::class, 'topAdvertisingDelete'])->name('topAdvertisingDelete');
    Route::post('/topstatus', [TopAdvertisingController::class, 'topstatus'])->name('topstatus');

    //user
    Route::get('/users', [UsersControllser::class, 'users'])->name('users')->middleware('profile');
    Route::get('/users-delete/{id}', [UsersControllser::class, 'usersDelete'])->name('usersDelete')->middleware('profile');
});
