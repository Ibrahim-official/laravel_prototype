<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Job;
use Illuminate\Support\Facades\Auth;

class JobController extends Controller
{
    public function index () ///////////////////////////////////////////////////////////////////////////
    {
        $jobs = Job::with('employer')->latest()->simplePaginate(3);    // We went from LazyLoading -> Eager_Loading

        return view('jobs.index', [
            'jobs' => $jobs
        ]);
    }
    
    public function create () ///////////////////////////////////////////////////////////////////////////
    {
        return view('jobs.create');
    }
    
    public function store () ///////////////////////////////////////////////////////////////////////////
    {
        request()->validate([
            'title' => ['required', 'min:3'],
            'salary' => ['required',]
        ]);
        
        Job::create([
            'title' => request('title'),
            'salary' => "$".request('salary')." USD",
            'employer_id' => 1
        ]);
        return redirect('/jobs');
    }
    
    public function show (Job $job) ///////////////////////////////////////////////////////////////////////////
    {
        return view('jobs.show', ['job' => $job]);
    }
    
    public function edit (Job $job) ///////////////////////////////////////////////////////////////////////////
    {
        if (Auth::guest()) {    // Opposite of Auth::user  OR  Auth::check
            return redirect('/login');
        }

        if ($job->employer->user->isNot(Auth::user())) {    // If the person who created this job is not the person who is currently signed in, then you don't have authorization
            abort(403);
        }
        return view('jobs.edit', ['job' => $job]);
    }
    
    public function update (Job $job) ///////////////////////////////////////////////////////////////////////////
    {
    // authorize
    
    request()->validate([                                      // validate
        'title' => ['required', 'min:3'],
        'salary' => ['required']
    ]);
        
    $job->update([                                            // update & presist
        'title' => request('title'),
        'salary' => "$".request('salary')." USD",
    ]);

    return redirect('/jobs/'. $job->id );  
    }
    
    public function destroy (Job $job) ///////////////////////////////////////////////////////////////////////////
    {
    // authorize
    $job->delete();                   // delete the job

    return redirect('/jobs');
    }
    
}
