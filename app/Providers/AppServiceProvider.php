<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate; // Import the Gate class
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
        //TODO: replace "user id == 1" with an actual test. This is just a placeholder.
        Gate::define('edit-carmodels', function ($user) {
            return $user->id == 1;
        });
    }

}
