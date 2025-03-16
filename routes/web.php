<?php

use Illuminate\Support\Facades\Route;
use App\Models\Job;

Route::get('/', function () {
    return view('home', [
        'greeting' => 'Yo niggas! Wassup? Welcome'
    ]);
});

Route::get('/contact', function () {
    return view('contact');
});

// Index
Route::get('/jobs', function () {
    $jobs = Job::with('employer')->latest()->simplePaginate(3);         // We went from LazyLoading -> Eager_Loading

    return view('jobs.index', [
        'jobs' => $jobs
    ]);
});

// Create 
Route::get('jobs/create', function () {
    return view('jobs.create');
});

// Store
Route::post('/jobs', function () {
    request()->validate([
        'title' => ['required', 'min:3'],
        'salary' => ['required', 'numeric:integer']
    ]);
    
    Job::create([
        'title' => request('title'),
        'salary' => request('salary'),
        'employer_id' => 1
    ]);
    return redirect('/jobs');
});

//// Show 
Route::get('/job/{id}', function($id) {

    $job = Job::find($id);
    
    return view('jobs.show', ['job' => $job]);
});

//// Edit 
Route::get('/job/{id}/edit', function($id) {

    $job = Job::find($id);
    
    return view('jobs.edit', ['job' => $job]);
});

// Update  
Route::patch('/job/{id}', function($id) {

    request()->validate([                                      // validate
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);
        
    // authorize

    $job = Job::findOrFail($id);
    $job->update([                                            // update & presist
        'title' => request('title'),
        'salary' => "$".request('salary')." USD",
    ]);

    return redirect('/job/'. $job->id );                     // redirect
});

//// Destroy  
Route::delete('/job/{id}', function($id) {

    // authorize
    Job::findOrFail($id)->delete();                   // delete the job

    return redirect('/jobs');                                // redirect
});