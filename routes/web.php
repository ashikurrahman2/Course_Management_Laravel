<?php

use App\Http\Controllers\ProfileController;
// use App\Http\Controllers\InstructorAuthController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\CartController;
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
Route::get('/instructor', [FrontendController::class, 'Itructor'])->name('i.tructor');
Route::get('/instructor/{id}', [FrontendController::class, 'ItructorDetail'])->name('i.tructor.details');
Route::get('/filter-courses', [CourseController::class, 'filterCourses'])->name('courses.filter');
Route::get('/Course-leasson', [FrontendController::class, 'LessonCourse'])->name('courses.lession');
Route::get('/faq', [FrontendController::class, 'frontFaq'])->name('faq');
Route::get('/about', [FrontendController::class, 'managementAbout'])->name('courses.about');
Route::get('/Admission', [FrontendController::class, 'Admissionreq'])->name('admission');
Route::get('/online-admission', [FrontendController::class, 'AdmissionForm'])->name('admission.form');
Route::post('/submission-form', [FrontendController::class, 'Submitform'])->name('submit.form');
Route::get('/contact', [FrontendController::class, 'Commu'])->name('contacts');
Route::get('/checkout/{id}', [FrontendController::class, 'Cartto'])->name('checkout');
Route::get('/carts', [CartController::class, 'index'])->name('carts');
Route::post('/carts/{id}', [CartController::class, 'store'])->name('carts.store');
Route::get('/carts/remove/{rowId}', [CartController::class, 'remove'])->name('carts.remove');
// Route::get('/order-history', [FrontendController::class, 'Ohistory'])->name('orders');
// Route::get('/register-instructor', [FrontendController::class, 'showRegisterForm'])->name('instructor.register');



    // SSLCommerz Callback Routes (No auth middleware)
    Route::controller(SslcommerzController::class)
        ->prefix('sslcommerz')
        ->name('sslc.')
        ->group(function () {
            Route::post('success', 'success')->name('success');
            Route::post('failure', 'failure')->name('failure');
            Route::post('cancel', 'cancel')->name('cancel');
            Route::post('ipn', 'ipn')->name('ipn');
        });
        
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


// Instructor login registration route
// Route::prefix('instructor')->group(function () {
//     Route::get('/register', [InstructorAuthController::class, 'showRegisterForm'])->name('instructor.register');
//     Route::post('/register', [InstructorAuthController::class, 'register'])->name('instructor.register.submit');

//     Route::get('/login', [InstructorAuthController::class, 'showLoginForm'])->name('instructor.login');
//     Route::post('/login', [InstructorAuthController::class, 'login'])->name('instructor.login.submit');

//     Route::get('/dashboard', function () {
//         return "Welcome Instructor Dashboard!";
//     })->name('instructor.dashboard')->middleware('auth:instructor');

//     Route::post('/logout', [InstructorAuthController::class, 'logout'])->name('instructor.logout');
// });

require __DIR__.'/auth.php';

require __DIR__.'/admin-auth.php';
require __DIR__.'/admin-dashboard.php';
require __DIR__.'/user.php';
require __DIR__.'/api.php';
