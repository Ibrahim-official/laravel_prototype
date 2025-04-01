<?php

namespace App\Providers;

use App\Models\Job;
use App\Models\User;
use Illuminate\Contracts\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void            // A place to define simple bits of authorization that can be refernced anywhere in the application
    {
        Model::preventLazyLoading();         // We went from LazyLoading -> Eager_Loading

        // Paginator::useBootstrapFive();


        // Gate facades is a barrier tht conditionally allows entry if meet a certain criteria
        Gate::define('edit-job', function (User $user, Job $job) { 
            // within here a Boolean should be reurned that indicates ~Whether the gate should open (whether this user is authorized to edit that job)
            return $job->employer->user->is($user);   // If the person who created this job is not the person who is currently signed in, then you don't have authorization
            
        });
    }
}
