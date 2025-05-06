<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\CourseRepository;
use App\Repositories\CourseRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(CourseRepositoryInterface::class, CourseRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
