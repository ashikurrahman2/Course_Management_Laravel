<?php
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\DistrictController;

Route::get('/districts', [DistrictController::class, 'Data']);
