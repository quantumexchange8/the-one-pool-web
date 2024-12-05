<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;

// Home Page
Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::post('/', [HomeController::class, 'submit'])->name('home.submit');

// About Us
Route::get('/aboutus', function () {
    return view('about');
})->name('aboutus');

// Contact Us
Route::get('/contactus', function () {
    return view('contactus');
})->name('contactus');
Route::post('/contactus', [ContactController::class, 'submit'])->name('contact.submit');

// Services
Route::prefix('services')->group(function () {
    Route::get('/', [ServiceController::class, 'index'])->name('services');
    Route::get('/detail/{id}', [ServiceController::class, 'show'])->name('service.details');
});

// Projects
Route::prefix('projects')->group(function () {
    Route::get('/', [ProjectController::class, 'index'])->name('projects');
    Route::get('/detail/{id}', [ProjectController::class, 'show'])->name('project.details');
});

// Fallback for 404
Route::fallback(function () {
    return view('errors404');
});

// Dashboard and Profile (Authenticated Routes)
Route::middleware(['auth', 'verified'])->group(function () {
    //Dashboard
    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->name('dashboard');
    Route::get('/dashboard/stats', [AdminController::class, 'getStats'])->name('dashboard.stats');

    //Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    //Admin
    Route::get('/admin', [AdminController::class, 'profile'])->name('admin.profile');
    //List Admin
    Route::get('/adminlist', [AdminController::class, 'adminList'])->name('admin.adminList');
    //Create Admin
    Route::post('/storeAdmin', [AdminController::class, 'storeAdmin'])->name('admin.store_admin');


    //Services
    Route::get('/service', [AdminController::class, 'service'])->name('admin.service');
    //Create Service
    Route::post('/storeService', [AdminController::class, 'storeService'])->name('admin.store_service');
    //Update Service
    Route::put('/updateService/{id}', [AdminController::class, 'updateService'])->name('admin.update_service');
    //Retrive Service
    Route::get('/servicelist', [AdminController::class, 'serviceList'])->name('serviceList');
    //Delete Service
    Route::post('/destroyService/{id}', [AdminController::class, 'destroyService'])->name('destroyService');
    //Deleted Service Image
    Route::post('/destroyServiceImage/{id}', [AdminController::class, 'destroyServiceImage'])->name('admin.destroyServiceImage');
    //Deleted Service Detail
    Route::post('/destroyServiceDetail/{id}', [AdminController::class, 'destroyServiceDetail'])->name('admin.destroyServiceDetail');
    //Deleted Service Section
    Route::post('/destroyServiceSection/{id}', [AdminController::class, 'destroyServiceSection'])->name('admin.destroyServiceSection');
    //Upload Service Image
    Route::post('/uploadServiceImage', [AdminController::class, 'uploadServiceImage'])->name('admin.uploadServiceImage');
    

    //Projects
    Route::get('/project', [AdminController::class, 'project'])->name('admin.project');
    //Retrive Project
    Route::get('/projectlist', [AdminController::class, 'projectList'])->name('projectList');
    //Create Project
    Route::post('/storeProject', [AdminController::class, 'storeProject'])->name('admin.storeProject');
    //Delete Project
    Route::post('/destroyProject/{id}', [AdminController::class, 'destroyProject'])->name('destroyProject');
    //Update Project
    Route::put('/updateProject/{id}', [AdminController::class, 'updateProject'])->name('admin.updateProject');
    //Deleted Project Image
    Route::post('/destroyProjectImage/{id}', [AdminController::class, 'destroyProjectImage'])->name('admin.destroyProjectImage');
    //Upload Project Image
    Route::post('/uploadProjectImage', [AdminController::class, 'uploadProjectImage'])->name('admin.uploadProjectImage');
});

// Auth Routes
require __DIR__.'/auth.php';
