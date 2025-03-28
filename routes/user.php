<?php

use App\Http\Controllers\User\UserController;
// use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    // Profile route
    Route::get('/profile', [UserController::class, 'index'])->name('profile');
    Route::get('/enrolled-courses', [UserController::class, 'enroll'])->name('enrolled');
    Route::get('/whishlist', [UserController::class, 'Wishlist'])->name('whishlists');
    Route::get('/reviews', [UserController::class, 'Review'])->name('streview');
    Route::get('/anouncement', [UserController::class, 'Anounce'])->name('anounced');
    Route::get('/Order-history', [UserController::class, 'Orderlist'])->name('orderlist');
    Route::get('/settings', [UserController::class, 'Usetting'])->name('stusettings');
    Route::get('/profile-edit', [UserController::class, 'Usetting'])->name('profile.edit');
    Route::patch('/profile-update', [UserController::class, 'updateProfile'])->name('profile.update');
    Route::patch('/update-password', [UserController::class, 'updatePassword'])->name('password.update');
});
