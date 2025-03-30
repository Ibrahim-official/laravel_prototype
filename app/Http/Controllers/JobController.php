<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Support\Facades\Gate;

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
        
        Job::create([
            'title' => request('title'),
            'salary' => "$".request('salary')." USD",
            'employer_id' => 1
        ]);
        return redirect('/jobs');
    }
    
    public function show (Job $job) //-------------------------------------------------------------------------------------------
    {
        return view('jobs.show', ['job' => $job]);
    }
    
    public function edit (Job $job) //-------------------------------------------------------------------------------------------
    {
        // Gate definition moved to AppServiceProvider.php file for effective optimization
        // REMOVED the if condition logic that confirms tht u r signed in becomes irrelevant once u use GATE Logic

        // Now we can refernce/call that gate by:
        Gate::authorize('edit-job', $job);

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
        'salary' => "$".request('salary')." USD",
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
