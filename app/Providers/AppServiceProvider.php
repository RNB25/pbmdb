<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Macros\BlueprintMacro;

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
        BlueprintMacro::register();
    }
}
