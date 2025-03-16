<?php

use App\Http\Controllers\JobController;
use Illuminate\Support\Facades\Route;

Route::view('/', 'home');
Route::view('/contact', 'contact');

Route::resource('jobs', JobController::class);

// Route::controller(JobController::class)->group(function () {

//     Route::get('/jobs/create',    'index');
//     Route::post('/jobs',          'create');
//     Route::get('/jobs/{job}',     'show');
//     Route::get('/jobs/{job}/edit','edit');
//     Route::patch('/jobs/{job}',   'update'); 
//     Route::delete('/jobs/{job}',  'destroy');
    
// });
