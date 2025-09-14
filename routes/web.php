<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\User\SellController;
use App\Models\Course;
use App\Models\Category;
use App\Models\Assignment;
use Illuminate\Support\Facades\Route;

// Website route
Route::get('/', [FrontendController:: class, 'index'])->name('index');
 Route::get('/courses', [FrontendController:: class, 'allCourse'])->name('course');


// নির্দিষ্ট category এর কোর্স দেখানোর জন্য
// Route::get('/category/{slug}', [FrontendController::class, 'categoryCourses'])->name('courses.byCategory');
 Route::get('/courses-list', [FrontendController:: class, 'ListCourse'])->name('courselist');
//  Route::get('/courses/category/{category}', [FrontendController::class, 'courseByCategory'])->name('courses.byCategory');
//  Route::get('/course-details', [FrontendController:: class, 'CourseDetail'])->name('details');
//  Route::get('/courses/category/{id}', [FrontendController::class, 'coursesByCategory'])->name('courses.byCategory');
Route::get('/course/details/{id}', [FrontendController::class, 'details'])->name('course.details');
Route::get('/filter-courses', [CourseController::class, 'filterCourses'])->name('courses.filter');
Route::get('/Course-leasson', [FrontendController::class, 'LessonCourse'])->name('courses.lession');
Route::get('/about', [FrontendController::class, 'managementAbout'])->name('courses.about');
Route::get('/Admission', [FrontendController::class, 'Admissionreq'])->name('admission');


// User dashboard route
Route::get('/dashboard', function () {
    $courseCount = Course::count();// Total registration 
    $assignmentCount = Assignment::count();// Total registration 
      $categories = Category::all(); 
    return view('dashboard', compact('courseCount', 'categories','assignmentCount'));
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

require __DIR__.'/admin-auth.php';
require __DIR__.'/admin-dashboard.php';
require __DIR__.'/user.php';
