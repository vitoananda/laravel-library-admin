<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\Book;
use App\Policies\BookPolicy;
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
    public function boot()
    {

        Gate::define('create-book', [BookPolicy::class, 'create']);
        Gate::define('update-book', [BookPolicy::class, 'update']);
        Gate::define('delete-book', [BookPolicy::class, 'delete']);
    }
}
