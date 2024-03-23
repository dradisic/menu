<?php

namespace App\Providers;

use App\Services\ExchangeRateFetcher;
use App\Services\ExchangeRateFetcherInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->singleton(ExchangeRateFetcher::class, function () {
            return new ExchangeRateFetcher(
                config('services.fast-forex.key'),
                config('services.fast-forex.host'),
            );
        });
        $this->app->bind(ExchangeRateFetcherInterface::class, ExchangeRateFetcher::class);

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
