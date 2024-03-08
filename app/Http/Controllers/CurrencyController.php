<?php

namespace App\Http\Controllers;

use App\Http\Resources\Currency\CurrencyResource;
use App\Services\CurrencyService;

class CurrencyController extends Controller
{
    public function __construct(private CurrencyService $currencyService)
    {
    }
    public function index()
    {
        $currencies = $this->currencyService->getSupportedCurrencies();
        return CurrencyResource::collection($currencies);
    }
}
