<?php

namespace App\Http\Controllers;

use App\Mail\JobPosted;
use App\Models\Job;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    public function index () //-------------------------------------------------------------------------------------------
    {
        $jobs = Job::with('employer')->latest()->simplePaginate(3);    // We went from LazyLoading -> Eager_Loading

        return view('jobs.index', [
            'jobs' => $jobs
        ]);
    }
    
    public function create () //-------------------------------------------------------------------------------------------
    {
        return view('jobs.create');
    }
    
    public function store () //-------------------------------------------------------------------------------------------
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required',]
        ]);
        
        $job = Job::create([
            'title' => request('title'),
            'salary' => "$".request('salary')." USD",
            'employer_id' => 1
        ]);

        Mail::to($job->employer->user)->queue(
            new JobPosted($job)
        );

        return redirect('/jobs');
    }
    
    public function show (Job $job) //-------------------------------------------------------------------------------------------
    {
        return view('jobs.show', ['job' => $job]);
    }
    
    public function edit (Job $job) //-------------------------------------------------------------------------------------------
    {
        return view('jobs.edit', ['job' => $job]);
    }
    
    public function update (Job $job) //-------------------------------------------------------------------------------------------
    {
    // authorize
    
    request()->validate([                                      // validate
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);
        
    $job->update([                                            // update & presist
        'title' => request('title'),
        'salary' => request('salary'),
    ]);

    return redirect('/jobs/'. $job->id );  
    }
    
    public function destroy (Job $job) //-------------------------------------------------------------------------------------------
    {
    // authorize
    $job->delete();                   // delete the job

    return redirect('/jobs');
    }
    
}
