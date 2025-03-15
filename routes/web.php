<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home', [
        'greeting' => 'Yo niggas! Wassup? Welcome'
    ]);
});

Route::get('/jobs', function () {
    $jobs = Job::with('employer')->simplePaginate(3);         // We went from LazyLoading -> Eager_Loading

    return view('jobs', [
        'jobs' => $jobs
    ]);
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/job/{id}', function($id) {

    $job = Job::find($id);
    
    return view('job', ['job' => $job]);
});