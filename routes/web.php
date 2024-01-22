<?php

use App\Http\Controllers\FrontendController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;


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
Route::get('/admin',[AuthController::class, 'login']);
