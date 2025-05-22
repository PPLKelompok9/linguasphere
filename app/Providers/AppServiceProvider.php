<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\TransactionRepositoryInterface;
use App\Repositories\TransactionRepository;
use App\Models\Transaction;
use App\Repositories\CourseRepository;
use App\Repositories\CourseRepositoryInterface;
use App\Observers\TransactionObserver;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(CourseRepositoryInterface::class, CourseRepository::class);
        $this->app->bind(TransactionRepositoryInterface::class, TransactionRepository::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Transaction::observe(TransactionObserver::class);
    }
}
