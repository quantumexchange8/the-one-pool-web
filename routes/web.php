<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home');
});

Route::get('/aboutus', function () {
    return view('about');
});

Route::get('/services', function () {
    return view('services');
});

Route::get('/projects', function () {
    return view('projects');
});

Route::get('/contactus', function () {
    return view('contactus');
});

Route::get('/servicedetail', function () {
    return view('servicedetail');
});

Route::get('/projectdetail', function () {
    return view('projectdetail');
});