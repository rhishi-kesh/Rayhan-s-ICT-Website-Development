<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\SuccessStoryController;
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
    Route::get('/about-post',[AboutController::class, 'aboutPost'])->name('aboutPost');

    // Success Story
    Route::get('/successStory', [SuccessStoryController::class, 'successStory'])->name('successStory');

    //hero-Information
    Route::get('/hero',[AboutController::class, 'hero'])->name('hero');
    Route::post('/hero-post',[AboutController::class, 'heroPost'])->name('heroPost');

    //Company-Information
    Route::get('/company-information',[AboutController::class, 'companyInformation'])->name('companyInformation');
    Route::post('/company-information-post',[AboutController::class, 'companyInformationPost'])->name('companyInformationPost');

    //Workspace-CRUD
    Route::get('/workspace',[AboutController::class, 'workspace'])->name('workspace');
    Route::post('/workspacePost',[AboutController::class, 'workspacePost'])->name('workspacePost');
});

