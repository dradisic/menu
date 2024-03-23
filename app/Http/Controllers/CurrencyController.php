<?php

namespace App\Http\Controllers;

use App\Http\Resources\Currency\CurrencyResource;
use App\Services\CalculationService;
use App\Services\CalculationServiceInterface;
use App\Services\CurrencyServiceInterface;

class CurrencyController extends Controller
{
    public function __construct(private CurrencyServiceInterface $currencyService)
    {
    }
    public function index()
    {
        $currencies = $this->currencyService->getSupportedCurrencies();
        return CurrencyResource::collection($currencies);
    }
}
