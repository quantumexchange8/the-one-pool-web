<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use App\Models\Service;

Route::get('/', [HomeController::class, 'index']);

Route::get('/aboutus', function () {
    return view('about');
});

Route::get('/services', [ServiceController::class, 'index']);

Route::get('/projects', [ProjectController::class, 'index']);

Route::get('/contactus', function () {
    return view('contactus');
});

Route::get('/sevicedetail/{id}', [ServiceController::class, 'show'])->name('service.details');

Route::get('/projectdetail/{id}', [ProjectController::class, 'show'])->name('project.details');


