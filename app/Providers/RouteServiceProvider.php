<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        // Memuat rute API
        Route::middleware('api')
            ->prefix('api')
            ->group(base_path('routes/api.php'));
        // Memuat rute Web
        Route::middleware('web')
            ->group(base_path('routes/web.php'));
    }

}