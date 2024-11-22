<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ContactController;

Route::get('/', [HomeController::class, 'index'])->name('home.index');

Route::post('/', [HomeController::class, 'submit'])->name('home.submit');

Route::get('/aboutus', function () { 
    return view('about'); 
});

Route::get('/contactus', function () {  
    return view('contactus'); 
})->name('contactus');

Route::post('/contactus', [ContactController::class, 'submit'])->name('contact.submit');

Route::prefix('services')->group(function () {
    Route::get('/', [ServiceController::class, 'index'])->name('services');
    Route::get('/detail/{id}', [ServiceController::class, 'show'])->name('service.details');
});

Route::prefix('projects')->group(function () {
    Route::get('/', [ProjectController::class, 'index'])->name('projects');
    Route::get('/detail/{id}', [ProjectController::class, 'show'])->name('project.details');
});

Route::fallback(function () {
    return view('errors404'); 
});
