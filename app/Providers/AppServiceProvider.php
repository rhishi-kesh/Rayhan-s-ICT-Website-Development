<?php

namespace App\Providers;

use App\Models\CompanyInformation;
use App\Models\Course;
use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;

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
    public function boot(): void
    {
        view()->share('companyInformation', CompanyInformation::first());
        view()->share('course', Course::where('is_active', 0)->get());
        Paginator::useBootstrap();
    }
}
