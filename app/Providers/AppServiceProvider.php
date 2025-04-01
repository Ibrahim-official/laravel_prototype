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

    }
}
