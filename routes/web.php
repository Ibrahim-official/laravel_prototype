<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SessionController;
use App\Jobs\TranslateJob;
use App\Models\Job;
use Illuminate\Support\Facades\Route;

Route::get('test', function () {

    $job = Job::first();
    TranslateJob::dispatch($job);

    return 'Test Done';
});

Route::view('/', 'home');
Route::view('/contact', 'contact');

// // index, create, store,- show, edit, update,- destroy
// Route::resource('/jobs', JobController::class)->only(['index', 'except']);
// Route::resource('/jobs', JobController::class)->except(['index', 'except'])->middleware('auth');

Route::get('/jobs',            [JobController::class, 'index']);
Route::get('/jobs/create',     [JobController::class, 'create']);
Route::post('/jobs',           [JobController::class, 'store'])->middleware('auth');
Route::get('/jobs/{job}',      [JobController::class, 'show']);
Route::get('/jobs/{job}/edit', [JobController::class, 'edit'])->middleware('auth')->can('edit', 'job');
Route::patch('/jobs/{job}',    [JobController::class, 'update'])->middleware('auth');
Route::delete('/jobs{job}',    [JobController::class, 'delete'])->middleware('auth');
// So basically we just performed authorization on route level using middleware

// Auth
Route::get('/register',  [RegisteredUserController::class, 'create']);
Route::post('/register', [RegisteredUserController::class, 'store']);

Route::get('/login',   [SessionController::class, 'create'])->name('login');
Route::post('/login',  [SessionController::class, 'store']);
Route::post('/logout', [SessionController::class, 'destroy']);