<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home', [
        'greeting' => 'Yo niggas! Wassup? Welcome'
    ]);
});

Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->simplePaginate(3);         // We went from LazyLoading -> Eager_Loading

    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('jobs/create', function () {
    return view('jobs.create');
});

Route::post('jobs', function () {
    
    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);
    return redirect('/jobs');
});

Route::get('/job/{id}', function($id) {

    $job = Job::find($id);
    
    return view('jobs.show', ['job' => $job]);
});