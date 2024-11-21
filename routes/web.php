<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ContactController;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::post('/', [HomeController::class, 'submit'])->name('home.submit');

Route::get('/aboutus', function () { return view('about'); });

Route::get('/services', [ServiceController::class, 'index']);

Route::get('/projects', [ProjectController::class, 'index'])->name('projects');

Route::get('/contactus', function () { return view('contactus'); })->name('contactus');

Route::post('/contactus', [ContactController::class, 'submit'])->name('contact.submit');

Route::get('/sevicedetail/{id}', [ServiceController::class, 'show'])->name('service.details');

Route::get('/projectdetail/{id}', [ProjectController::class, 'show'])->name('project.details');


