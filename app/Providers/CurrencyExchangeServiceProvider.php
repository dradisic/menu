<?php

namespace App\Providers;

use App\Repositories\CurrencyRepository;
use App\Repositories\CurrencyRepositoryInterface;
use App\Repositories\OrderRepository;
use App\Repositories\OrderRepositoryInterface;
use App\Repositories\RateRepository;
use App\Repositories\RateRepositoryInterface;
use App\Services\CalculationService;
use App\Services\CalculationServiceInterface;
use App\Services\CurrencyService;
use App\Services\CurrencyServiceInterface;
use App\Services\DiscountService;
use App\Services\DiscountServiceInterface;
use App\Services\OrderService;
use App\Services\OrderServiceInterface;
use App\Services\QuoteService;
use App\Services\QuoteServiceInterface;
use App\Services\RateService;
use App\Services\RateServiceInterface;
use Illuminate\Support\ServiceProvider;

class CurrencyExchangeServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(OrderServiceInterface::class, OrderService::class);
        $this->app->bind(OrderRepositoryInterface::class, OrderRepository::class);
        $this->app->bind(CurrencyServiceInterface::class, CurrencyService::class);
        $this->app->bind(CurrencyRepositoryInterface::class, CurrencyRepository::class);
        $this->app->bind(RateServiceInterface::class, RateService::class);
        $this->app->bind(RateRepositoryInterface::class, RateRepository::class);
        $this->app->bind(DiscountServiceInterface::class, DiscountService::class);
        $this->app->bind(QuoteServiceInterface::class, QuoteService::class);
        $this->app->bind(DiscountServiceInterface::class, DiscountService::class);
        $this->app->bind(CalculationServiceInterface::class, CalculationService::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
