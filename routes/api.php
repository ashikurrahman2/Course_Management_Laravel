<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\DistrictController;

Route::get('/divisions', [DistrictController::class, 'divisions']);
Route::get('/districts/{division}', [DistrictController::class, 'districts']);
