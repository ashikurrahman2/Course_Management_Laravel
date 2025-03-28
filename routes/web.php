<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\User\SellController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });
// Website route
Route::get('/', [FrontendController:: class, 'index'])->name('index');
// Route::get('/about', [FrontendController:: class, 'About'])->name('about');
 Route::get('/courses', [FrontendController:: class, 'allCourse'])->name('course');
 Route::get('/course-details', [FrontendController:: class, 'CourseDetail'])->name('details');


// Route::post('/apply-sell', [FrontendController::class, 'applySell'])->name('sell.apply');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

require __DIR__.'/admin-auth.php';
require __DIR__.'/admin-dashboard.php';
require __DIR__.'/user.php';
