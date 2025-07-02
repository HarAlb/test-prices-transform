<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Src\Product\Services\Contracts\PriceConverterInterface;
use Src\Product\Services\PriceConverterService;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(PriceConverterInterface::class, PriceConverterService::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
