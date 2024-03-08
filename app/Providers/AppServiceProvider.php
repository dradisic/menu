<?php

namespace App\Providers;

use App\Repositories\OrderRepository;
use App\Repositories\OrderRepositoryInterface;
use App\Services\ExchangeRateFetcher;
use App\Services\OrderService;
use App\Services\OrderServiceInterface;
use App\Services\RateService;
use App\Services\RateServiceInterface;
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

    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
